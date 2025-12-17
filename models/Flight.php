<?php
// models/Flight.php

class Flight
{
    public static function search($db, $from, $to)
    {
        $stmt = $db->prepare("SELECT * FROM flights WHERE departure_city = ? AND arrival_city = ?"); // Adaptation pour le schéma DB
        $stmt->execute([$from, $to]);
        return $stmt->fetchAll();
    }

    public static function find($db, $id)
    {
        $stmt = $db->prepare("SELECT * FROM flights WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}