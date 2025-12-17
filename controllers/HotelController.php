<?php
// controllers/HotelController.php

require_once __DIR__ . '/../models/Hotel.php';

class HotelController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function listAll()
    {
        $city = $_GET['city'] ?? '';
        $date = $_GET['date'] ?? '';
        $dateOut = $_GET['date_out'] ?? '';
        $guests = $_GET['guests'] ?? 1;

        if ($city) {
            $hotels = Hotel::searchByDestination($this->db, $city);
        } else {
            $hotels = Hotel::all($this->db);
        }

        $this->render('hotels_list', [
            'hotels' => $hotels,
            'searchCity' => $city,
            'searchDate' => $date,
            'searchDateOut' => $dateOut,
            'searchGuests' => $guests
        ]);
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