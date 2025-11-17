<?php
// models/Review.php

class Review {
    public static function forHotel($db, $hotelId) {
        $stmt = $db->prepare("SELECT * FROM reviews WHERE hotel_id = ?");
        $stmt->execute([$hotelId]);
        return $stmt->fetchAll();
    }
}