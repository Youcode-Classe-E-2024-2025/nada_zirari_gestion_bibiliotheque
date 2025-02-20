<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar en haut -->
    <nav class="bg-white shadow-md w-full">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo ou Titre -->
                <div class="text-2xl font-bold text-gray-700">
                    Bibliothèque
                </div>
                <!-- Liens de navigation -->
                <div class="flex items-center space-x-4">
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Section principale sous la navbar -->
    <div class="flex flex-1">

        <!-- Partie gauche : Image -->
        <div class="w-1/3">
            <img src="im.jpeg" alt="Image" class="w-full h-full object-cover">
        </div>

        <!-- Partie droite : Contenu principal -->
        <div class="w-2/3 flex flex-col justify-center p-8">
            <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Bienvenue sur la Bibliothèque</h2>

            <div class="text-center mb-6">
                <p class="text-gray-600 text-lg">
                    Explorez notre collection de livres, gérez vos emprunts et bien plus encore !
                </p>
            </div>

            <!-- Boutons sous le contenu -->
            <div class="flex justify-center space-x-4 mt-6">
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
            </div>
        </div>

    </div>

</body>
</html>
