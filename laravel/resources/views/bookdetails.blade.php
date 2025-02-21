<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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
<body class="bg-gray-100 min-h-screen p-8">

    <h1 class="text-3xl font-bold text-center mb-8">Liste des Livres</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($books as $book)
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-bold text-primary mb-2">{{ $book->title }}</h2>
                <div class="space-y-3">
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600">{{ $book->description }}</p>
                    <div class="flex items-center text-tertiary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>

                <form method="POST" action="{{ route('borrow') }}" class="mt-4">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                        Emprunter
                    </button>
                </form>

            </div>
        </div>
        @endforeach
    </div>

</body>
</html>
