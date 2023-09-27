<x-layout titre="Modification de l'activité">

    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier Activité
                </h2>

            </div>



            <form action="{{ route('admin.activites.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $activite->id }}">

                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">Nom</label>
                    <div>

                        <input id="nom" name="nom" type="text" autofocus
                            value="{{ old('nom') ?? $activite->nom }}">

                        <x-forms.erreur champ="nom" />
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="section">

                    <label for="description" class="font-technorace">Description de l'activité</label>

                    <div>
                        <textarea name="description" id="description" cols="38" rows="10"
                            placeholder="{{ old('description') ?? $activite->description }}"></textarea>
                        <x-forms.erreur champ="description" />
                    </div>

                </div>

                {{-- SUBMIT --}}
                <div class="submit">
                    <button type="submit" class="font-quicksand">
                        Modifiez l'activité
                    </button>
                </div>
            </form>


            {{-- FORMULAIRE POUR LA MODIFICATION DE L'IMAGE --}}
            <form class="space-y-6" action="{{ route('admin.activites.updateimg') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $activite->id }}">


                {{-- IMAGE --}}
                <div class="section">

                    <label for="image" class="font-technorace">Image de
                        l'activité</label>
                    <div>
                        <input type="file" name="image" id="image">
                        <x-forms.erreur champ="image" />
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="submit">
                    <button type="submit" class="font-quicksand">
                        Modifiez l'image
                    </button>
                </div>

            </form>
            {{-- SUPPRESSION --}}
            <form class="space-y-6" action="{{ route('admin.activites.destroy') }}" method="POST"
                enctype="multipart/form-data">
                @csrf



                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $activite->id }}">

                <div class="submit">
                    <button type="submit" class="font-quicksand supprime">
                        Supprimer l'activité
                    </button>
                </div>
            </form>

            {{-- RETOUR A L'INDEX --}}
            <div class="retour">
                <p>
                    <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                </p>
            </div>



        </div>
</x-layout>
