<x-layout titre="Connexion">
    <div class="formulaire-connexion">
        <h1 class="font-lovelo">COMPTE UTILISATEUR</h1>
        <form action="{{ route('connexion.authentifier') }}" method="POST">
            @csrf

            <h2 class="font-lovelo">Connexion</h2>

            <div class="section">
                <label for="email" class="font-technorace">Courriel</label>

                {{-- <x-forms.erreur champ="email" /> --}}
                <div>
                    <input id="email" name="email" type="email" autocomplete="email" placeholder="Courriel"
                        value="{{ old('email') }}">
                </div>
            </div>

            <div class="section">
                <label for="password" class="font-technorace">
                    Mot de passe
                </label>
            </div>

            {{-- <x-forms.erreur champ="password" /> --}}

            <input id="password" name="password" type="password" autocomplete="current-password"
                placeholder="Mot de passe">

            <div class="section">
                <button type="submit" >
                    Connexion
                </button>
            </div>
            <p class= "font-technorace">
                <a href="{{ route('enregistrement.create') }}">
                    S'inscrire
                </a>
            </p>
        </form>

    </div>

</x-layout>
