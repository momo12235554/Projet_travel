<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-2">Résultats de recherche</h1>
            <p class="text-gray-600">Voici nos meilleures offres pour votre recherche</p>
        </div>

        <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 mb-12">
            <?php
            $trip = (string) ($_GET['trip'] ?? 'one_way');
            $isRoundTrip = $trip === 'round_trip';
            $returnDate = (string) ($_GET['return_date'] ?? '');
            ?>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Trajet</p>
                    <p class="font-semibold text-gray-900"><?= $isRoundTrip ? 'Aller-retour' : 'Aller simple' ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Départ</p>
                    <p class="font-semibold text-gray-900"><?= htmlspecialchars($_GET['from'] ?? 'Non spécifié') ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Destination</p>
                    <p class="font-semibold text-gray-900"><?= htmlspecialchars($_GET['to'] ?? 'Non spécifié') ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Date aller</p>
                    <p class="font-semibold text-gray-900"><?= htmlspecialchars($_GET['date'] ?? 'Non spécifié') ?></p>
                </div>
                <div class="<?= ($isRoundTrip && $returnDate !== '') ? '' : 'hidden' ?>">
                    <p class="text-sm text-gray-600">Date retour</p>
                    <p class="font-semibold text-gray-900">
                        <?= htmlspecialchars($returnDate !== '' ? $returnDate : '—') ?>
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Passagers</p>
                    <p class="font-semibold text-gray-900"><?= htmlspecialchars($_GET['passengers'] ?? '1') ?>
                        passager(s)</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <?php if (empty($flights) && empty($hotels) && empty($activities)): ?>
                <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="mb-6">
                        <svg class="w-20 h-20 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8m0 8l-4-2m4 2l4-2"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Aucun résultat trouvé</h2>
                    <p class="text-gray-600 mb-8">Essayez de modifier vos dates ou votre destination.</p>
                    <a href="?route=home" class="btn btn-primary">Nouvelle recherche</a>
                </div>
            <?php else: ?>

                <div class="flex flex-col lg:flex-row gap-8">
                    <div class="w-full lg:w-1/4 space-y-6">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-24">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-bold text-lg text-gray-900">Filtres</h3>
                                <button id="reset-filters"
                                    class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Réinitialiser</button>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Trier par</label>
                                <select id="sort-select"
                                    class="w-full border-gray-300 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="price-asc">Prix croissant</option>
                                    <option value="price-desc">Prix décroissant</option>
                                    <option value="duration">Durée (court à long)</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Budget max</label>
                                <input type="range" id="price-range" min="0" max="2000" value="2000"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                <div class="flex justify-between text-sm text-gray-600 mt-1">
                                    <span>0€</span>
                                    <span id="price-display">2000€</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Compagnies</label>
                                <div class="space-y-2">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox"
                                            class="filter-airline rounded text-indigo-600 focus:ring-indigo-500"
                                            value="Air France" checked>
                                        <span class="text-sm text-gray-600">Air France</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox"
                                            class="filter-airline rounded text-indigo-600 focus:ring-indigo-500"
                                            value="Lufthansa" checked>
                                        <span class="text-sm text-gray-600">Lufthansa</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox"
                                            class="filter-airline rounded text-indigo-600 focus:ring-indigo-500"
                                            value="EasyJet" checked>
                                        <span class="text-sm text-gray-600">EasyJet</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox"
                                            class="filter-airline rounded text-indigo-600 focus:ring-indigo-500"
                                            value="British Airways" checked>
                                        <span class="text-sm text-gray-600">British Airways</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-3/4 space-y-6" id="results-container">

                        <?php foreach ($flights as $flight):
                            $flightNum = $flight['flight_number'] ?? '';
                            $airlineName = 'Autres';

                            if (preg_match('/^([A-Z]{2})/', $flightNum, $matches)) {
                                $code = $matches[1];
                                $airlines = [
                                    'AF' => 'Air France',
                                    'BA' => 'British Airways',
                                    'DL' => 'Delta Airlines',
                                    'LH' => 'Lufthansa',
                                    'AA' => 'American Airlines',
                                    'EK' => 'Emirates',
                                    'QR' => 'Qatar Airways',
                                    'RY' => 'Ryanair',
                                    'U2' => 'EasyJet',
                                    'AT' => 'Royal Air Maroc',
                                    'TO' => 'Transavia',
                                    'TU' => 'Tunisair'
                                ];
                                $airlineName = $airlines[$code] ?? $airlineName;
                            }

                            $dep = new DateTime($flight['departure_time']);
                            $arr = new DateTime($flight['arrival_time']);
                            $interval = $dep->diff($arr);
                            $minutes = ($interval->h * 60) + $interval->i;
                            $durationStr = $interval->format('%hh %im');
                            ?>
                            <div class="result-card bg-white rounded-xl shadow-md border border-gray-200 p-0 hover:shadow-lg transition-all duration-300 overflow-hidden"
                                data-type="flight" data-price="<?= $flight['price'] ?>" data-duration="<?= $minutes ?>"
                                data-airline="<?= htmlspecialchars($airlineName) ?>">

                                <?php if ($flight['price'] < 300): ?>
                                    <div
                                        class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg z-10">
                                        Meilleur Prix</div>
                                <?php endif; ?>

                                <div class="flex flex-col md:flex-row h-full">
                                    <div
                                        class="w-full md:w-48 h-32 md:h-auto bg-gray-50 flex-shrink-0 relative flex items-center justify-center border-r border-gray-100">
                                        <div class="text-center p-4">
                                            <div class="text-2xl font-bold text-gray-400 mb-1">
                                                <?= substr($flightNum, 0, 2) ?>
                                            </div>
                                            <div class="text-sm text-gray-500 font-medium">
                                                <?= htmlspecialchars($airlineName) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-1 p-6 flex flex-col md:flex-row items-center justify-between gap-6">
                                        <div class="flex-1 w-full">
                                            <div class="flex items-center justify-between md:justify-start gap-8">
                                                <div class="text-center">
                                                    <p class="text-2xl font-bold text-gray-900">
                                                        <?= htmlspecialchars($dep->format('H:i')) ?>
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        <?= htmlspecialchars($flight['departure_city']) ?>
                                                    </p>
                                                </div>

                                                <div class="flex-1 max-w-xs px-4">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <span class="text-xs text-gray-400">Direct</span>
                                                        <span class="text-xs text-gray-400"><?= $durationStr ?></span>
                                                    </div>
                                                    <div class="flex items-center relative">
                                                        <div class="w-2 h-2 bg-indigo-600 rounded-full z-10"></div>
                                                        <div class="flex-1 border-t-2 border-indigo-200 absolute w-full top-1">
                                                        </div>
                                                        <div class="w-2 h-2 bg-indigo-600 rounded-full z-10 ml-auto">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <p class="text-2xl font-bold text-gray-900">
                                                        <?= htmlspecialchars($arr->format('H:i')) ?>
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        <?= htmlspecialchars($flight['arrival_city']) ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="flex items-center space-x-4 mt-4 text-xs text-gray-500">
                                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded"><svg
                                                        class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg> Bagage cabine</span>
                                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded"><svg
                                                        class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg> Modifiable</span>
                                            </div>
                                        </div>

                                        <div
                                            class="text-center md:text-right w-full md:w-auto border-t md:border-t-0 border-gray-100 pt-4 md:pt-0 md:pl-6">
                                            <p class="text-xs text-gray-500 mb-1">Par personne</p>
                                            <p class="text-3xl font-bold text-indigo-600 mb-3">
                                                $<?= htmlspecialchars($flight['price']) ?></p>
                                            <a href="index.php?route=reserve&item_type=flight&item_id=<?= $flight['id'] ?>"
                                                class="btn btn-primary w-full md:w-auto block text-center">Voir
                                                l'offre</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if (!empty($returnFlights)): ?>
                            <div class="py-6 border-t border-gray-200 mt-8 relative">
                                <div
                                    class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-white px-4 text-gray-500 font-semibold text-sm uppercase tracking-wider">
                                    Vols Retour
                                </div>
                                <h3 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Retour : <?= htmlspecialchars($to) ?> → <?= htmlspecialchars($from) ?>
                                </h3>

                                <?php foreach ($returnFlights as $flight):
                                    $flightNum = $flight['flight_number'] ?? '';
                                    $airlineName = 'Autres';

                                    if (preg_match('/^([A-Z]{2})/', $flightNum, $matches)) {
                                        $code = $matches[1];
                                        $airlines = [
                                            'AF' => 'Air France',
                                            'BA' => 'British Airways',
                                            'DL' => 'Delta Airlines',
                                            'LH' => 'Lufthansa',
                                            'AA' => 'American Airlines',
                                            'EK' => 'Emirates',
                                            'QR' => 'Qatar Airways',
                                            'RY' => 'Ryanair',
                                            'U2' => 'EasyJet',
                                            'AT' => 'Royal Air Maroc',
                                            'TO' => 'Transavia',
                                            'TU' => 'Tunisair'
                                        ];
                                        $airlineName = $airlines[$code] ?? $airlineName;
                                    }

                                    $dep = new DateTime($flight['departure_time']);
                                    $arr = new DateTime($flight['arrival_time']);
                                    $interval = $dep->diff($arr);
                                    $minutes = ($interval->h * 60) + $interval->i;
                                    $durationStr = $interval->format('%hh %im');
                                    ?>
                                    <div class="result-card bg-white rounded-xl shadow-md border border-gray-200 p-0 hover:shadow-lg transition-all duration-300 overflow-hidden mb-6"
                                        data-type="flight-return" data-price="<?= $flight['price'] ?>"
                                        data-duration="<?= $minutes ?>" data-airline="<?= htmlspecialchars($airlineName) ?>">

                                        <div class="flex flex-col md:flex-row h-full">
                                            <div
                                                class="w-full md:w-48 h-32 md:h-auto bg-gray-50 flex-shrink-0 relative flex items-center justify-center border-r border-gray-100">
                                                <div class="text-center p-4">
                                                    <div class="text-2xl font-bold text-gray-400 mb-1">
                                                        <?= substr($flightNum, 0, 2) ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500 font-medium">
                                                        <?= htmlspecialchars($airlineName) ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-1 p-6 flex flex-col md:flex-row items-center justify-between gap-6">
                                                <div class="flex-1 w-full">
                                                    <div class="flex items-center justify-between md:justify-start gap-8">
                                                        <div class="text-center">
                                                            <p class="text-2xl font-bold text-gray-900">
                                                                <?= htmlspecialchars($dep->format('H:i')) ?>
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                <?= htmlspecialchars($flight['departure_city']) ?>
                                                            </p>
                                                        </div>

                                                        <div class="flex-1 max-w-xs px-4">
                                                            <div class="flex items-center justify-between mb-1">
                                                                <span class="text-xs text-gray-400">Direct</span>
                                                                <span class="text-xs text-gray-400"><?= $durationStr ?></span>
                                                            </div>
                                                            <div class="flex items-center relative">
                                                                <div class="w-2 h-2 bg-indigo-600 rounded-full z-10"></div>
                                                                <div
                                                                    class="flex-1 border-t-2 border-indigo-200 absolute w-full top-1">
                                                                </div>
                                                                <div class="w-2 h-2 bg-indigo-600 rounded-full z-10 ml-auto"></div>
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <p class="text-2xl font-bold text-gray-900">
                                                                <?= htmlspecialchars($arr->format('H:i')) ?>
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                <?= htmlspecialchars($flight['arrival_city']) ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="text-center md:text-right w-full md:w-auto border-t md:border-t-0 border-gray-100 pt-4 md:pt-0 md:pl-6">
                                                    <p class="text-xs text-gray-500 mb-1">Par personne</p>
                                                    <p class="text-3xl font-bold text-indigo-600 mb-3">
                                                        $<?= htmlspecialchars($flight['price']) ?></p>
                                                    <a href="index.php?route=reserve&item_type=flight&item_id=<?= $flight['id'] ?>"
                                                        class="btn btn-primary w-full md:w-auto block text-center">Sélectionner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $hotelImages = [
                            'https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                        ];
                        ?>
                        <?php if (!empty($hotels)): ?>
                            <div class="py-4 border-t border-gray-200 mt-8">
                                <h3 class="text-xl font-bold mb-4">Hôtels disponibles</h3>
                                <?php foreach ($hotels as $index => $hotel): ?>
                                    <div
                                        class="bg-white rounded-xl shadow-md border border-gray-200 p-0 hover:shadow-lg transition-all duration-300 overflow-hidden mb-6">
                                        <div class="flex flex-col md:flex-row h-full">
                                            <div class="w-full md:w-48 h-32 md:h-auto bg-gray-100 flex-shrink-0 relative">
                                                <img src="<?= $hotelImages[$index % count($hotelImages)] ?>"
                                                    alt="<?= htmlspecialchars($hotel['name'] ?? 'Hôtel') ?>"
                                                    class="w-full h-full object-cover">
                                            </div>

                                            <div
                                                class="flex-1 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                                                <div class="flex-1 w-full">
                                                    <div class="flex items-center gap-3 mb-2">
                                                        <h3 class="font-bold text-lg text-gray-900">
                                                            <?= htmlspecialchars($hotel['name'] ?? 'Hôtel') ?>
                                                        </h3>
                                                        <div class="flex items-center space-x-1">
                                                            <?php
                                                            $rating = $hotel['stars'] ?? $hotel['rating'] ?? 0;
                                                            for ($i = 0; $i < 5; $i++):
                                                                ?>
                                                                <svg class="w-4 h-4 <?= $i < $rating ? 'text-yellow-400 fill-current' : 'text-gray-300' ?>"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                                </svg>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm text-gray-600 mb-3">
                                                        <?= htmlspecialchars($hotel['address'] ?? $hotel['city'] ?? 'Adresse non disponible') ?>
                                                    </p>
                                                    <div class="flex flex-wrap gap-2">
                                                        <span class="badge badge-success">WiFi</span>
                                                        <span class="badge badge-success">Piscine</span>
                                                    </div>
                                                </div>
                                                <div class="text-right w-full md:w-auto">
                                                    <p class="text-sm text-gray-600 mb-1">Par nuit</p>
                                                    <p class="text-3xl font-bold text-indigo-600 mb-3">
                                                        $<?= htmlspecialchars($hotel['price_per_night'] ?? $hotel['price'] ?? 0) ?>
                                                    </p>
                                                    <a href="index.php?route=reserve&item_type=hotel&item_id=<?= $hotel['id'] ?>"
                                                        class="btn btn-primary w-full md:w-auto">Sélectionner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $activityImages = [
                            'https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1528543606781-2f6e6857f318?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1554907984-15263bfd63bd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                            'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                        ];
                        ?>
                        <?php if (!empty($activities)): ?>
                            <div class="py-4 border-t border-gray-200 mt-8">
                                <h3 class="text-xl font-bold mb-4">Activités disponibles</h3>
                                <?php foreach ($activities as $index => $activity):
                                    $actName = $activity['name'] ?? '';
                                    $actCity = $activity['city'] ?? $to;

                                    $imgUrl = 'assets/images/activities/default.jpg';
                        
                                    if (stripos($actCity, 'Paris') !== false || stripos($actName, 'Eiffel') !== false || stripos($actName, 'Seine') !== false) {
                                        $imgUrl = 'assets/images/activities/paris.jpg';
                                    } elseif (stripos($actCity, 'Casablanca') !== false || stripos($actName, 'Hassan') !== false) {
                                        $imgUrl = 'assets/images/activities/casablanca.jpg';
                                    } elseif (stripos($actCity, 'Marrakech') !== false || stripos($actName, 'Majorelle') !== false || stripos($actName, 'Jemaa') !== false) {
                                        $imgUrl = 'assets/images/activities/marrakech.jpg';
                                    } elseif (stripos($actCity, 'Alger') !== false || stripos($actName, 'Makham') !== false || stripos($actName, 'Casbah') !== false || stripos($actName, 'Aurassi') !== false) {
                                        $imgUrl = 'assets/images/activities/alger.jpg';
                                    } elseif (stripos($actCity, 'Rome') !== false || stripos($actName, 'Colise') !== false) {
                                        $imgUrl = 'assets/images/activities/rome.jpg';
                                    } elseif (stripos($actCity, 'Lisbonne') !== false || stripos($actCity, 'Lisbon') !== false) {
                                        $imgUrl = 'assets/images/activities/lisbonne.jpg';
                                    } elseif (stripos($actCity, 'Haiti') !== false || stripos($actCity, 'Port-au-Prince') !== false || stripos($actName, 'Citadelle') !== false || stripos($actName, 'Bassin') !== false) {
                                        $imgUrl = 'assets/images/activities/haiti.jpg';
                                    } elseif (stripos($actCity, 'Dubai') !== false || stripos($actName, 'Burj') !== false) {
                                        $imgUrl = 'assets/images/activities/dubai.jpg';
                                    }
                                    ?>
                                    <div
                                        class="bg-white rounded-xl shadow-md border border-gray-200 p-0 hover:shadow-lg transition-all duration-300 overflow-hidden mb-6">
                                        <div class="flex flex-col md:flex-row h-full">
                                            <div class="w-full md:w-48 h-32 md:h-auto bg-gray-100 flex-shrink-0 relative">
                                                <img src="<?= $imgUrl ?>"
                                                    alt="<?= htmlspecialchars($activity['name'] ?? 'Activité') ?>"
                                                    class="w-full h-full object-cover">
                                            </div>

                                            <div
                                                class="flex-1 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                                                <div class="flex-1 w-full">
                                                    <h3 class="font-bold text-lg text-gray-900 mb-2">
                                                        <?= htmlspecialchars($activity['name'] ?? 'Activité') ?>
                                                    </h3>
                                                    <p class="text-sm text-gray-600 mb-3">
                                                        <?= htmlspecialchars($activity['description'] ?? '') ?> •
                                                        <?= htmlspecialchars($activity['duration'] ?? '') ?>
                                                    </p>
                                                </div>
                                                <div class="text-right w-full md:w-auto">
                                                    <p class="text-3xl font-bold text-indigo-600 mb-3">
                                                        $<?= htmlspecialchars($activity['price'] ?? 0) ?></p>
                                                    <a href="index.php?route=reserve&item_type=activity&item_id=<?= $activity['id'] ?>"
                                                        class="btn btn-primary w-full md:w-auto">Sélectionner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>