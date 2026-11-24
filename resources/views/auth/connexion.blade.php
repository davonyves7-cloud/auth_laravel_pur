<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <title>Connexion</title>
</head>

<body>

    <h1>Connexion</h1>


    @if ($errors->any())
        <div>
            <strong>Erreur :</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('connexion.login') }}">

        @csrf

        <div>
            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>


        <div>
            <label for="password">
                Mot de passe
            </label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>


        <button type="submit">
            Se connecter
        </button>

    </form>


    <p>
        Vous n'avez pas encore de compte ?

        <a href="{{ route('inscription') }}">
            Créer un compte
        </a>
    </p>

</body>

</html>