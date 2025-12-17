<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Pro - Réservation de billets et voyage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        #accueil {
            background-color: rgba(99, 102, 241, 0.1);
            font-weight: 600;
            color: #4F46E5 !important;
        }
    </style>
</head>

<body class="text-gray-900 antialiased">

    <!-- NAVBAR -->
    <nav class="bg-white/90 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- LOGO -->
                <a href="index.php?route=home" class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 2L11 13"></path>
                            <path d="M22 2l-7 20-4-9-9-4 20-7z"></path>
                        </svg>
                    </div>
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent hidden sm:inline">
                        Travel Pro
                    </span>
                </a>

                <!-- MENU DESKTOP -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php?route=home"
                        class="px-4 py-2 rounded-lg hover:bg-red-500 hover:text-blue-500">Accueil</a>

                    <a href="index.php?route=hotels"
                        class="px-4 py-2 rounded-lg hover:bg-red-500 hover:text-blue-500>Hôtels</a>

                    <a href="index.php?route=activities"
                        class="px-4 py-2 rounded-lg hover:bg-gray-50 transition">Activités</a>

                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <a href="index.php?route=reservations"
                            class="px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                            Mes réservations
                        </a>

                        <a href="index.php?route=logout"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Déconnexion
                        </a>
                    <?php else: ?>
                        <a href="index.php?route=login"
                            class="px-4 py-2 rounded-lg hover:bg-gray-50 transition">Connexion</a>

                        <a href="index.php?route=register"
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow">
                            Inscription
                        </a>
                    <?php endif; ?>
                </div>

                <!-- BOUTON MOBILE -->
                <button id="mobile-menu-btn"
                    class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- MENU MOBILE -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-1 border-t border-gray-100">
                <a href="index.php?route=home"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-50" id="accueil">Accueil</a>

                <a href="index.php?route=hotels"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-50">Hôtels</a>

                <a href="index.php?route=activities"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-50">
                    Activités
                </a>

                <?php if (!empty($_SESSION['user_id'])): ?>
                    <a href="index.php?route=reservations"
                        class="block px-4 py-2 rounded-lg hover:bg-gray-50">
                        Mes réservations
                    </a>

                    <a href="index.php?route=logout"
                        class="block px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Déconnexion
                    </a>
                <?php else: ?>
                    <a href="index.php?route=login"
                        class="block px-4 py-2 rounded-lg hover:bg-gray-50">
                        Connexion
                    </a>

                    <a href="index.php?route=register"
                        class="block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Inscription
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- CONTENU -->
    <main class="min-h-screen">
        <?= $content ?? '' ?>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 mt-20 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-16 text-center text-sm text-gray-400">
            <p>&copy; 2025 Travel Pro. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="assets/js/app.js"></script>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
