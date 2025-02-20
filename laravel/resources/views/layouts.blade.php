<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bibliothèque')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Barre de navigation -->
    <nav class="bg-blue-600 p-4 shadow-md">
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

    <!-- Contenu principal -->
    <main class="container mx-auto p-6 flex-grow">
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer class="bg-blue-600 text-white text-center p-4 mt-6">
        &copy; {{ date('Y') }} Bibliothèque - Tous droits réservés.
    </footer>
</body>
</html>
