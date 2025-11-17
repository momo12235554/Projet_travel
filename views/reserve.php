
<h2 class="text-2xl font-semibold mb-6">Réserver un(e) <?= htmlspecialchars($itemType) ?></h2>

<?php if (isset($message)): ?>
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?= htmlspecialchars($message) ?></span>
    </div>
<?php endif; ?>

<form method="POST" action="?route=reserve" class="max-w-md mx-auto space-y-4">
    <p class="text-lg">Vous allez réserver l'élément **ID: <?= htmlspecialchars($itemId) ?>** de type **<?= htmlspecialchars($itemType) ?>**.</p>
    
    <input type="hidden" name="item_id" value="<?= htmlspecialchars($itemId) ?>">
    <input type="hidden" name="item_type" value="<?= htmlspecialchars($itemType) ?>">
    
    <label for="date" class="block text-gray-700 font-medium">Date de début/d'utilisation:</label>
    <input type="date" name="date" required
           class="w-full border p-3 rounded-md focus:ring-purple-500 focus:border-purple-500">
           
    <button class="w-full bg-purple-600 text-white p-3 rounded-md hover:bg-purple-700 transition duration-300 font-medium">
        Valider la réservation
    </button>
</form>

