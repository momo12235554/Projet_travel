<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-4">Activités disponibles</h1>
            <p class="text-gray-600 text-lg">Explorez nos meilleures activités de voyage</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-8">
            <form action="index.php" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <input type="hidden" name="route" value="activities">
                
                <div class="md:col-span-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Destination</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </span>
                        <input type="text" name="city" value="<?= htmlspecialchars($searchCity ?? '') ?>" 
                               placeholder="Où voulez-vous aller ?"
                               class="autocomplete-city w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="md:col-span-3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Date</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </span>
                        <input type="date" name="date" value="<?= htmlspecialchars($searchDate ?? '') ?>"
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="md:col-span-3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Participants</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </span>
                        <select name="guests" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <?php for($i=1; $i<=10; $i++): ?>
                                <option value="<?= $i ?>" <?= (isset($searchGuests) && $searchGuests == $i) ? 'selected' : '' ?>>
                                    <?= $i ?> personne<?= $i > 1 ? 's' : '' ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <div class="flex flex-wrap gap-3 mb-12">
            <button
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">Toutes</button>
            <button
                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300">Aventure</button>
            <button
                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300">Culture</button>
            <button
                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300">Détente</button>
            <button
                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300">Gastronomie</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $get = static function ($row, string $key, $default = null) {
                if (is_array($row)) {
                    return $row[$key] ?? $default;
                }
                if (is_object($row)) {
                    return isset($row->$key) ? $row->$key : $default;
                }
                return $default;
            };

            $activities = $activities ?? [];

            $imagesBaseUrl = 'assets/images/activities/';
            $imagesBasePath = __DIR__ . '/../assets/images/activities/';

            $pickImage = static function (string $file) use ($imagesBaseUrl, $imagesBasePath) {
                $file = ltrim($file, '/');
                if ($file === '') return $imagesBaseUrl . 'default.jpg';
                if (preg_match('#^https?://#i', $file)) return $file;

                $candidatePath = $imagesBasePath . $file;
                if (is_file($candidatePath)) {
                    return $imagesBaseUrl . $file;
                }
                return $imagesBaseUrl . 'default.jpg';
            };

            foreach ($activities as $index => $activity):
                $id = (int) $get($activity, 'id', 0);
                $name = (string) $get($activity, 'name', 'Activité');
                $city = (string) $get($activity, 'city', '');
                $duration = (string) $get($activity, 'duration', 'Durée variable');
                $price = (float) $get($activity, 'price', 0);
                $description = (string) $get($activity, 'description', '');

                $category = (string) $get($activity, 'category', 'Découverte');
                $ratingRaw = $get($activity, 'rating', 4.8);
                $rating = is_numeric($ratingRaw) ? (float) $ratingRaw : 4.8;
                if ($rating < 0) $rating = 0;
                if ($rating > 5) $rating = 5;
                $reviewsRaw = $get($activity, 'reviews', null);
                $reviews = is_numeric($reviewsRaw) ? (int) $reviewsRaw : rand(50, 200);

                $imgUrl = $imagesBaseUrl . 'default.jpg';
                $imageField = (string) $get($activity, 'image', '');
                if ($imageField !== '') {
                    $imgUrl = $pickImage($imageField);
                } else {
                    if (stripos($city, 'Paris') !== false || stripos($name, 'Eiffel') !== false || stripos($name, 'Seine') !== false) {
                        $imgUrl = $pickImage('paris.jpg');
                    } elseif (stripos($city, 'Casablanca') !== false || stripos($name, 'Hassan') !== false) {
                        $imgUrl = $pickImage('casablanca.jpg');
                    } elseif (stripos($city, 'Marrakech') !== false || stripos($name, 'Majorelle') !== false || stripos($name, 'Jemaa') !== false) {
                        $imgUrl = $pickImage('marrakech.jpg');
                    } elseif (stripos($city, 'Alger') !== false || stripos($name, 'Makham') !== false || stripos($name, 'Casbah') !== false || stripos($name, 'Aurassi') !== false) {
                        $imgUrl = $pickImage('alger.jpg');
                    } elseif (stripos($city, 'Rome') !== false || stripos($name, 'Colise') !== false) {
                        $imgUrl = $pickImage('rome.jpg');
                    } elseif (stripos($city, 'Lisbonne') !== false || stripos($city, 'Lisbon') !== false) {
                        $imgUrl = $pickImage('lisbonne.jpg');
                    } elseif (stripos($city, 'Haiti') !== false || stripos($city, 'Port-au-Prince') !== false || stripos($name, 'Citadelle') !== false || stripos($name, 'Bassin') !== false) {
                        $imgUrl = $pickImage('haiti.jpg');
                    } elseif (stripos($city, 'Dubai') !== false || stripos($name, 'Burj') !== false) {
                        $imgUrl = $pickImage('dubai.jpg');
                    }
                }
                ?>
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-200 overflow-hidden transition-all duration-300 card">
                    <div class="h-48 relative overflow-hidden group">
                        <img src="<?= htmlspecialchars($imgUrl) ?>"
                            alt="<?= htmlspecialchars($name) ?>"
                            loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">

                        <div class="absolute top-4 left-4 flex gap-2">
                            <span
                                class="badge badge-primary bg-indigo-600 text-white shadow-sm"><?= htmlspecialchars($category) ?></span>
                            <span
                                class="badge badge-primary bg-gray-600 text-white shadow-sm"><?= htmlspecialchars($city) ?></span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-1">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <svg class="w-4 h-4 <?= $i < (int) floor($rating) ? 'text-yellow-400 fill-current' : 'text-gray-300' ?>"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                <?php endfor; ?>
                                <span
                                    class="ml-2 text-sm font-semibold text-gray-900"><?= number_format($rating, 1) ?></span>
                            </div>
                            <span class="text-xs text-gray-600">(<?= $reviews ?> avis)</span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-4"><?= htmlspecialchars($name) ?></h3>

                        <?php if (!empty($description)): ?>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2"><?= htmlspecialchars($description) ?></p>
                        <?php endif; ?>

                        <div class="space-y-2 mb-4 text-sm text-gray-600 pb-4 border-b border-gray-200">
                            <p class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <?= htmlspecialchars($duration) ?>
                            </p>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">À partir de</p>
                                <p class="text-2xl font-bold text-indigo-600">$<?= number_format($price, 0) ?></p>
                            </div>
                            <a href="index.php?route=reserve&item_type=activity&item_id=<?= $id ?>" class="btn btn-primary">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>