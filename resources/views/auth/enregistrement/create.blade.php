<x-layout titre="Enregistrement">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">COMPTE UTILISATEUR</h1>


        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    S'inscrire
                </h2>

            </div>

            {{-- FORMULAIRE D'ENREGISTREMENT --}}
            <form action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">
                        Nom
                    </label>
                    <div class="">
                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}"
                            autocomplete="family-name" class="">

                        {{-- <x-forms.erreur champ="nom" /> --}}
                    </div>

                </div>

                {{-- PRÉNOM --}}
                <div class="section">
                    <label for="prenom" class="font-technorace">Prénom</label>
                    <div class="">
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus
                            value="{{ old('prenom') }}" class="">

                        {{-- <x-forms.erreur champ="prenom" /> --}}

                    </div>
                </div>



                {{-- EMAIL --}}
                <div class="section">
                    <label for="email" class="font-technorace">Courriel</label>
                    <div class="">
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            autocomplete="email" class="">

                        {{-- <x-forms.erreur champ="email" /> --}}
                    </div>

                </div>

                {{-- PASSWORD --}}
                <div class="section">
                    <div class="flex items-center justify-between">
                        <label for="password" class="font-technorace">
                            Mot de passe
                        </label>
                    </div>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password">

                        {{-- <x-forms.erreur champ="password" /> --}}
                    </div>

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="section">
                    <div class="">
                        <label for="confirm-password" class="font-technorace">
                            Confirmation du mot de passe
                        </label>
                    </div>
                    <div>
                        <input id="confirm-password" name="confirmation_password" type="password" class="">

                        {{-- <x-forms.erreur champ="confirmation_password" /> --}}
                    </div>

                </div>

                <div class="submit">

                    <p class="">
                        <a href="{{ route('connexion.create') }}" class="font-quicksand">
                            Se connecter
                        </a>
                    </p>
                    <button type="submit" class="font-quicksand">
                        Créez votre compte!
                    </button>


                </div>
            </form>
        </div>
    </div>



</x-layout>
