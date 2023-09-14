<x-layout titre="Connexion">
    <div class="conteneur-enregistrement">

        <h1>COMPTE UTILISATEUR</h1>

        <div>



            <h2 class="inscrire">

                S'inscrire

            </h2>



        </div>



        <div class="formulaire-enregistrement">

            {{-- FORMULAIRE D'ENREGISTREMENT --}}

            <form action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">

                @csrf





                {{-- NOM --}}

                <div>

                    <label for="nom" class="">

                        Nom

                    </label>

                    <div class="">

                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}"
                            autocomplete="family-name" class="">



                        {{-- <x-forms.erreur champ="nom" /> --}}

                    </div>



                </div>



                {{-- PRÉNOM --}}

                <div>

                    <label for="prenom" class="">Prénom</label>

                    <div class="">

                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus
                            value="{{ old('prenom') }}" class="">



                        {{-- <x-forms.erreur champ="prenom" /> --}}



                    </div>

                </div>







                {{-- EMAIL --}}

                <div>

                    <label for="email" class="">Courriel</label>

                    <div class="">

                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            autocomplete="email" class="">



                        {{-- <x-forms.erreur champ="email" /> --}}

                    </div>



                </div>



                {{-- PASSWORD --}}

                <div>

                    <div class="flex items-center justify-between">

                        <label for="password" class="">

                            Mot de passe

                        </label>

                    </div>

                    <div class="mt-2">

                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">



                        {{-- <x-forms.erreur champ="password" /> --}}

                    </div>



                </div>



                {{-- CONFIRM PASSWORD --}}

                <div>

                    <div class="">

                        <label for="confirm-password" class="">

                            Confirmation du mot de passe

                        </label>

                    </div>

                    <div class="mt-2">

                        <input id="confirm-password" name="confirmation_password" type="password" class="">



                        {{-- <x-forms.erreur champ="confirmation_password" /> --}}

                    </div>



                </div>



                <div>



                    <button type="submit" class="">

                        Créez votre compte!

                    </button>

                </div>



                <p class="">

                    <a href="{{ route('connexion.create') }}" class="">

                        Se connecter

                    </a>

                </p>

            </form>

        </div>

    </div>
</x-layout>
