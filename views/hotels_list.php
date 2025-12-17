<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-4">Hôtels disponibles</h1>
            <p class="text-gray-600 text-lg">Découvrez nos meilleures offres d'hôtels</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-12">
            <form action="index.php" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <input type="hidden" name="route" value="hotels">

                <div class="md:col-span-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Destination</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <input type="text" name="city" value="<?= htmlspecialchars($searchCity ?? '') ?>"
                            placeholder="Où allez-vous ?"
                            class="autocomplete-city w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Date d'arrivée</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <input type="date" name="date" value="<?= htmlspecialchars($searchDate ?? '') ?>"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Date de sortie</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        <input type="date" name="date_out" value="<?= htmlspecialchars($searchDateOut ?? '') ?>"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Voyageurs</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </span>
                        <select name="guests"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?= $i ?>" <?= (isset($searchGuests) && $searchGuests == $i) ? 'selected' : '' ?>>
                                    <?= $i ?> personne<?= $i > 1 ? 's' : '' ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $hotels = $hotels ?? [];

            $hotelImages = [
                'https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
            ];

            foreach ($hotels as $index => $hotel):
                $id = $hotel['id'];
                $name = $hotel['name'];
                $city = $hotel['city'];
                $stars = $hotel['stars'] ?? 0;
                $price = $hotel['price_per_night'];
                $description = $hotel['description'] ?? '';

                $rating = $stars;
                $reviews = rand(50, 500);
                $features = ['WiFi gratuit', 'Climatisation', 'Réception 24h/24'];
                $imageLabel = $name;
                ?>
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-200 overflow-hidden transition-all duration-300 card">
                    <div class="h-48 relative overflow-hidden group">
                        <img src="<?= $hotelImages[$index % count($hotelImages)] ?>" alt="<?= htmlspecialchars($name) ?>"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">

                        <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 shadow-lg">
                            <div class="flex items-center space-x-1">
                                <?php for ($i = 0; $i < $stars; $i++): ?>
                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2"><?= htmlspecialchars($name) ?></h3>
                        <p class="text-sm text-gray-600 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                            </svg>
                            <?= htmlspecialchars($city) ?>
                        </p>

                        <?php if (!empty($description)): ?>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2"><?= htmlspecialchars($description) ?></p>
                        <?php endif; ?>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach ($features as $feature): ?>
                                <span class="badge badge-primary"><?= htmlspecialchars($feature) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">À partir de</p>
                                <p class="text-2xl font-bold text-indigo-600">$<?= number_format($price, 0) ?></p>
                            </div>
                            <a href="index.php?route=reserve&item_type=hotel&item_id=<?= $id ?>" class="btn btn-primary">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>