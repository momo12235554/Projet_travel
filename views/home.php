<?php
// views/home.php
?>
<section class="space-y-10">

    <!-- HERO + BARRE DE RECHERCHE -->
    <div class="bg-gradient-to-br from-sky-500/90 via-indigo-500/90 to-violet-500/90 rounded-3xl text-white p-6 sm:p-10 shadow-lg relative overflow-hidden">
        <!-- Décor rond flou -->
        <div class="pointer-events-none absolute -top-10 -right-10 w-40 h-40 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 grid gap-8 lg:grid-cols-[1.1fr,0.9fr] items-center">
            <!-- Texte -->
            <div class="space-y-4">
                <p class="text-xs uppercase tracking-[0.25em] text-sky-100/90">Voyages</p>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight">
                    Trouvez vos <span class="font-bold">vols, hôtels</span> et <span class="font-bold">activités</span>
                    au meilleur prix.
                </h1>
                <p class="text-sm sm:text-base text-sky-100/90 max-w-xl">
                    Comparez en quelques secondes les meilleures offres de vols, d’hébergements et de loisirs
                    dans le monde entier. Inspirez-vous, réservez, partez serein.
                </p>

                <ul class="flex flex-wrap gap-4 text-xs sm:text-sm text-sky-100/90">
                    <li class="inline-flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-sky-200"></span>
                        Réservation rapide et sécurisée
                    </li>
                    <li class="inline-flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-sky-200"></span>
                        Des millions d’offres comparées
                    </li>
                    <li class="inline-flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-sky-200"></span>
                        Sans frais cachés côté front 😉
                    </li>
                </ul>
            </div>

            <!-- Carte : Formulaire -->
            <div>
                <div class="bg-white text-slate-900 rounded-2xl shadow-xl p-5 sm:p-6 space-y-4">
                    <!-- Onglets (design, pas encore fonctionnels multi-types) -->
                    <div class="flex text-xs sm:text-sm font-medium rounded-full bg-slate-100 p-1">
                        <button class="flex-1 py-1.5 rounded-full bg-white shadow text-slate-900">
                            Vols
                        </button>
                        <button class="flex-1 py-1.5 rounded-full text-slate-500 hover:text-slate-700 transition">
                            Hôtels
                        </button>
                        <button class="flex-1 py-1.5 rounded-full text-slate-500 hover:text-slate-700 transition">
                            Activités
                        </button>
                    </div>

                    <!-- Formulaire de recherche -->
                    <form action="index.php" method="get" class="space-y-3">
                        <input type="hidden" name="route" value="search_results">

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="space-y-1">
                                <label class="text-xs font-medium text-slate-600">Départ</label>
                                <input
                                    type="text"
                                    name="from"
                                    placeholder="Paris, France"
                                    class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-300"
                                    required
                                >
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-medium text-slate-600">Arrivée</label>
                                <input
                                    type="text"
                                    name="to"
                                    placeholder="Rome, Italie"
                                    class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-300"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-[1.1fr,0.9fr] items-end">
                            <div class="space-y-1">
                                <label class="text-xs font-medium text-slate-600">Date</label>
                                <input
                                    type="date"
                                    name="date"
                                    class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-300"
                                    required
                                >
                            </div>

                            <button
                                type="submit"
                                class="inline-flex justify-center items-center w-full rounded-xl bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold text-sm py-2.5 shadow-md hover:shadow-lg transition active:scale-[0.99]"
                            >
                                Rechercher
                            </button>
                        </div>
                    </form>

                    <p class="text-[11px] text-slate-500 text-center">
                        En continuant, vous acceptez les conditions d’utilisation de Travel.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION : NOS SERVICES -->
    <section class="space-y-4">
        <div class="flex items-baseline justify-between gap-2">
            <h2 class="text-xl sm:text-2xl font-semibold text-slate-900">Nos services</h2>
            <p class="text-xs sm:text-sm text-slate-500">
                Tout ce dont vous avez besoin pour un voyage complet.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            <!-- Carte vols -->
            <article class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 p-4 sm:p-5 transition">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-sky-100 text-sky-600 mb-3">
                    ✈️
                </div>
                <h3 class="font-semibold text-slate-900 mb-1.5">Vols</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Comparez rapidement les prix des principales compagnies aériennes et trouvez le billet parfait.
                </p>
                <a href="index.php?route=home" class="text-xs font-medium text-sky-600 hover:text-sky-700">
                    Rechercher un vol →
                </a>
            </article>

            <!-- Carte hôtels -->
            <article class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 p-4 sm:p-5 transition">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 mb-3">
                    🏨
                </div>
                <h3 class="font-semibold text-slate-900 mb-1.5">Hôtels</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Explorez des milliers d’hébergements : hôtels, appartements, maisons d’hôtes et plus encore.
                </p>
                <a href="index.php?route=hotels" class="text-xs font-medium text-emerald-600 hover:text-emerald-700">
                    Voir les hôtels →
                </a>
            </article>

            <!-- Carte activités -->
            <article class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100 p-4 sm:p-5 transition">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-100 text-amber-600 mb-3">
                    🎟️
                </div>
                <h3 class="font-semibold text-slate-900 mb-1.5">Activités</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Réservez visites guidées, excursions, billets coupe-file et expériences uniques.
                </p>
                <a href="index.php?route=activities" class="text-xs font-medium text-amber-600 hover:text-amber-700">
                    Découvrir des activités →
                </a>
            </article>
        </div>
    </section>

</section>
