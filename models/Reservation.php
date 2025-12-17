<?php
// models/Reservation.php

class Reservation {

    public static function create($db, $data) {
        $stmt = $db->prepare(
            "INSERT INTO reservations (user_id, item_type, item_id, date_reserved)
             VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['user_id'],
            $data['item_type'],
            $data['item_id'],
            $data['date']
        ]);
    }

    public static function findByUser($db, $userId) {
        $stmt = $db->prepare(
            "SELECT * FROM reservations 
             WHERE user_id = ? 
             ORDER BY date_reserved ASC"
        );
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findAll($db) {
        $stmt = $db->prepare(
            "SELECT * FROM reservations 
             ORDER BY date_reserved DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
