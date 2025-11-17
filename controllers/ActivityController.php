<?php
// controllers/ActivityController.php

require_once __DIR__ . '/../models/Activity.php';

class ActivityController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function listAll() {
        $activities = Activity::all($this->db);
        $this->render('activities_list', ['activities' => $activities]); // La vue 'activities_list.php' est nécessaire
    }

    private function render($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . '/../layouts/main.php';
    }
}