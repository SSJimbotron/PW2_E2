<x-layout titre="Enregistrement">

    @dump($errors)
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>


        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifiez l'utilisateur
                </h2>

            </div>

            {{-- FORMULAIRE DE MODIFICATION --}}
            <form action="{{ route('admin.usagers.update') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $usager->id }}">


                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">
                        Nom
                    </label>
                    <div class="">
                        <input id="nom" name="nom" type="text" value="{{ old('nom') ?? $usager->nom }}"
                            autocomplete="family-name" class="">

                        {{-- <x-forms.erreur champ="nom" /> --}}
                    </div>

                </div>

                {{-- PRÉNOM --}}
                <div class="section">
                    <label for="prenom" class="font-technorace">Prénom</label>
                    <div class="">
                        <input id="prenom" name="prenom" type="text" value="{{ old('prenom') ?? $usager->prenom }}">

                        {{-- <x-forms.erreur champ="prenom" /> --}}

                    </div>
                </div>



                {{-- EMAIL --}}
                <div class="section">
                    <label for="email" class="font-technorace">Courriel</label>
                    <div class="">
                        <input id="email" name="email" type="email" value="{{ old('email') ?? $usager->email }}">

                        {{-- <x-forms.erreur champ="email" /> --}}
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
                        Modifiez le compte
                    </button>


                </div>
            </form>
        </div>
    </div>



</x-layout>
