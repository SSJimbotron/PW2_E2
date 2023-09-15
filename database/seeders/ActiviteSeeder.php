<?php

namespace Database\Seeders;

use App\Models\Activite;
use Illuminate\Database\Seeder;

class ActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Activite spécifiques
        Activite::factory()
            ->create([
                "nom" => "Genglerie Lumineuse",
                "description" => "Max Lumino Spark est le cerveau derrière chaque création, un génie de l'éclairage qui travaille avec des dispositifs électroniques sophistiqués, des lasers, des LED et d'autres technologies pour donner vie à des spectacles époustouflants. Que ce soit lors de festivals, de concerts, d'événements spéciaux ou de productions artistiques uniques, les Light Innovators sont toujours à la pointe de l'innovation lumineuse.

                Assister à une performance des Light Innovators signifie plonger dans un univers visuel en constante évolution, où la lumière devient une forme d'expression artistique. Leur mission est de créer des expériences mémorables et de laisser le public ébloui par leur talent et leur créativité. Les Light Innovators sont véritablement les maîtres de l'illumination aux États-Unis, apportant une touche de magie lumineuse à chaque événement où ils se produisent.",
                "image" => "public\image\ActiviteShow\genglerie.png",
            ]);
        Activite::factory()
            ->create([
                "nom" => "Magasinage",
                "description" => "Situé à proximité du festival de techno à Alicante, en Espagne, le Rave Retail Plaza est un paradis pour les amateurs de musique électronique et de culture rave. Les festivaliers peuvent y trouver une variété de boutiques proposant des articles allant des vêtements aux accessoires festifs, ainsi que des stands de personnalisation et d'art en direct pour créer des souvenirs uniques. De plus, des stands de nourriture et d'espace de détente sont disponibles pour recharger vos batteries entre deux achats, offrant une expérience shopping unique qui complète parfaitement le festival de techno.

                Le Rave Retail Plaza ajoute une touche de plaisir et d'originalité à votre expérience du festival de techno à Alicante, vous permettant d'explorer la culture rave tout en découvrant des produits branchés et mémorables.",
                "image" => "public\image\ActiviteShow\magasinage.png",
            ]);
        Activite::factory()
            ->create([
                "nom" => "Arcade",
                "description" => "Situé à proximité du festival de techno à Alicante, l'Arcade Emporium est un oasis de divertissement pour les festivaliers. Offrant une sélection variée de jeux d'arcade, cet espace vous permet de vous évader de l'effervescence de la musique électronique et de plonger dans le monde rétro du divertissement. Que vous soyez passionné de flippers, de jeux de tir ou de simulateurs de course, l'Arcade Emporium a de quoi satisfaire tous les goûts.C'est l'endroit parfait pour une pause ludique entre deux sets musicaux.

                L'Arcade Emporium offre une atmosphère unique où les festivaliers peuvent se divertir et créer des souvenirs inoubliables. Que vous soyez en quête d'un moment de détente en solo ou que vous souhaitiez partager des rires et des défis avec des amis, cet espace ludique ajoute une touche spéciale à votre expérience au festival de techno à Alicante.",
                "image" => "public\image\ActiviteShow\arcade.png",
            ]);
        Activite::factory()
            ->create([
                "nom" => "Feux D'artifice",
                "description" => "Le spectacle de feux d'artifice Ciel en Fête à Alicante, en Espagne, est une expérience visuelle époustouflante qui illumine le ciel nocturne pendant le festival de techno. Ce spectacle pyrotechnique captivant est conçu pour émerveiller et éblouir les festivaliers, offrant une pause bienvenue au milieu des pulsations musicales.

                Ciel en Fête transporte les spectateurs dans un univers de couleurs éclatantes, de motifs complexes et de détonations spectaculaires. Le ciel s'embrase alors que des feux d'artifice synchronisés s'élèvent au rythme de la musique, créant ainsi une fusion magique de l'art pyrotechnique et de la musique électronique. C'est un moment de célébration visuelle qui ajoute une dimension supplémentaire à l'expérience du festival, rappelant aux festivaliers que la magie se trouve aussi bien sur la piste de danse que dans le ciel étoilé d'Alicante.",
                "image" => "public\image\ActiviteShow\feux.png",
            ]);
    }
}
