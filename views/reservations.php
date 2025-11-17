
<h2 class="text-2xl font-semibold mb-6">Mes Réservations</h2>

<?php if (empty($reservations)): ?>
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <p class="font-bold">Information</p>
        <span class="block sm:inline">Aucune réservation trouvée pour le moment.</span>
    </div>
<?php else: ?>
    <ul class="space-y-4">
        <?php foreach ($reservations as $res): ?>
            <li class="p-4 border rounded-lg shadow-sm bg-white hover:bg-gray-50 transition duration-150">
                <p class="font-bold text-lg capitalize"><?= htmlspecialchars($res['item_type']) ?> #<?= htmlspecialchars($res['item_id']) ?></p>
                <p class="text-gray-600">Réservé pour le: <span class="font-medium text-purple-600"><?= date('d/m/Y', strtotime($res['date_reserved'])) ?></span></p>
                <p class="text-sm text-gray-500">Date de création: <?= date('d/m/Y H:i', strtotime($res['created_at'] ?? 'now')) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

