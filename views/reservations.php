        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <h1 class="text-4xl font-bold mb-2">Mes réservations</h1>
                    <p class="text-gray-600">Gérez toutes vos réservations de voyage</p>
                </div>

                <?php if (empty($_SESSION['user_id'])): ?>
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-8 text-center">
                        <svg class="w-16 h-16 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Connectez-vous pour voir vos réservations</h2>
                        <p class="text-gray-600 mb-6">Vous devez être connecté pour accéder à vos réservations.</p>
                        <a href="index.php?route=login" class="btn btn-primary inline-block">Se connecter</a>
                    </div>
                <?php else: ?>

                    <?php if (isset($suggestion)): ?>
                        <div class="mb-12 bg-indigo-50 border border-indigo-200 rounded-xl p-6 shadow-sm">
                            <h2 class="text-2xl font-bold text-indigo-900 mb-4">
                                <?php if ($suggestion === 'hotel_activity'): ?>
                                    🎉 Vol réservé ! Et si vous réserviez un hôtel ou une activité ?
                                <?php elseif ($suggestion === 'activity'): ?>
                                    🏨 Hôtel réservé ! Découvrez des activités locales !
                                <?php else: ?>
                                    Merci pour votre réservation !
                                <?php endif; ?>
                            </h2>
                            <div class="flex gap-4">
                                <?php if ($suggestion === 'hotel_activity'): ?>
                                    <a href="?route=search&type=hotel" class="btn btn-primary">Voir les hôtels</a>
                                    <a href="?route=search&type=activity"
                                        class="btn btn-primary bg-purple-600 hover:bg-purple-700 border-purple-600">Voir les activités</a>
                                <?php elseif ($suggestion === 'activity'): ?>
                                    <a href="?route=search&type=activity"
                                        class="btn btn-primary bg-purple-600 hover:bg-purple-700 border-purple-600">Voir les activités</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex items-center">
                                <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8m0 8l-4-2m4 2l4-2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600  text-sm ">Vols réservés</p>
                                    <p class="text-3xl font-bold text-gray-900">
                                        <?= count(array_filter($reservations, fn($r) => $r['item_type'] === 'flight')) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex items-center">
                                <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Hôtels réservés</p>
                                    <p class="text-3xl font-bold text-gray-900">
                                        <?= count(array_filter($reservations, fn($r) => $r['item_type'] === 'hotel')) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex items-center">
                                <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 6l-3.5 3.5a7 7 0 010 9.9L14 22M2 9l3.5-3.5a7 7 0 0110 0L16 9"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Activités réservées</p>
                                    <p class="text-3xl font-bold text-gray-900">
                                        <?= count(array_filter($reservations, fn($r) => $r['item_type'] === 'activity')) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <?php if (empty($reservations)): ?>
                            <p class="text-center text-gray-500 py-8">Vous n'avez pas encore de réservations.</p>
                        <?php else: ?>
                            <?php foreach ($reservations as $res): ?>
                                <?php
                                $details = $res['details'];
                                $type = $res['item_type'];
                                $iconClass = '';
                                $iconPath = '';
                                $title = '';
                                $subTitle = '';
                                $price = 0;
                                $colorClass = '';

                                if ($type === 'flight') {
                                    $iconBg = 'bg-indigo-100';
                                    $iconColor = 'text-indigo-600';
                                    $iconPath = 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8m0 8l-4-2m4 2l4-2';
                                    $title = $details['flight_number'] ?? 'Vol';
                                    $subTitle = ($details['departure_city'] ?? '?') . ' → ' . ($details['arrival_city'] ?? '?');
                                    $price = $details['price'] ?? 0;
                                    $colorClass = 'text-indigo-600';
                                } elseif ($type === 'hotel') {
                                    $iconBg = 'bg-green-100';
                                    $iconColor = 'text-green-600';
                                    $iconPath = 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4';
                                    $title = $details['name'] ?? 'Hôtel inconnu';
                                    $subTitle = $details['city'] ?? 'Ville inconnue';
                                    $price = $details['price_per_night'] ?? $details['price'] ?? 0;
                                    $colorClass = 'text-green-600';
                                } elseif ($type === 'activity') {
                                    $iconBg = 'bg-purple-100';
                                    $iconColor = 'text-purple-600';
                                    $iconPath = 'M14 6l-3.5 3.5a7 7 0 010 9.9L14 22M2 9l3.5-3.5a7 7 0 0110 0L16 9';
                                    $title = $details['name'] ?? 'Activité inconnue';
                                    $subTitle = $details['duration'] ?? '';
                                    $price = $details['price'] ?? 0;
                                    $colorClass = 'text-purple-600';
                                }
                                ?>
                                <div
                                    class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                        <div class="flex items-start gap-4">
                                            <div class="w-12 h-12 <?= $iconBg ?> rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-6 h-6 <?= $iconColor ?>" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="<?= $iconPath ?>"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-lg text-gray-900 mb-1"><?= htmlspecialchars($title) ?></h3>
                                                <p class="text-gray-600 text-sm mb-2"><?= htmlspecialchars($subTitle) ?></p>
                                                <p class="text-sm text-gray-600">Réservé le <?= htmlspecialchars($res['date_reserved']) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <span class="inline-block badge badge-success mb-2">Confirmé</span>
                                            <p class="text-2xl font-bold <?= $colorClass ?>">$<?= htmlspecialchars($price) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>