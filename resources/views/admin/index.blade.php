<x-layout titre="Administration">
    <h1>Administration</h1>

    <div class="admin_index">
        <div class="admin_index_usagers">
            <h2>Usagers</h2>
            @foreach ($usagers as $usager)
                @if ($usager->role == 1 || $usager->role == 2)
                    <p>{{ $usager->nom }} {{ $usager->prenom }} {{ $usager->email }}

                        @if ($usager->role == 1)
                            Client
                        @endif
                        @if ($usager->role == 2)
                            Employé
                        @endif
                        @if ($usager->role == 3)
                            Administrateur
                        @endif
                    </p>
                @endif
                @if (Auth::check() && (Auth::user()->role == 2 || Auth::user()->role == 3) && $usager->role == 3)
                    <p>{{ $usager->nom }} {{ $usager->prenom }} {{ $usager->email }}

                        @if ($usager->role == 1)
                            Client
                        @endif
                        @if ($usager->role == 2)
                            Employé
                        @endif
                        @if ($usager->role == 3)
                            Administrateur
                        @endif
                    </p>
                @endif
            @endforeach
        </div>

        <div class="admin_index_activites">
            <h2>Activites</h2>
            @foreach ($activites as $activite)
                <p>{{ $activite->nom }} {{ $activite->image }} {{ $activite->description }}</p>
            @endforeach
        </div>

        <div class="admin_index_actualites">
            <h2>Actualité</h2>
            @foreach ($actualites as $actualite)
                <p>{{ $actualite->titre }} {{ $actualite->created_at }} {{ $actualite->contenu }}</p>
            @endforeach
        </div>
    </div>


</x-layout>
