<?php
// layouts/main.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Travel – Réservez vos voyages facilement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind en local (adapte le chemin si besoin : assets/ ou assests/) -->
    <link rel="stylesheet" href="assests/tailwind.min.css">
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-200">
        <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="index.php?route=home" class="flex items-center space-x-2">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-tr from-sky-500 to-indigo-500 text-white font-bold text-lg">
                    T
                </span>
                <span class="text-xl font-semibold text-slate-900">Travel</span>
            </a>

            <!-- Liens -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="index.php?route=home" class="text-slate-700 hover:text-sky-600 transition">Rechercher</a>
                <a href="index.php?route=hotels" class="text-slate-700 hover:text-sky-600 transition">Hôtels</a>
                <a href="index.php?route=activities" class="text-slate-700 hover:text-sky-600 transition">Activités</a>
                <a href="index.php?route=reservations" class="text-slate-700 hover:text-sky-600 transition">Mes réservations</a>

                <?php if (!empty($_SESSION['user_id'])): ?>
                    <span class="text-slate-500 text-xs uppercase tracking-wide">Connecté</span>
                    <a href="index.php?route=logout" class="px-3 py-1 rounded-full border border-slate-300 text-slate-700 hover:bg-slate-100 text-sm">
                        Déconnexion
                    </a>
                <?php else: ?>
                    <a href="index.php?route=login" class="text-slate-700 hover:text-sky-600 transition">Connexion</a>
                    <a href="index.php?route=register" class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 text-white shadow-sm hover:shadow-md text-sm font-semibold transition">
                        Inscription
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
        <?= $content ?? '' ?>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200 mt-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-xs text-slate-500 flex flex-col sm:flex-row justify-between gap-2">
            <p>© <?= date('Y') ?> Travel. Tous droits réservés.</p>
            <p>Projet d’exercice – inspiration Booking / Skyscanner.</p>
        </div>
    </footer>

</body>
</html>
