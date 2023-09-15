<?php

namespace Database\Seeders;

use App\Models\Forfait;
use Illuminate\Database\Seeder;

class ForfaitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Forfaits spécifiques
        Forfait::factory()->create([
            "nom" => "Platine",
            "description" => "Accès exclusif aux zones VIP du festival.
            Billets pour tous les jours du festival, y compris les pré-événements.
            Rencontrez des artistes en backstage en scéance personnelle
            Repas gratuits et boissons illimitées dans les espaces VIP.
            Accès à des toilettes propres et confortables.",
            "jour" => "3",
        ]);
        Forfait::factory()->create([
            "nom" => "Or",
            "description" => "Billets pour le festival et emplacement de camping inclus.
            Expérience immersive en plein air avec des activités telles le yoga.
            Accès à des douches et des toilettes de camping.
            Feux de camp communautaires et soirées sous les étoiles.
            Possibilité de rencontrer d'autres festivaliers avides d'aventure.",
            "jour" => "2",
        ]);
        Forfait::factory()->create([
            "nom" => "Argent",
            "description" => "Billets pour le festival à un prix abordable.
            Accès à toutes les scènes et zones d'animation.
            Possibilité d'apporter votre propre nourriture et boissons
            Expérience authentique de festival avec une ambiance animée.
            Idéal pour les étudiants et les amateurs de musique soucieux de leur budget.",
            "jour" => "1",
        ]);
    }
}
