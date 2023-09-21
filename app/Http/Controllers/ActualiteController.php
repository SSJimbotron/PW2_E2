<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    /**
     * Affiche la liste des actualités
     *
     * @return View
     */
    public function index() {
        // Récupérer toutes les actualites de la base de données
        $actualites = Actualite::get();

        // Passer les actualites à la vue
        return view('actualites.index',  [
            'actualites' => $actualites
        ]);

    }

    // ======================= AJOUT =======================

    public function create()
    {
        return view('admin.actualites.create');
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
            "titre" => "required|min:4|max:150",
            "image" => "required|mimes:png,jpg,jpeg",
            "contenu" => "required|min:10"
        ], [
            "titre.max" => "Le titre doit avoir un maximum de :max caractères",
            "titre.min" => "Le titre doit avoir un minimum de :min caractères",
            "titre.required" => "Le titre est obligatoire",
            "image.required" => "L'image est obligatoire'",
            "image.mimes" => "L'image doit avoir une des extensions suivantes: PNG, JPG, JPEG",
            "contenu.required" => "Le contenu est obligatoire",
            "contenu.min" => "Le contenu doit avoir un minimum de :min caractères",
        ]);

        // Ajouter à la BDD
        $actualite = new Actualite(); // $actualite contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $actualite->titre = $valides["titre"];
        $actualite->contenu = $valides["contenu"];

        // Traiter le téléversement
        if ($request->hasFile('image')) {
            // Déplacer
            Storage::putFile("public/uploads", $request->image);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $actualite->image = "/storage/uploads/" . $request->image->hashName();
        }

        $actualite->save();


        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "L'actualité a été ajoutée avec succès!");
    }

    // ======================= MODIFICATION =======================

    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */
    public function edit($id)
    {
        return view('admin.actualites.edit', [
            "actualite" => actualite::findOrFail($id),
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
            "titre" => "required|min:4|max:150",
            "contenu" => "required|min:10"
        ], [
            "id.required" => "L'id de l'activité est obligatoire",
            "titre.max" => "Le titre doit avoir un maximum de :max caractères",
            "titre.min" => "Le titre doit avoir un minimum de :min caractères",
            "titre.required" => "Le titre est obligatoire",
            "contenu.required" => "Le contenu est obligatoire",
            "contenu.min" => "Le contenu doit avoir un minimum de :min caractères",
        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $actualite = actualite::findOrFail($valides["id"]);
        $actualite->titre = $valides["titre"];
        $actualite->contenu = $valides["contenu"];

        $actualite->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "L'actualité a été modifiée avec succès!");
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
        $actualite = actualite::findOrFail($valides["id"]);

        // Traiter le téléversement
        if ($request->hasFile('image')) {
            // Déplacer
            Storage::putFile("public/uploads", $request->image);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $actualite->image = "/storage/uploads/" . $request->image->hashName();
        }

        $actualite->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "L'image de l'actualité a été modifiée avec succès!");
    }
    /**
     * Traite la suppression
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Actualite::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', "L'actualité a été supprimée!");
    }
}
