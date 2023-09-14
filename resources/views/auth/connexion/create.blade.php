<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="formulaire-connexion">
        <h1>COMPTE UTILISATEUR</h1>
        <form action="{{ route('connexion.authentifier') }}" method="POST">
          @csrf

          <div>
            <label for="email">Courriel</label>

             {{-- <x-forms.erreur champ="email" /> --}}
            <div>
              <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}">
            </div>
          </div>

          <div>
              <label for="password" class="">
                Mot de passe
              </label>
            </div>

            {{-- <x-forms.erreur champ="password" /> --}}
            <div>
              <input id="password" name="password" type="password" autocomplete="current-password">
            </div>
          </div>

          <div>
            <button type="submit">
              Connectez-vous!
            </button>
          </div>
        </form>

        <p>
          <a href="{{ route('enregistrement.create') }}">
            S'inscrire
          </a>
        </p>
      </div>
</body>
</html>
