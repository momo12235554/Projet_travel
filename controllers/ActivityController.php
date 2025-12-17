<?php
// controllers/ActivityController.php

require_once __DIR__ . '/../models/Activity.php';

class ActivityController
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
        $guests = $_GET['guests'] ?? 1;

        if ($city) {
            $activities = Activity::searchByDestination($this->db, $city);
        } else {
            $activities = Activity::all($this->db);
        }

        $this->render('activities_list', [
            'activities' => $activities,
            'searchCity' => $city,
            'searchDate' => $date,
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