<?php
// config/routes.php

$routes = [
    // Format : "route" => [Controller, methode]
    
    // Pages publiques
    "home"           => ["FlightController", "home"], // J'ai renommé search en home pour la page d'accueil
    "login"          => ["UserController", "login"],
    "register"       => ["UserController", "register"],
    "search"         => ["FlightController", "search"],
    "search_results" => ["FlightController", "searchResults"], // Nouvelle méthode pour l'affichage
    "hotels"         => ["HotelController", "listAll"], // Nouvelle méthode plus claire
    "activities"     => ["ActivityController", "listAll"],
    "logout" => ["UserController", "logout"],

    // Traitements des formulaires (POST)
    "post_login"     => ["UserController", "handleLogin"],
    "post_register"  => ["UserController", "handleRegister"],
    "post_reserve"   => ["ReservationController", "handleReserve"],

    // Pages privées (à sécuriser en production)
    "reservations"   => ["ReservationController", "index"],
];