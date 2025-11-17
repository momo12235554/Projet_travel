<?php
// models/Hotel.php

class Hotel {
    public static function all($db) {
        return $db->query("SELECT * FROM hotels")->fetchAll();
    }
    
    public static function searchByDestination($db, $city) {
        $stmt = $db->prepare("SELECT * FROM hotels WHERE city = ?");
        $stmt->execute([$city]);
        return $stmt->fetchAll();
    }
}