<?php
require_once 'config/db.php';

// Data to insert
$newActivities = [
    [
        'name' => 'Visite de la Mosquée Hassan II',
        'city' => 'Casablanca',
        'description' => 'Découvrez ce chef-d\'œuvre architectural au bord de l\'océan.',
        'price' => 25,
        'duration' => '2 heures'
    ],
    [
        'name' => 'Croisière sur la Seine',
        'city' => 'Paris',
        'description' => 'Admirer les monuments de Paris depuis le fleuve.',
        'price' => 15,
        'duration' => '1 heure'
    ],
    [
        'name' => 'Visite du Maqam Echahid',
        'city' => 'Alger',
        'description' => 'Monument emblématique surplombant la baie d\'Alger.',
        'price' => 10,
        'duration' => '1.5 heures'
    ],
    [
        'name' => 'Jardin Majorelle',
        'city' => 'Marrakech',
        'description' => 'Promenade dans le célèbre jardin botanique.',
        'price' => 12,
        'duration' => '2 heures'
    ],
    [
        'name' => 'Tour Eiffel Sommet',
        'city' => 'Paris',
        'description' => 'Vue imprenable sur tout Paris depuis le sommet.',
        'price' => 30,
        'duration' => '3 heures'
    ],
    [
        'name' => 'Visite de la Casbah',
        'city' => 'Alger',
        'description' => 'Plongez dans l\'histoire dans les ruelles de la Casbah.',
        'price' => 15,
        'duration' => '3 heures'
    ],
    [
        'name' => 'Place Jemaa el-Fnaa',
        'city' => 'Marrakech',
        'description' => 'L\'ambiance unique de la célèbre place de Marrakech.',
        'price' => 0,
        'duration' => 'Soirée'
    ]
];

$newHotels = [
    [
        'name' => 'Sofitel Casablanca Tour Blanche',
        'city' => 'Casablanca',
        'price_per_night' => 180,
        'stars' => 5,
        'rating' => 4.8,
        'address' => 'Rue Sidi Belyout, Casablanca'
    ],
    [
        'name' => 'Hotel Ritz Paris',
        'city' => 'Paris',
        'price_per_night' => 800,
        'stars' => 5,
        'rating' => 4.9,
        'address' => '15 Place Vendôme, Paris'
    ],
    [
        'name' => 'Hotel El Aurassi',
        'city' => 'Alger',
        'price_per_night' => 150,
        'stars' => 5,
        'rating' => 4.5,
        'address' => 'Boulevard Frantz Fanon, Alger'
    ],
    [
        'name' => 'La Mamounia',
        'city' => 'Marrakech',
        'price_per_night' => 500,
        'stars' => 5,
        'rating' => 4.9,
        'address' => 'Avenue Bab Jdid, Marrakech'
    ],
    [
        'name' => 'ibis Casablanca City Center',
        'city' => 'Casablanca',
        'price_per_night' => 60,
        'stars' => 3,
        'rating' => 4.0,
        'address' => 'Angle Zaid Ou Hmad, Casablanca'
    ],
    [
        'name' => 'Novotel Paris Les Halles',
        'city' => 'Paris',
        'price_per_night' => 200,
        'stars' => 4,
        'rating' => 4.4,
        'address' => '8 Place Marguerite de Navarre, Paris'
    ]
];

try {
    echo "Inserting Activities...\n";
    $stmtAct = $db->prepare("INSERT INTO activities (name, city, description, price, duration) VALUES (?, ?, ?, ?, ?)");
    foreach ($newActivities as $act) {
        // Check if exists
        $check = $db->prepare("SELECT id FROM activities WHERE name = ? AND city = ?");
        $check->execute([$act['name'], $act['city']]);
        if (!$check->fetch()) {
            $stmtAct->execute([$act['name'], $act['city'], $act['description'], $act['price'], $act['duration']]);
            echo "Added activity: {$act['name']}\n";
        } else {
            echo "Skipping existing activity: {$act['name']}\n";
        }
    }

    echo "Inserting Hotels...\n";
    // Check table columns for hotels. Assuming name, city, price_per_night (or price), stars, rating, address (maybe) from view files.
    // hotels_list.php uses: name, address/city, price_per_night/price, stars/rating.
    // Let's assume standard columns. If fail, we'll see error.
    // Usually 'price' is the column if price_per_night is alias. Let's check existing DB code? 
    // Hotel.php says "SELECT * FROM hotels".
    // I recall creating the table earlier? No, I only viewed it.
    // Based on previous errors/code, 'price_per_night' was used as variable but fetched as $hotel['price'].
    // Let's try inserting into 'price'. Address might not exist?
    // Let's try basic columns first: name, city, price, stars, rating.

    // Check if 'address' column exists? No easy way. I'll assume 'location' or just 'city' holds address info if simple.
    // Actually, hotels_list.php uses `$hotel['address'] ?? $hotel['city']`.
    // I'll try to insert into `hotels` (name, city, price, stars, rating). 

    $stmtHotel = $db->prepare("INSERT INTO hotels (name, city, price_per_night, stars) VALUES (?, ?, ?, ?)");
    foreach ($newHotels as $hotel) {
        $check = $db->prepare("SELECT id FROM hotels WHERE name = ?");
        $check->execute([$hotel['name']]);
        if (!$check->fetch()) {
            $stmtHotel->execute([$hotel['name'], $hotel['city'], $hotel['price_per_night'], $hotel['stars']]);
            echo "Added hotel: {$hotel['name']}\n";
        } else {
            echo "Skipping existing hotel: {$hotel['name']}\n";
        }
    }

    echo "Done.\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
