<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-4">Finaliser votre réservation</h1>
            <p class="text-gray-600">Complétez vos informations pour confirmer votre réservation</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
                    <form method="POST" action="?route=reserve" class="space-y-8">
                        <input type="hidden" name="item_id" value="<?= htmlspecialchars($itemId) ?>">
                        <input type="hidden" name="item_type" value="<?= htmlspecialchars($itemType) ?>">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Informations personnelles</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom</label>
                                    <input type="text" name="first_name" placeholder="Jean" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nom</label>
                                    <input type="text" name="last_name" placeholder="Dupont" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" placeholder="jean@exemple.com" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone</label>
                                    <input type="tel" name="phone" placeholder="+33 6 12 34 56 78" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Adresse</h2>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse</label>
                                    <input type="text" name="address" placeholder="123 rue de la Paix" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ville</label>
                                        <input type="text" name="city" placeholder="Paris" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Code
                                            postal</label>
                                        <input type="text" name="zip" placeholder="75001" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pays</label>
                                        <select name="country" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                            <option value="">Sélectionner</option>
                                            <option value="FR">France</option>
                                            <option value="DE">Allemagne</option>
                                            <option value="BE">Belgique</option>
                                            <option value="CH">Suisse</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Paiement</h2>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Numéro de
                                        carte</label>
                                    <input type="text" name="card_number" placeholder="4532 1234 5678 9010" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Expiration</label>
                                        <input type="text" name="card_exp" placeholder="MM/YY" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">CVV</label>
                                        <input type="text" name="card_cvv" placeholder="123" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nom du
                                            titulaire</label>
                                        <input type="text" name="card_holder" placeholder="Jean Dupont" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="terms" name="terms" required class="mt-1">
                            <label for="terms" class="ml-3 text-gray-700">
                                J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-700">conditions
                                    d'utilisation</a> et la <a href="#"
                                    class="text-indigo-600 hover:text-indigo-700">politique de confidentialité</a>
                            </label>
                        </div>

                        <button type="submit" class="w-full btn btn-primary text-lg py-4">
                            Confirmer la réservation
                        </button>
                    </form>
                </div>
            </div>

            <div>
                <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Récapitulatif</h3>

                    <?php
                    $price = 0;
                    $label = '';
                    if ($itemType === 'flight') {
                        $price = $item['price'];
                        $flightNum = $item['flight_number'] ?? 'Vol';
                        $dep = $item['departure_city'] ?? 'Départ';
                        $arr = $item['arrival_city'] ?? 'Arrivée';
                        $label = "Vol: $flightNum ($dep -> $arr)";
                    } elseif ($itemType === 'hotel') {
                        $price = $item['price_per_night'] ?? $item['price'] ?? 0;
                        $label = 'Hôtel: ' . ($item['name'] ?? 'Hôtel inconnu');
                    } elseif ($itemType === 'activity') {
                        $price = $item['price'] ?? 0;
                        $label = 'Activité: ' . ($item['name'] ?? 'Activité inconnue');
                    }

                    $taxes = $price * 0.15;
                    $fees = 29;
                    $total = $price + $taxes + $fees;
                    ?>

                    <div class="space-y-4 pb-6 border-b border-gray-200">
                        <div class="flex justify-between">
                            <span class="text-gray-600 w-2/3"><?= htmlspecialchars($label) ?></span>
                            <span class="font-semibold text-gray-900">$<?= number_format($price, 2) ?></span>
                        </div>
                    </div>

                    <div class="space-y-4 py-6 border-b border-gray-200">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sous-total</span>
                            <span class="font-semibold text-gray-900">$<?= number_format($price, 2) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Taxes (15%)</span>
                            <span class="font-semibold text-gray-900">$<?= number_format($taxes, 2) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Frais</span>
                            <span class="font-semibold text-gray-900">$<?= number_format($fees, 2) ?></span>
                        </div>
                    </div>

                    <div class="py-6">
                        <div class="flex justify-between">
                            <span class="text-lg font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-bold text-indigo-600">$<?= number_format($total, 2) ?></span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="flex items-start space-x-4 pb-4 border-b border-gray-200">
                            <div
                                class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Besoin d'aide ?</p>
                                <p class="text-sm text-gray-600">Parcourez notre guide de réservation ou <a href="#"
                                        class="text-indigo-600 hover:text-indigo-700">contactez le support</a></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 py-4 border-b border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 font-semibold">Annulation gratuite</p>
                                <p class="text-sm text-gray-900 font-semibold">Jusqu'à 48h avant</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-semibold">Paiement flexible</p>
                                <p class="text-sm text-gray-900 font-semibold">Sécurisé & vérifié</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <p class="text-sm font-semibold text-gray-900">Moyens de paiement acceptés</p>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="px-2 py-1 bg-gray-100 text-xs font-semibold text-gray-700 rounded">Visa</span>
                                <span
                                    class="px-2 py-1 bg-gray-100 text-xs font-semibold text-gray-700 rounded">Mastercard</span>
                                <span
                                    class="px-2 py-1 bg-gray-100 text-xs font-semibold text-gray-700 rounded">PayPal</span>
                                <span class="px-2 py-1 bg-gray-100 text-xs font-semibold text-gray-700 rounded">Apple
                                    Pay</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>