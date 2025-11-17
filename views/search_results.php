<div class="max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold mb-8 text-gray-900">
        Résultats de voyage pour <span class="text-blue-600"><?= htmlspecialchars($from) ?></span> → <span class="text-blue-600"><?= htmlspecialchars($to) ?></span>
    </h2>

    <?php if (empty($flights) && empty($hotels) && empty($activities)): ?>
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg" role="alert">
            <p class="font-bold">Désolé !</p>
            <p>Aucun résultat trouvé pour votre recherche. Essayez une autre destination.</p>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="col-span-1 bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-600">
            <h3 class="text-2xl font-semibold mb-4 flex items-center text-blue-800">✈️ Vols</h3>
            <?php if (!empty($flights)): ?>
                <?php foreach ($flights as $flight): ?>
                    <div class="border-b pb-4 mb-4 last:border-b-0 last:pb-0">
                        <p class="font-medium text-lg"><?= htmlspecialchars($flight['departure_city']) ?> → <?= htmlspecialchars($flight['arrival_city']) ?></p>
                        <p class="text-sm text-gray-600">Vol #<?= htmlspecialchars($flight['flight_number']) ?> | Prix : <span class="font-bold text-green-600"><?= htmlspecialchars($flight['price']) ?>€</span></p>
                        <a href="?route=reserve&item_type=flight&item_id=<?= $flight['id'] ?>" 
                           class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-150 font-medium">Réserver ce vol</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500">Aucun vol disponible pour cette route.</p>
            <?php endif; ?>
        </div>
        
        <div class="col-span-1 bg-white p-6 rounded-xl shadow-lg border-t-4 border-green-600">
            <h3 class="text-2xl font-semibold mb-4 flex items-center text-green-800">🏨 Hôtels</h3>
            <?php if (!empty($hotels)): ?>
                <?php foreach ($hotels as $hotel): ?>
                    <div class="border-b pb-4 mb-4 last:border-b-0 last:pb-0">
                        <p class="font-medium text-lg"><?= htmlspecialchars($hotel['name']) ?></p>
                        <p class="text-sm text-gray-600"><?= htmlspecialchars($hotel['stars']) ?> ⭐ | Prix/nuit : <span class="font-bold text-green-600"><?= htmlspecialchars($hotel['price_per_night']) ?>€</span></p>
                        <a href="?route=reserve&item_type=hotel&item_id=<?= $hotel['id'] ?>" 
                           class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-150 font-medium">Réserver cet hôtel</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500">Aucun hôtel trouvé à destination.</p>
            <?php endif; ?>
        </div>

        <div class="col-span-1 bg-white p-6 rounded-xl shadow-lg border-t-4 border-yellow-600">
            <h3 class="text-2xl font-semibold mb-4 flex items-center text-yellow-800">🤸 Activités</h3>
            <?php if (!empty($activities)): ?>
                <?php foreach ($activities as $activity): ?>
                    <div class="border-b pb-4 mb-4 last:border-b-0 last:pb-0">
                        <p class="font-medium text-lg"><?= htmlspecialchars($activity['name']) ?></p>
                        <p class="text-sm text-gray-600">Durée : <?= htmlspecialchars($activity['duration']) ?> | Prix : <span class="font-bold text-green-600"><?= htmlspecialchars($activity['price']) ?>€</span></p>
                        <a href="?route=reserve&item_type=activity&item_id=<?= $activity['id'] ?>" 
                           class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-150 font-medium">Réserver cette activité</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500">Aucune activité trouvée à destination.</p>
            <?php endif; ?>
        </div>
    </div>
</div>