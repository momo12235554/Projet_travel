<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-2xl mt-10">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Connexion</h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <span class="block"><?= htmlspecialchars($error) ?></span>
        </div>
    <?php endif; ?>

    <form method="POST" action="?route=login" class="space-y-5">
        <input type="email" name="email" placeholder="Email" required
               class="w-full border border-gray-300 p-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
               
        <input type="password" name="password" placeholder="Mot de passe" required
               class="w-full border border-gray-300 p-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200">
               
        <button class="w-full bg-blue-600 text-white p-4 rounded-lg font-bold shadow-md hover:bg-blue-700 transition duration-300">
            Se Connecter
        </button>
    </form>

    <div class="mt-6 text-center pt-4 border-t">
        <a href="?route=register" class="text-green-600 hover:text-green-800 font-semibold transition duration-150">Pas de compte ? Créez-en un ici</a>
    </div>
</div>