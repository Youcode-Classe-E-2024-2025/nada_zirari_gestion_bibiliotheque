<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-3xl w-full">
        <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Bienvenue sur la Bibliothèque</h2>

        <div class="text-center mb-6">
            <p class="text-gray-600 text-lg">
                Explorez notre collection de livres, gérez vos emprunts et bien plus encore !
            </p>
        </div>

        <div class="flex justify-center space-x-4">
            @auth
                <a href="{{ route('profile') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                    Mon Profil
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Se connecter
                </a>
            @endauth

            <a href="{{ route('books.index') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                Voir les livres
            </a>
        </div>
    </div>
</body>
</html>
