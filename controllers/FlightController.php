<?php
// controllers/FlightController.php

// Inclusions des modèles nécessaires pour la recherche
require_once __DIR__ . '/../models/Flight.php';
require_once __DIR__ . '/../models/Hotel.php';
require_once __DIR__ . '/../models/Activity.php';

class FlightController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function home()
    {
        // Affiche la vue d'accueil (le formulaire de recherche)
        $this->render('home');
    }

    // Gère la soumission du formulaire de recherche (Redirection pour URL propre)
    public function search()
    {
        $from = urlencode($_GET['from'] ?? '');
        $to = urlencode($_GET['to'] ?? '');

        // La date n'est pas utilisée pour la requête SQL simple ici, mais on la passe
        $date = urlencode($_GET['date'] ?? '');

        // Redirige vers la page de résultats
        header("Location: ?route=search_results&from=$from&to=$to&date=$date");
        exit;
    }

    // Affiche les résultats de la recherche
    public function searchResults()
    {
        $from = $_GET['from'] ?? '';
        $to = $_GET['to'] ?? '';
        $tripType = $_GET['trip'] ?? 'one_way';
        $returnDate = $_GET['return_date'] ?? '';

        // 1. Recherche les vols aller
        $flights = Flight::search($this->db, $from, $to);

        // 1b. Recherche les vols retour si aller-retour
        $returnFlights = [];
        if ($tripType === 'round_trip' && !empty($returnDate)) {
            // On inverse départ et arrivée pour le retour
            $returnFlights = Flight::search($this->db, $to, $from);
        }

        // 2. Recherche les hôtels et activités dans la ville d'arrivée ($to)
        $hotels = Hotel::searchByDestination($this->db, $to);
        $activities = Activity::searchByDestination($this->db, $to);

        // 3. Affichage de la vue des résultats
        $this->render('search_results', [
            'flights' => $flights,
            'returnFlights' => $returnFlights,
            'tripType' => $tripType,
            'hotels' => $hotels,
            'activities' => $activities,
            'from' => $from,
            'to' => $to
        ]);
    }

    /**
     * Méthode corrigée pour inclure la vue dans le layout via la mise en tampon de sortie.
     * C'est cette méthode qui assure que le contenu s'affiche dans le layout.
     */
    private function render($view, $data = [])
    {
        extract($data);

        // 1. Démarrage de la mise en tampon
        ob_start();

        // 2. Inclusion de la vue spécifique (le HTML de la vue est stocké dans le tampon)
        require __DIR__ . "/../views/$view.php";

        // 3. Récupération du contenu capturé dans la variable $content
        $content = ob_get_clean();

        // 4. Inclusion du layout qui utilise la variable $content
        require __DIR__ . '/../layouts/main.php';
    }
}