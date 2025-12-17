<section class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-4">Recherche avancée</h1>
            <p class="text-gray-600">Affinez votre recherche pour trouver exactement ce que vous cherchez</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
            <form action="index.php?route=search_results" method="get" class="space-y-8">
                <input type="hidden" name="route" value="search_results">

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Informations de voyage</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Départ</label>
                            <input type="text" name="from" placeholder="Ville de départ" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Destination</label>
                            <input type="text" name="to" placeholder="Destination" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Dates</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date de départ</label>
                            <input type="date" name="date_from" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date de retour</label>
                            <input type="date" name="date_to" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre de nuits</label>
                            <input type="number" name="nights" min="1" placeholder="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Voyageurs</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Adultes</label>
                            <select name="adults" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                <option value="1">1 adulte</option>
                                <option value="2">2 adultes</option>
                                <option value="3">3 adultes</option>
                                <option value="4">4+ adultes</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Enfants</label>
                            <select name="children" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                <option value="0">Aucun</option>
                                <option value="1">1 enfant</option>
                                <option value="2">2 enfants</option>
                                <option value="3">3+ enfants</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Budget</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Budget minimum</label>
                            <input type="number" name="budget_min" placeholder="500" min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Budget maximum</label>
                            <input type="number" name="budget_max" placeholder="5000" min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Préférences</h3>
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="direct_flights" class="rounded">
                            <span class="ml-3 text-gray-700">Vols directs uniquement</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="wifi" class="rounded">
                            <span class="ml-3 text-gray-700">WiFi gratuit requis</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="pool" class="rounded">
                            <span class="ml-3 text-gray-700">Piscine</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="gym" class="rounded">
                            <span class="ml-3 text-gray-700">Salle de sport</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full btn btn-primary text-lg py-4">
                    Rechercher
                </button>
            </form>
        </div>
    </div>
</section>
