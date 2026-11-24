<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
</head>

<body>

    <h1>Bienvenue sur votre Dashboard</h1>


    @auth

        <p>
            Bonjour {{ auth()->user()->name }} !
        </p>

        <p>
            Votre email :
            {{ auth()->user()->email }}
        </p>


        <form method="POST" action="{{ route('deconnexion') }}">

            @csrf

            <button type="submit">
                Se déconnecter
            </button>

        </form>

    @endauth

</body>

</html>