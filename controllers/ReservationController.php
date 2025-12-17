<?php

require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Flight.php';
require_once __DIR__ . '/../models/Hotel.php';
require_once __DIR__ . '/../models/Activity.php';

class ReservationController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function reserve()
    {
        $itemId = $_GET['item_id'] ?? null;
        $itemType = $_GET['item_type'] ?? null;

        if (empty($itemId) || empty($itemType)) {
            header('Location: ?route=home');
            exit;
        }

        $item = null;
        switch ($itemType) {
            case 'flight':
                $item = Flight::find($this->db, $itemId);
                break;
            case 'hotel':
                $item = Hotel::find($this->db, $itemId);
                break;
            case 'activity':
                $item = Activity::find($this->db, $itemId);
                break;
        }

        if (!$item) {
            header('Location: ?route=home');
            exit;
        }

        $this->render('reserve', [
            'item' => $item,
            'itemId' => $itemId,
            'itemType' => $itemType,
            'message' => $_SESSION['reserve_message'] ?? null
        ]);
        unset($_SESSION['reserve_message']);
    }

    public function handleReserve()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['reserve_message'] = "Vous devez être connecté pour réserver.";
            header('Location: ?route=login');
            exit;
        }

        $itemType = $_POST['item_type'] ?? '';
        $itemId = $_POST['item_id'] ?? 0;
        $date = $_POST['date'] ?? date('Y-m-d');

        $data = [
            'user_id' => $_SESSION['user_id'],
            'item_type' => $itemType,
            'item_id' => $itemId,
            'date' => $date,
        ];

        if (Reservation::create($this->db, $data)) {
            $_SESSION['reserve_message'] = "Réservation effectuée avec succès!";

            if ($itemType === 'flight') {
                $_SESSION['suggestion_type'] = 'hotel_activity';
            } elseif ($itemType === 'hotel') {
                $_SESSION['suggestion_type'] = 'activity';
            }

            header('Location: ?route=reservations');
            exit;
        } else {
            $_SESSION['reserve_message'] = "Erreur lors de la réservation.";
            header('Location: ?route=reserve&item_id=' . $data['item_id'] . '&item_type=' . $data['item_type']);
            exit;
        }
    }

    public function index()
    {

        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $rawReservations = Reservation::findByUser($this->db, $_SESSION['user_id']);
        $reservations = [];

        foreach ($rawReservations as $res) {
            $details = null;
            switch ($res['item_type']) {
                case 'flight':
                    $details = Flight::find($this->db, $res['item_id']);
                    break;
                case 'hotel':
                    $details = Hotel::find($this->db, $res['item_id']);
                    break;
                case 'activity':
                    $details = Activity::find($this->db, $res['item_id']);
                    break;
            }

            if ($details) {
                $res['details'] = $details;
                $reservations[] = $res;
            }
        }

        $makeSortKey = static function (array $reservation): string {
            $details = is_array($reservation['details'] ?? null) ? $reservation['details'] : [];
            $type = (string) ($reservation['item_type'] ?? '');

            if ($type === 'flight') {
                return (string) ($details['flight_number'] ?? '');
            }

            if ($type === 'hotel' || $type === 'activity') {
                return (string) ($details['name'] ?? '');
            }

            return '';
        };

        if (count($reservations) > 1) {
            if (class_exists('Collator')) {
                $collator = new Collator('fr_FR');
                $collator->setStrength(Collator::SECONDARY);

                usort($reservations, static function (array $a, array $b) use ($makeSortKey, $collator): int {
                    $keyA = $makeSortKey($a);
                    $keyB = $makeSortKey($b);

                    $cmp = $collator->compare($keyA, $keyB);
                    if ($cmp !== 0) {
                        return $cmp;
                    }

                    return strcmp((string) ($b['date_reserved'] ?? ''), (string) ($a['date_reserved'] ?? ''));
                });
            } else {
                usort($reservations, static function (array $a, array $b) use ($makeSortKey): int {
                    $rawKeyA = $makeSortKey($a);
                    $rawKeyB = $makeSortKey($b);

                    if (function_exists('mb_strtolower')) {
                        $keyA = mb_strtolower($rawKeyA, 'UTF-8');
                        $keyB = mb_strtolower($rawKeyB, 'UTF-8');
                    } else {
                        $keyA = strtolower($rawKeyA);
                        $keyB = strtolower($rawKeyB);
                    }

                    $cmp = strcmp($keyA, $keyB);
                    if ($cmp !== 0) {
                        return $cmp;
                    }

                    return strcmp((string) ($b['date_reserved'] ?? ''), (string) ($a['date_reserved'] ?? ''));
                });
            }
        }

        $suggestion = $_SESSION['suggestion_type'] ?? null;
        unset($_SESSION['suggestion_type']);

        $this->render('reservations', [
            'reservations' => $reservations,
            'suggestion' => $suggestion,
            'message' => $_SESSION['reserve_message'] ?? null
        ]);
        unset($_SESSION['reserve_message']);
    }

    private function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . '/../layouts/main.php';
    }
}