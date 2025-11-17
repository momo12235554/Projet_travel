<?php
// config/db.php

$host = 'localhost';
$dbname = 'travel'; // Nom de votre base de données
$user = 'root'; // Votre utilisateur
$password = ''; // Votre mot de passe

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En environnement de production, ne pas afficher l'erreur détaillée.
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}