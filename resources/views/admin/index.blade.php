<x-layout titre="Administration">


    <div class="admin_index">
        <h1 class="font-lovelo">Administration</h1>
        <div class="admin_index_contenu">

            <div class="admin_index_reservations">
                <h2 class="font-lovelo">Réservation</h2>
                <div><img src="{{ asset('image/Admin/barre_blanc.png') }}" class="barre_neon" alt="barre_neon"></div>
                <table>
                    <tr>
                        <th class="font-technorace">Client</th>
                        <th class="font-technorace">Forfait</th>
                        <th class="font-technorace">Arrivée</th>
                        <th class="font-technorace">Départ</th>
                    </tr>
                    {{-- @foreach ($reservations as $reservation)
                        <tr>
                            <p>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $reservation->id]) }}">{{ $reservation->client }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $reservation->id]) }}">{{ $reservation->forfait_id }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_arrivee }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_depart }}</a>
                                </td>
                            </p>
                        </tr>
                    @endforeach --}}
                </table>
            </div>

            <div class="admin_index_usagers">

                <table>
                    <h2 class="text-bleu font-lovelo">Usagers</h2>
                    <div><img src="{{ asset('image/Admin/barre_bleu.png') }}" class="barre_neon" alt="barre_neon"></div>
                    <tr>
                        <th class="font-technorace">Nom</th>
                        <th class="font-technorace">Prénom</th>
                        <th class="font-technorace">Courriel</th>
                        <th class="font-technorace">Rôle</th>
                    </tr>
                    @foreach ($usagers as $usager)
                        <tr>
                            @if ($usager->role == 1 || $usager->role == 2)
                                <p>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->nom }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->prenom }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->email }}</a>
                                    </td>
                                    <td><a href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">
                                            @if ($usager->role == 1)
                                                Client
                                            @endif
                                            @if ($usager->role == 2)
                                                Employé
                                            @endif
                                            @if ($usager->role == 3)
                                                Administrateur
                                            @endif
                                        </a>
                                    </td>
                                </p>
                            @endif
                        </tr>


                        @if (Auth::check() && (Auth::user()->role == 2 || Auth::user()->role == 3) && $usager->role == 3)
                            <tr>
                                <p>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->nom }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->prenom }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">{{ $usager->email }}</a>
                                    </td>
                                    <td><a href="{{ route('admin.usagers.edit', ['id' => $usager->id]) }}">
                                            @if ($usager->role == 1)
                                                Client
                                            @endif
                                            @if ($usager->role == 2)
                                                Employé
                                            @endif
                                            @if ($usager->role == 3)
                                                Administrateur
                                            @endif
                                        </a>
                                    </td>
                                </p>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <a href="{{ route('admin.usagers.create') }}" class="bouton_create">Créer un usager</a>
            </div>

            <div class="admin_index_activites">

                <h2 class="text-rose-400 font-lovelo">Activites</h2>
                <div><img src="{{ asset('image/Admin/barre_rose.png') }}" class="barre_neon" alt="barre_neon"></div>
                <table>
                    <tr>
                        <th class="font-technorace">nom</th>
                        <th class="font-technorace">Image</th>
                        <th class="font-technorace">Description</th>
                    </tr>
                    @foreach ($activites as $activite)
                        <tr>
                            <p>
                                <td><a
                                        href="{{ route('admin.activites.edit', ['id' => $activite->id]) }}">{{ $activite->nom }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.activites.edit', ['id' => $activite->id]) }}">{{ $activite->image }}</a>
                                </td>
                                <td class="description_courte"><a
                                        href="{{ route('admin.activites.edit', ['id' => $activite->id]) }}">{{ $activite->description }}</a>
                                </td>
                            </p>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('admin.activites.create') }}" class="bouton_create">Créer une activité</a>    </div>

            <div class="admin_index_actualites">

                <h2 class="font-lovelo text-jaune">Actualité</h2>
                <div><img src="{{ asset('image/Admin/barre_jaune.png') }}" class="barre_neon" alt="barre_neon"></div>
                <table>
                    <tr>
                        <th class="font-technorace">Titre</th>
                        <th class="font-technorace">Date</th>
                        <th class="font-technorace">Contenus</th>
                    </tr>
                    @foreach ($actualites as $actualite)
                        <tr>
                            <p>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $actualite->id]) }}">{{ $actualite->titre }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.actualites.edit', ['id' => $actualite->id]) }}">{{ $actualite->created_at }}</a>
                                </td>
                                <td class="description_courte"><a
                                        href="{{ route('admin.actualites.edit', ['id' => $actualite->id]) }}">{{ $actualite->contenu }}</a>
                                </td>
                            </p>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('admin.actualites.create') }}" class="bouton_create">Créer une actualité</a></div>
        </div>
    </div>


</x-layout>
