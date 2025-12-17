<section class="hero-gradient text-white pt-20 pb-32 md:pt-32 md:pb-48">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight animate-fade-in-up">
                    Voyagez sans limites
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-8 leading-relaxed animate-fade-in-up animation-delay-200">
                    Découvrez les meilleures offres de vols, hôtels et activités. Réservez simplement et voyagez
                    confidemment.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up animation-delay-400">
                    <a href="index.php?route=hotels" class="btn btn-primary inline-flex items-center justify-center">
                        <span>Explorer les hôtels</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="index.php?route=search"
                        class="btn btn-secondary inline-flex items-center justify-center border-white text-white hover:bg-white hover:text-indigo-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span>Recherche avancée</span>
                    </a>
                </div>
            </div>
            <div class="hidden md:block animate-fade-in-up animation-delay-400">
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-8 border border-white border-opacity-20 shadow-2xl">
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8m0 8l-4-2m4 2l4-2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm opacity-80">Départ</p>
                                <p class="text-xl font-semibold">Paris (CDG)</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm opacity-80">Destination</p>
                                <p class="text-xl font-semibold">Bangkok (BKK)</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm opacity-80">Date</p>
                                <p class="text-xl font-semibold">15 Dec 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-12 pt-0 md:pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="bg-white rounded-xl shadow-xl p-6 md:p-8 border border-gray-200 -mt-24 relative z-10">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 text-center">Trouvez votre prochaine
                destination</h2>
            <form action="index.php" method="get" class="space-y-6">
                <input type="hidden" name="route" value="search_results">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="inline-flex rounded-xl border border-gray-200 bg-gray-50 p-1">
                        <label class="px-4 py-2 rounded-lg text-sm font-semibold cursor-pointer select-none"
                            id="trip-one-way-label">
                            <input type="radio" name="trip" value="one_way" class="sr-only" checked>
                            Aller simple
                        </label>
                        <label class="px-4 py-2 rounded-lg text-sm font-semibold cursor-pointer select-none"
                            id="trip-round-trip-label">
                            <input type="radio" name="trip" value="round_trip" class="sr-only">
                            Aller-retour
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">Choisissez votre type de trajet</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Départ</label>
                        <input type="text" name="from" placeholder="Ville de départ" required
                            class="autocomplete-city w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Arrivée</label>
                        <input type="text" name="to" placeholder="Destination" required
                            class="autocomplete-city w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                        <input type="date" name="date" id="outbound-date" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                    </div>

                    <div id="return-date-wrap" class="hidden">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date retour</label>
                        <input type="date" name="return_date" id="return-date"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Passagers</label>
                        <select name="passengers"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                            <option value="1">1 passager</option>
                            <option value="2">2 passagers</option>
                            <option value="3">3 passagers</option>
                            <option value="4">4+ passagers</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="btn btn-primary w-full md:w-auto inline-flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">Pourquoi nous choisir ?</h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Travel Pro offre les meilleurs prix et une
            expérience de réservation simple et sécurisée.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl border border-gray-200 p-8 card hover:border-indigo-300">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-indigo-100 to-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Meilleurs prix garantis</h3>
                <p class="text-gray-600 mb-4">Comparez les offres de +1000 fournisseurs et trouvez les meilleurs prix
                    sur vols, hôtels et activités.</p>
                <span class="text-sm text-indigo-600 font-semibold">Jusqu'à 60% de réduction</span>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8 card hover:border-indigo-300">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-green-100 to-emerald-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Paiement 100% sécurisé</h3>
                <p class="text-gray-600 mb-4">Vos données sont chiffrées et protégées selon les normes PCI-DSS les plus
                    strictes.</p>
                <span class="text-sm text-green-600 font-semibold">SSL certifié - Garantie de remboursement</span>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8 card hover:border-indigo-300">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-purple-100 to-pink-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Support instantané 24/7</h3>
                <p class="text-gray-600 mb-4">Chat en direct, email, téléphone - notre équipe multilingue répond en
                    moins de 5 minutes.</p>
                <span class="text-sm text-purple-600 font-semibold">Disponible 365j/365j</span>
            </div>
        </div>
    </div>
</section>

<section class="py-20 md:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Avis de nos voyageurs</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $testimonials = [
                (object) ['name' => 'Sophie Martin', 'city' => 'Lyon', 'rating' => 5, 'text' => 'Incroyable ! J\'ai trouvé des vols 40% moins chers qu\'ailleurs. Service client réactif et efficace.'],
                (object) ['name' => 'Jean Dupont', 'city' => 'Paris', 'rating' => 5, 'text' => 'Réservation ultra simple. J\'ai réservé mon voyage en 10 minutes seulement. Recommandé !'],
                (object) ['name' => 'Marie Laurent', 'city' => 'Marseille', 'rating' => 4, 'text' => 'Très bon rapport qualité-prix. Les filtres de recherche sont vraiment pratiques et détaillés.'],
            ];
            foreach ($testimonials as $testimonial): ?>
                <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
                    <div class="flex items-center mb-4">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg class="w-5 h-5 <?= $i < $testimonial->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' ?>"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-gray-700 mb-4 italic">"<?= $testimonial->text ?>"</p>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-900"><?= $testimonial->name ?></p>
                            <p class="text-sm text-gray-600"><?= $testimonial->city ?></p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-full"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20 md:py-28 bg-gradient-to-r from-indigo-600 to-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">2M+</div>
                <p class="text-indigo-100">Voyageurs satisfaits</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">50K+</div>
                <p class="text-indigo-100">Destinations</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">1M+</div>
                <p class="text-indigo-100">Hôtels partenaires</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">24/7</div>
                <p class="text-indigo-100">Support client</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 md:py-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Prêt à voyager ?</h2>
        <p class="text-xl text-gray-600 mb-8">Créez votre compte ou connectez-vous pour commencer à réserver vos
            voyages.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="index.php?route=register" class="btn btn-primary inline-block">Créer un compte</a>
            <a href="index.php?route=login" class="btn btn-secondary inline-block">Se connecter</a>
        </div>
    </div>
</section>