<?php
// models/User.php

class User {
    public static function findByEmail($db, $email) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    public static function create($db, $email, $password) {
        // En production, stocker le mot de passe hashé !
        $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        if ($stmt->execute([$email, $password])) {
            return $db->lastInsertId();
        }
        return false;
    }
}