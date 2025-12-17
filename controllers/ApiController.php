<?php
// controllers/ApiController.php

class ApiController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function searchCities()
    {
        // Set header to JSON
        header('Content-Type: application/json');

        $query = $_GET['q'] ?? '';

        if (strlen($query) < 1) {
            echo json_encode([]);
            return;
        }

        try {
            // Prepare search pattern
            $pattern = $query . '%';

            // We want unique cities from flights, hotels, and activities
            // Using UNION to combine results efficiently
            $sql = "
                SELECT DISTINCT city FROM (
                    SELECT departure_city as city FROM flights WHERE departure_city LIKE ?
                    UNION
                    SELECT arrival_city as city FROM flights WHERE arrival_city LIKE ?
                    UNION
                    SELECT city FROM hotels WHERE city LIKE ?
                    UNION
                    SELECT city FROM activities WHERE city LIKE ?
                ) as combined_cities
                ORDER BY city ASC
                LIMIT 10
            ";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$pattern, $pattern, $pattern, $pattern]);

            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

            echo json_encode($results);

        } catch (Exception $e) {
            // In case of error, return empty array to avoid breaking frontend
            echo json_encode([]);
        }
    }
}
