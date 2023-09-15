<x-layout titre="Enregistrement">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>


        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Créez un compte utilisateur
                </h2>

            </div>

            {{-- FORMULAIRE D'ENREGISTREMENT --}}
            <form action="{{ route('admin.usagers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">
                        Nom
                    </label>
                    <div class="">
                        <input id="nom" name="nom" type="text"
                            autocomplete="family-name" class="">

                        {{-- <x-forms.erreur champ="nom" /> --}}
                    </div>

                </div>

                {{-- PRÉNOM --}}
                <div class="section">
                    <label for="prenom" class="font-technorace">Prénom</label>
                    <div class="">
                        <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus>

                        {{-- <x-forms.erreur champ="prenom" /> --}}

                    </div>
                </div>



                {{-- EMAIL --}}
                <div class="section">
                    <label for="email" class="font-technorace">Courriel</label>
                    <div class="">
                        <input id="email" name="email" type="email" autocomplete="email">

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

                {{-- ROLE --}}

                <div class="section">
                    <div>
                        <label for="role" class="font-technorace">
                            Role de l'utilisateur
                        </label>
                    </div>
                    <div>
                        <select id="role" name="role" class="text-noir">
                           <option value="1">Clients</option>
                           <option value="2">Employé</option>
                           <option value="3">Administrateur</option>
                        </select>
                    </div>
                </div>

                <div class="submit">

                    <button type="submit" class="font-quicksand">
                        Créez le compte
                    </button>


                </div>
            </form>
        </div>
    </div>



</x-layout>
