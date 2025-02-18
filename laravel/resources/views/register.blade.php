<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Inscription</h2>

        @if ($errors->any())
            <div class="mb-4">
                @foreach ($errors->all() as $error)
                    <p class="text-red-500 text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-600 text-sm font-medium">Nom :</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-600 text-sm font-medium">Email :</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-600 text-sm font-medium">Mot de passe :</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-600 text-sm font-medium">Confirmer mot de passe :</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                S'inscrire
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-4">
            Déjà inscrit ? 
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Se connecter</a>
        </p>
    </div>
</body>
</html>
