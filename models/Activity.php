<?php
// models/Activity.php

class Activity {
    public static function all($db) {
        return $db->query("SELECT * FROM activities")->fetchAll();
    }
    
    public static function searchByDestination($db, $city) {
        $stmt = $db->prepare("SELECT * FROM activities WHERE city = ?");
        $stmt->execute([$city]);
        return $stmt->fetchAll();
    }
}