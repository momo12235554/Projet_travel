<section class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Créer un compte</h1>
                <p class="text-gray-600 mt-2">Rejoignez Travel Pro aujourd'hui</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-start space-x-3">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="?route=register" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Adresse email</label>
                    <input type="email" id="email" name="email" placeholder="vous@exemple.com" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20 transition-all duration-200"
                        autocomplete="email">
                    <p class="text-xs text-gray-500 mt-1">Nous ne partagerons jamais votre email</p>
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20 transition-all duration-200"
                        autocomplete="new-password">
                    <p class="text-xs text-gray-500 mt-1">Minimum 8 caractères, avec lettres et chiffres</p>
                </div>

                <div>
                    <label for="password_confirm" class="block text-sm font-semibold text-gray-700 mb-2">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="••••••••" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-20 transition-all duration-200"
                        autocomplete="new-password">
                </div>

                <div class="flex items-start">
                    <input type="checkbox" id="terms" name="terms" required class="mt-1">
                    <label for="terms" class="ml-3 text-sm text-gray-700">
                        J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">conditions d'utilisation</a> et la <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">politique de confidentialité</a>
                    </label>
                </div>

                <button type="submit" class="w-full btn btn-primary text-lg py-3">
                    Créer un compte
                </button>

                <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
                    <div class="text-center text-sm">
                        <svg class="w-6 h-6 text-indigo-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-600">Accès instantané</p>
                    </div>
                    <div class="text-center text-sm">
                        <svg class="w-6 h-6 text-indigo-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-600">Meilleurs prix</p>
                    </div>
                    <div class="text-center text-sm">
                        <svg class="w-6 h-6 text-indigo-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-600">Support 24/7</p>
                    </div>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <p class="text-gray-600">Vous avez déjà un compte ? 
                    <a href="index.php?route=login" class="font-semibold text-indigo-600 hover:text-indigo-700">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</section>
