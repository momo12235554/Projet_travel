<?php
// controllers/ReservationController.php

require_once __DIR__ . '/../models/Reservation.php';

class ReservationController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function reserve() {
        // Récupérer l'ID de l'objet à réserver depuis l'URL (ex: item_id=1&item_type=flight)
        $itemId = $_GET['item_id'] ?? null;
        $itemType = $_GET['item_type'] ?? null;

        if (empty($itemId) || empty($itemType)) {
            header('Location: ?route=home');
            exit;
        }
        
        $this->render('reserve', [
            'itemId' => $itemId,
            'itemType' => $itemType,
            'message' => $_SESSION['reserve_message'] ?? null
        ]);
        unset($_SESSION['reserve_message']);
    }

    public function handleReserve() {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['reserve_message'] = "Vous devez être connecté pour réserver.";
            header('Location: ?route=login');
            exit;
        }
        
        $data = [
            'user_id'   => $_SESSION['user_id'],
            'item_type' => $_POST['item_type'] ?? '',
            'item_id'   => $_POST['item_id'] ?? 0,
            'date'      => $_POST['date'] ?? date('Y-m-d'),
        ];

        if (Reservation::create($this->db, $data)) {
            $_SESSION['reserve_message'] = "Réservation effectuée avec succès!";
            header('Location: ?route=reservations');
            exit;
        } else {
            $_SESSION['reserve_message'] = "Erreur lors de la réservation.";
            header('Location: ?route=reserve&item_id=' . $data['item_id'] . '&item_type=' . $data['item_type']);
            exit;
        }
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }
        
        $reservations = Reservation::findByUser($this->db, $_SESSION['user_id']); // Supposons que findByUser existe
        $this->render('reservations', ['reservations' => $reservations]);
    }

    private function render($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . '/../layouts/main.php';
    }
}