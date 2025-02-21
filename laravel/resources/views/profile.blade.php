<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Navbar -->
<nav class="bg-blue-600 p-4 shadow-md fixed top-0 left-0 w-full z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-white text-xl font-bold">Bibliothèque</a>
        <div>
            @auth
                <a href="/" class="text-white mx-2">Livres</a>
                <a href="/profile" class="text-white mx-2">Profil</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white mx-2">Déconnexion</button>
                </form>
            @else
                <a href="/login" class="text-white mx-2">Connexion</a>
                <a href="/register" class="text-white mx-2">Inscription</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Corps de la page -->
<body class="bg-gray-100 min-h-screen pt-16 flex flex-col items-center justify-center">

    <!-- Conteneur principal -->
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl w-full flex flex-col md:flex-row">

        <!-- Partie gauche : Photo et nom de l'utilisateur -->
        <div class="w-full md:w-1/3 flex flex-col items-center mb-8 md:mb-0 md:border-r pr-8">
            <img src="photo.webp" alt="Photo de profil" class="w-32 h-32 rounded-full mb-4 object-cover">
            <h2 class="text-2xl font-bold text-gray-700">{{ $user->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $user->email }}</p>
        </div>

        <!-- Partie droite : Détails du profil -->
        <div class="w-full md:w-2/3 pl-0 md:pl-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-6">Détails du Profil</h3>

            <!-- Info utilisateur -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-800">Informations</h4>
                <ul class="space-y-2 mt-4 text-gray-700">
                    <li>Email : <span class="font-medium">{{ $user->email }}</span></li>
                    <!-- Ajouter d'autres informations ici -->
                    <!-- Par exemple, afficher la date d'inscription, etc. -->
                </ul>
            </div>

            <!-- Bouton de déconnexion -->
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>
</body>
</html>
