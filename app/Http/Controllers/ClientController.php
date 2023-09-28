<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Actualite;
use App\Models\Forfait;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    // ======================= COMPTE CLIENT =======================

    /**
     * Affiche le formulaire de modification pour le compte de l'utilisateur connecter
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */
    public function edit($id)
    {
        // Récupération de tous les usagers et ses réservations, ainsi que tous les forfaits
        $usagers = User::Find($id);
        $reservations = DB::table('reservations')->where('user_id','=', $id)->get();
        $forfaits = Forfait::all();

        // Passer les données à la vue
        return view('clients.edit', [
            "usager" => User::findOrFail($id), "usagers" => $usagers,
            "reservations" => $reservations,
            "forfaits" => $forfaits,
        ]);
    }


    /**
     * Traite la modification du compte client
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email",
        ], [
            "id.required" => "L'id de l'usager est obligatoire",
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
        ]);

        // Sauvegarder
        $user = User::findOrFail($valides["id"]);
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];

        $user->save();

        // Rediriger
        return redirect()
            ->route('accueil')
            ->with('succes', "La modification de l'usager à été effectuée");
    }

    /**
     * Traite la modification du mot de passe d'un client
     *
     * @param Request $request
     * @return View
     */
    public function updatemdp(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password",
        ], [
            "id.required" => "L'id de l'usager est obligatoire",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
            "confirmation_password.required" => "La confirmation du mot de passe est requise",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé",

        ]);

        // Sauvegarder
        $user = User::findOrFail($valides["id"]);
        $user->password = Hash::make($valides["password"]);

        $user->save();

        // Rediriger
        return redirect()
            ->route('accueil')
            ->with('succes', "La modification du mot de passe à été effectuer");
    }


    // ======================= RÉSERVATION =======================

    // **** AJOUT ****

    /**
     * Affiche la page pour effectuer une nouvelle réservation
     *
     * @param int $id Id de la reservation à modifier
     * @return View
     *
     */
    public function index($id)
    {
        // Récupérer tous les forfaits et utilisateurs
        $forfaits = Forfait::all();
        $usagers = User::all();
        $reservations = Reservation::all();

        // Passer les données à la vue
        return view('reservations.index', ["usagers" => $usagers, "forfaits" => $forfaits, "id" => $id]);
    }

    /**
     * Traite l'ajout d'une nouvelle réservation de la part du client
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        // Valider
        $valides = $request->validate([
            "forfait" => "required",
            "date_arrivee" => "required|date|after:17/08/2024|before:2024-08-22",
            "date_depart" => "required|date|after_or_equal:date_arrivee|before:2024-08-22",
            "client" => "required",
        ], [

            "forfait.required" => "Le forfait est obligatoire",
            "date_arrivee.required" => "La date d'arrivée est obligatoire'",
            "date_arrivee.date" => "La date d'arrivée doit être une date",
            "date_arrivee.after" => "La date d'arrivée est minimalement le 2024-08-19",
            "date_arrivee.after" => "La date d'arrivée est maximalement le 2024-08-22",
            "date_depart.required" => "La description est obligatoire",
            "date_depart.date" => "La date de départ doit être une date",
            "date_depart.after_or_equal" => "La date de départ doit être égale ou supérieur à la date d'arrivée",
            "date_depart.after" => "La date de depart est maximalement le 2024-08-22",
            "client.required" => "Un client est obligatoire",
        ]);

        $forfait = Forfait::find($valides["forfait"]);

        $jours_forfait = $forfait->jour;


        $date_limite = Carbon::parse($valides["date_arrivee"])->addDays($jours_forfait);
        $date_depart = Carbon::parse($valides["date_depart"]);

        if ($date_limite->gt($date_depart)) {
            // Ajouter à la BDD
            $reservation = new Reservation(); // $reservation contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
            $reservation->user_id = $valides["client"];
            $reservation->forfait_id = $valides["forfait"];
            $reservation->date_arrivee = $valides["date_arrivee"];
            $reservation->date_depart = $valides["date_depart"];

            $reservation->save();

            // Rediriger
            return redirect()
                ->route('moncompte.edit', ['id' => Auth::user()->id])
                ->with('succes', "La réservation a été ajoutée avec succès!");
        } else {
            // Rediriger
            return redirect()
                ->route('reservations.index')
                ->with('erreur', "Les dates doivent respecter votre forfait");
        }
    }

    // **** MODIFICATION ****

    /**
     * Affiche le formulaire de modification pour une réservation
     *
     * @param int $id Id de la reservation à modifier
     * @return View
     */
    public function editreservation($id)
    {
        // Récupération de tous les usagers et les forfaits
        $usagers = User::all();
        $forfaits = Forfait::all();

        return view('reservations.edit', [
            "usagers" => $usagers, "forfaits" => $forfaits,  "reservation" => Reservation::findOrFail($id),
        ]);
    }

    /**
     * Traite la modification d'une réservation
     *
     * @param Request $request Objet qui contient tous les champs reçus dans la requête
     * @return RedirectResponse
     */
    public function updatereservation(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "forfait" => "required",
            "date_arrivee" => "required|date|after:17/08/2024",
            "date_depart" => "required|date|after_or_equal:date_arrivee",
            "client" => "required",
        ], [
            "id.required" => "L'id' est obligatoire",
            "forfait.required" => "Le forfait est obligatoire",
            "date_arrivee.required" => "La date d'arrivée est obligatoire'",
            "date_arrivee.date" => "La date d'arrivée doit être une date",
            "date_arrivee.after" => "La date d'arrivée est minimalement le 2024-08-19",
            "date_depart.required" => "La description est obligatoire",
            "date_depart.date" => "La date de départ doit être une date",
            "date_depart.after_or_equal" => "La date de départ doit être égale ou supérieur à la date d'arrivée",
            "client.required" => "Un client est obligatoire",
        ]);
        $forfait = Forfait::find($valides["forfait"]);
        $jours_forfait = $forfait->jour;



        $date_limite = Carbon::parse($valides["date_arrivee"])->addDays($jours_forfait);
        $date_depart = Carbon::parse($valides["date_depart"]);


        if ($date_limite->gt($date_depart)) {
            // Ajouter à la BDD
            $reservation = Reservation::findOrFail($valides["id"]);
            $reservation->user_id = $valides["client"];
            $reservation->forfait_id = $valides["forfait"];
            $reservation->date_arrivee = $valides["date_arrivee"];
            $reservation->date_depart = $valides["date_depart"];


            $reservation->save();

            // Rediriger
            return redirect()
                ->route('moncompte.edit', ['id' => Auth::user()->id])
                ->with('succes', "La réservation a été ajoutée avec succès!");
        } else {
            // Rediriger
            return redirect()
                ->route('reservations.edit,["id"]')
                ->with('error', "Les dates doivent respecter votre forfait");
        }
    }

    // **** SUPRESSION ****

    /**
     * Traite la suppression d'une réservation
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {

        $date_festival = Carbon::createFromFormat('Y-m-d',  '2024-08-19');

        $maintenant = Carbon::createFromFormat('Y-m-d',  Carbon::now());





        if($maintenant->gte($date_festival)){
            return redirect()->route('reservations.edit', ['id' => $request->id])
            ->with('erreur', "La réservation ne peux être annulée après le début du festival");
        }else{

        Reservation::destroy($request->id);

        return redirect()->route('moncompte.edit', ['id' => Auth::user()->id])
            ->with('succes', "La réservation a été supprimée!");}
    }
}
