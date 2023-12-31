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
    public function index()
    {
        // Récupérer toutes les activités de la base de données
        $activites = Activite::get(); // Utilisez la méthode get() pour obtenir toutes les activités

        // Passer les activités à la vue
        return view('activites.index', [
            'activites' => $activites
        ]);
    }



    /**
     * Affiche une activité
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */

    public function show($id)
    {
        // Récupérez l'activité en fonction de l'identifiant
        $activite = Activite::find($id);

        // Vérifiez si l'activité existe
        if (!$activite) {

            // Ceci renverra une page d'erreur 404
            abort(404);
        }

        // Affichez la vue des détails de l'activité en passant l'objet $activite
        return view('activites.show', [
            'activite' => $activite
        ]);
    }


    // ======================= AJOUT =======================

    /**
     * Affiche le formulaire d'ajout
     *
     * @return View
     */
    public function create()
    {
        return view('admin.activites.create');
    }

    /**
     * Traite l'ajout
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
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
        $activite->nom = $valides["nom"];
        $activite->description = $valides["description"];

        // Traiter le téléversement
        if ($request->hasFile('image')) {
            // Déplacer
            Storage::putFile("public/uploads", $request->image);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $activite->image = "/storage/uploads/" . $request->image->hashName();
        }

        $activite->save();


        // Rediriger avec message de succès
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
    public function edit($id)
    {
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
    public function update(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "nom" => "required|min:4|max:150",
            "description" => "required|min:10"
        ], [
            "id.required" => "L'id de l'activité est obligatoire",
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",
            "nom.required" => "Le nom est obligatoire",
            "description.required" => "La description est obligatoire",
            "description.min" => "La description doit avoir un minimum de :min caractères",
        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $activite = Activite::findOrFail($valides["id"]);
        $activite->nom = $valides["nom"];
        $activite->description = $valides["description"];


        $activite->save();

        // Rediriger avec message de succès
        return redirect()
            ->route('admin.index')
            ->with('succes', "L'activité a été modifiée avec succès!");
    }


    /**
     * Traite la modification de l'image
     *
     * @param Request $request Objet qui contient tous les champs reçus dans la requête
     * @return RedirectResponse
     */
    public function updateimg(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "image" => "required|mimes:png,jpg,jpeg",
        ], [
            "id.required" => "L'id de l'activité est obligatoire",
            "image.required" => "L'image est obligatoire'",
            "image.mimes" => "L'image doit avoir une des extensions suivantes: PNG, JPG, JPEG",
        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $activite = Activite::findOrFail($valides["id"]);

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
            ->with('succes', "L'activité a été modifiée avec succès!");
    }

    // ======================= SUPPRESSION =======================

    /**
     * Traite la suppression
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Activite::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', "L'activite a été supprimée!");
    }
}
