<?php
// controllers/HotelController.php

require_once __DIR__ . '/../models/Hotel.php';

class HotelController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function listAll() {
        $hotels = Hotel::all($this->db);
        $this->render('hotels_list', ['hotels' => $hotels]); // La vue 'hotels_list.php' est nécessaire
    }

    private function render($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . '/../layouts/main.php';
    }
}