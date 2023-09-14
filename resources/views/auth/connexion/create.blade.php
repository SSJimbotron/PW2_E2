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

            <form class="space-y-6" action="{{ route('connexion.authentifier') }}" method="POST">
                @csrf

                <div>
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Courriel</label>

                  <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('email') }}">
                  </div>
                </div>

                <div>
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                      Mot de passe
                    </label>
                  </div>

                  <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Connectez-vous!
                  </button>
                </div>
              </form>

        </div>

    </div>
</x-layout>
