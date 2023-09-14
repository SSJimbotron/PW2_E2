<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActiviteController extends Controller
{
    /**
     * Affiche la liste des activités
     *
     * @return View
     */
    public function index() {
        return view('activites.index');
    }

    // ======================= AJOUT =======================

    public function create(){
        return view('admin.activites.create');
    }

    /**
     * Traite l'ajout
     *
     * @param Request $request
     * @return RedirectResponse
    */
    public function store(Request $request) {
        // Valider
        $valides = $request->validate([
            "nom" => "required|min:4|max:150",
            "image" => "required|mimes:png,jpg,jpeg",
            "description" => "required|min:10"
        ], [
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",
            "nom.required" => "Le nom est obligatoire",
            "image.required" => "L'image est obligatoire'",
            "image.mimes" => "L'image doit avoir une des extensions suivantes: PNG, JPG, JPEG",
            "description.required" => "La description est obligatoire",
            "description.min" => "La description doit avoir un minimum de :min caractères",
        ]);

        // Ajouter à la BDD
        $activite = new Activite(); // $activite contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $activite->nom= $valides["nom"];
        $activite->description = $valides["description"];

        // Traiter le téléversement
        if ($request->hasFile('image')) {
            // Déplacer
            Storage::putFile("public/uploads", $request->image);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $activite->image = "/storage/uploads/" . $request->image->hashName();
        }

        $activite->save();


        // Rediriger
        return redirect()
                ->route('admin.index')
                ->with('succes', "L'activité a été ajoutée avec succès!");
    }

    // ======================= MODIFICATION =======================

    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de l'activité à modifier
     * @return View
     */
    public function edit($id) {
        return view('admin.activites.edit', [
            "activite" => Activite::findOrFail($id),
        ]);
    }

            /**
     * Traite la modification
     *
     * @param Request $request Objet qui contient tous les champs reçus dans la requête
     * @return RedirectResponse
     */
    public function update(Request $request) {
        // Valider
        $valides = $request->validate([
            "nom" => "required|min:4|max:150",
            "image" => "required|mimes:png,jpg,jpeg",
            "description" => "required|min:10"
        ], [
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",
            "nom.required" => "Le nom est obligatoire",
            "image.required" => "L'image est obligatoire'",
            "image.mimes" => "L'image doit avoir une des extensions suivantes: PNG, JPG, JPEG",
            "description.required" => "La description est obligatoire",
            "description.min" => "La description doit avoir un minimum de :min caractères",
        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $activite = Activite::findOrFail($valides["id"]);
        $activite->nom= $valides["nom"];
        $activite->description = $valides["description"];
        $activite->save();

        // Rediriger
        return redirect()
                ->route('admin.index')
                ->with('succes', "L'activité a été modifiée avec succès!");
    }
}
