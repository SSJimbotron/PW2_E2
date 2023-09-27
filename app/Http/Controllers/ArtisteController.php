<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    /**
     * Affiche les artistes
     *
     * @return View
     */
    public function index() {
       // Récupérer toutes les artistes de la base de données
       $artistes = Artiste::get();

       // Passer les actualites à la vue
       return view('artistes.index',  [
           'artistes' => $artistes
       ]);
   }

    /**
     * Affiche un artiste
     *
     * @param int $id Id de l'actualité à modifier
     * @return View
     */

     public function show($id)
     {
         // Récupérez l'artiste en fonction de l'identifiant
         $artiste = Artiste::find($id);

         // Vérifiez si l'artiste existe
         if (!$artiste) {

             // Ceci renverra une page d'erreur 404
             abort(404);
         }

         // Affichez la vue des détails de l'aartiste en passant l'objet $artiste
         return view('artistes.show', [
             'artiste' => $artiste
         ]);
     }
}
