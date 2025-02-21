<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#e6e3d7] min-h-screen flex flex-col">

    <!-- Navbar en haut -->
    <nav class="bg-[#635d45] shadow-md w-full">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo ou Titre -->
                <div class="text-2xl font-bold text-gray-100">
                    Bibliothèque
                </div>
                <a href="/bookdetails" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                           Details des livres
                        </a>
                <!-- Liens de navigation -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('profile') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                            Mon Profil
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-green-400 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                            Se connecter
                        </a>
                    @endauth

                    <a href="{{ route('profile') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Voir les livres
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Section principale sous la navbar -->
    <div class="flex flex-1">

        <!-- Partie gauche : Image -->
        <div class="w-1/3">
            <img src="im.jpeg" alt="Image" class=" ml-20 mt-5 mb-10 w-full h-full object-cover">
        </div>

        <!-- Partie droite : Contenu principal -->
        <div class="w-2/3 flex flex-col justify-center p-8">
        <h2 class="text-4xl font-bold text-center text-[#b1a46c] mb-6">Bienvenue sur la Bibliothèque</h2>

            <div class="text-center mb-6">
                <p class="text-gray-600 text-lg">
                Découvrez un vaste choix de livres, <br>magazines et ressources numériques pour tous les âges et centres d’intérêt.<br> Profitez d’un espace convivial pour lire, étudier<br> ou participer à nos activités culturelles.
                </p>
            </div>
<!-- Section des livres empruntables -->

            <!-- Boutons sous le contenu -->
            <!-- <div class="flex justify-center space-x-4 mt-6">
                @auth
                    <a href="{{ route('profile') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        Mon Profil
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Se connecter
                    </a>
                @endauth

                <a href="{{ route('profile') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Voir les livres
                </a>
            </div> -->
        </div>

    </div>

</body>
</html>
