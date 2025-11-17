<div class="max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold mb-8 text-green-600">
        Tous les Hôtels 
    </h2>

    <?php if (empty($hotels)): ?>
        <div class="bg-gray-100 border-l-4 border-gray-400 text-gray-700 p-4 rounded-lg" role="alert">
            <p>Aucun hôtel n'a été trouvé pour le moment.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($hotels as $hotel): ?>
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-green-500 hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900"><?= htmlspecialchars($hotel['name']) ?></h3>
                    <p class="text-gray-600 mb-3"><?= htmlspecialchars($hotel['description']) ?></p>
                    <p class="text-sm text-gray-500 mb-3">Ville : <?= htmlspecialchars($hotel['city']) ?> | Note : <?= str_repeat('⭐', $hotel['stars']) ?></p>
                    <div class="flex justify-between items-center pt-2 border-t">
                        <span class="text-lg font-bold text-green-600"><?= htmlspecialchars($hotel['price_per_night']) ?>€ / nuit</span>
                        <a href="?route=reserve&item_type=hotel&item_id=<?= $hotel['id'] ?>" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-150">Réserver</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>