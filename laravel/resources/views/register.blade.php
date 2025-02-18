<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color:red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="name" required>
        <label>Email :</label>
        <input type="email" name="email" required>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <label>Confirmer mot de passe :</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">S'inscrire</button>
    </form>
    <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
</body>
</html>
