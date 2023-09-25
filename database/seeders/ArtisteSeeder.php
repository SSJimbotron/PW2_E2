<?php

namespace Database\Seeders;

use App\Models\Artiste;
use Illuminate\Database\Seeder;

class ArtisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artiste::factory()
            ->create([
                "nom" => "EchoPulse cindy",
                "journee" => "vendredi",
                "heure" => "21h00",
                "description" => "
            EchoPulse Cindy est une icône de la musique techno, fusionnant habilement des rythmes hypnotiques avec des sons électroniques expérimentaux. Ses performances sont une expérience sensorielle immersive, transportant son public dans un voyage sonore captivant. Avec sa créativité sans bornes et sa capacité à repousser les limites du genre, EchoPulse Cindy reste une force majeure de la scène techno contemporaine.",
                "image" => "storage/uploads/EchoPulseCindy.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "TechnoKnight white night",
                "journee" => "vendredi",
                "heure" => "22h00",
                "description" => "
                TechnoKnight White Night est un maestro de la musique techno, un virtuose des platines qui façonne l'atmosphère de ses performances avec une maestria inégalée. Ses sets sont un voyage hypnotique à travers des paysages sonores sombres et envoûtants, emportant son public dans une nuit sans fin de beats irrésistibles. TechnoKnight White Night incarne l'énergie pure de la techno, captivant les foules avec sa présence magnétique derrière les platines et sa capacité à créer une communion unique sur la piste de danse.",
                "image" => "storage/uploads/TechnoKnightWhite.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "DJ RythmRAider",
                "journee" => "samedi",
                "heure" => "18h00",
                "description" => "
                DJ RythmRAider est un maître de l'électro-techno, apportant une intensité inégalée à chaque performance. Sa musique est une fusion électrifiante de rythmes effrénés et de mélodies hypnotiques qui transcendent les frontières du genre. Sur scène, DJ RythmRAider est une force de la nature, enflammant la piste de danse avec une énergie contagieuse et une présence magnétique. Son nom résonne dans le monde de la musique électronique, et il est acclamé pour sa capacité à faire vibrer les foules avec des beats inoubliables. DJ RythmRAider est le gardien du rythme, le capitaine de l'aventure techno, et une véritable légende de la scène électronique.",
                "image" => "storage/uploads/DJRythmRaider.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "Hugo lee",
                "journee" => "samedi",
                "heure" => "19h00",
                "description" => "
                Hugo Lee est un DJ et producteur de musique techno qui se démarque par sa créativité sonore exceptionnelle. Sa musique est un voyage sensoriel à travers des paysages électroniques profonds et émotionnels. Avec des sets captivants et une approche artistique unique, Hugo Lee sait comment hypnotiser son public et le transporter dans un état de transe musicale. Son talent pour mélanger des rythmes entraînants avec des mélodies envoûtantes en fait une figure montante de la scène techno, prêt à conquérir les dancefloors du monde entier. Hugo Lee incarne la fusion parfaite entre l'innovation électronique et la passion musicale, créant une expérience sonore inoubliable pour tous ceux qui ont la chance de le voir jouer.",
                "image" => "storage/uploads/HugoLee.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "TechnoKnight rebooted",
                "journee" => "samedi",
                "heure" => "20h30",
                "description" => "TechnoKnight Rebooted est une incarnation renouvelée de la musique techno, apportant une dose d'innovation et de puissance à chaque performance. Sa musique est une fusion électrisante de rythmes puissants et de textures sonores futuristes qui repoussent les limites du genre. Sur scène, TechnoKnight Rebooted est un maestro de l'électronique, captivant les foules avec une énergie brute et une présence magnétique. Son nom est synonyme de réinvention constante et d'une approche novatrice de la musique électronique. TechnoKnight Rebooted est le gardien de la techno du futur, prêt à défier les conventions et à entraîner son public dans une aventure sonore captivante.",
                "image" => "storage/uploads/TechnoKnightRebooted.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "DEE JAY",
                "journee" => "samedi",
                "heure" => "21h30",
                "description" => "
                DEE JAY est un artiste techno qui incarne l'essence même de ce genre musical. Avec une expertise inégalée derrière les platines, DEE JAY livre des sets puissants qui font vibrer les dancefloors. Sa musique est une fusion envoûtante de rythmes percutants et de mélodies hypnotiques, créant une atmosphère immersive qui transporte son public dans un état de transe musicale. DEE JAY est un nom bien établi dans la scène techno, acclamé pour sa capacité à créer une expérience sonore inoubliable à chaque performance. Il est le maestro des beats, le commandant de la piste de danse et un pilier de la culture techno.",
                "image" => "storage/uploads/DEEJAY.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "Mister technofantome",
                "journee" => "samedi",
                "heure" => "22h30",
                "description" => "
                Mister Technofantôme est une figure énigmatique de la scène techno, célèbre pour son approche artistique unique et son mystère entourant son identité. Ses performances sont une expérience sonore immersive, mêlant des sonorités électroniques profondes à une ambiance mystique. Derrière les platines, Mister Technofantôme crée une atmosphère captivante qui laisse le public hypnotisé. Son nom résonne comme une légende dans le monde de la musique électronique, en tant qu'artiste qui sait comment créer une aura de mystère et de fascination. Mister Technofantôme est le maître de l'obscurité et du groove, une énigme musicale qui continue de charmer et d'intriguer les amateurs de techno du monde entier.",
                "image" => "storage/uploads/MisterTechnofantome.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "Echo Enchantress",
                "journee" => "samedi",
                "heure" => "23h30",
                "description" => "
                Echo Enchantress est une artiste de la musique techno qui transporte son public dans un monde de magie sonore. Sa musique est une fusion envoûtante de rythmes hypnotiques et de mélodies ensorcelantes qui captivent instantanément l'auditeur. Sur scène, Echo Enchantress crée une atmosphère enchanteresse, où les beats électroniques se mêlent à des sonorités mystiques pour créer une expérience sonore unique. Elle est connue pour sa capacité à créer une connexion profonde avec son public, les emmenant dans un voyage musical envoûtant. Echo Enchantress est la magicienne des platines, capable de charmer et de transporter son auditoire dans un univers de sonorités envoûtantes et de rythmes ensorcelants.",
                "image" => "storage/uploads/EchoEnchantress.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "StellarStalker's Delight",
                "journee" => "dimanche",
                "heure" => "20h00",
                "description" => "
                StellarStalker's Delight est un artiste de la musique techno qui explore les confins de l'univers sonore. Sa musique est une fusion captivante de rythmes cosmiques et de mélodies interstellaires, créant une expérience sonore qui vous emmène dans un voyage à travers les étoiles. Sur scène, StellarStalker's Delight transporte son public dans un voyage musical intergalactique, où les beats électroniques se mêlent à des sonorités spatiales pour créer une expérience immersive unique. Il est connu pour sa capacité à créer une atmosphère magique et futuriste, captivant les amateurs de techno avec ses performances cosmiques. StellarStalker's Delight est le guide musical de l'univers, vous emmenant dans un monde de sonorités stellaires et de rythmes célestes.",
                "image" => "storage/uploads/StellarStalkersDelight.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "La scène techno féminine",
                "journee" => "dimanche",
                "heure" => "21h00",
                "description" => "La scène techno féminine est une force incontournable de l'industrie de la musique électronique, où des artistes talentueuses repoussent les limites et brisent les stéréotypes. Ces femmes techno-pionnières apportent une créativité et une passion sans faille à leurs performances, contribuant ainsi de manière significative à l'évolution du genre.

                Leurs sets captivants sont une célébration de la diversité, alliant des rythmes puissants à des expérimentations sonores audacieuses. Chacune de ces artistes apporte sa propre perspective unique à la musique techno, créant ainsi une richesse artistique inégalée sur la scène.

                Elles sont les déesses du beat, les architectes du groove, et leur influence continue d'inspirer de nouvelles générations d'artistes. La scène techno féminine est un exemple éloquent de l'émancipation à travers la musique, prouvant que le talent transcende le genre.",
                "image" => "storage/uploads/scenefeminine.png",
            ]);
        Artiste::factory()
            ->create([
                "nom" => "TechnoKnight",
                "journee" => "dimanche",
                "heure" => "22h00",
                "description" => "
                TechnoKnight est une icône de la musique techno, reconnu pour son style distinctif et sa maîtrise des platines. Avec une carrière impressionnante dans le monde de la musique électronique, TechnoKnight a su créer un univers sonore qui mêle habilement des rythmes hypnotiques à des sonorités futuristes. Ses performances enflamment les dancefloors du monde entier, transportant le public dans un voyage musical captivant. TechnoKnight est bien plus qu'un DJ, c'est un véritable maître de cérémonie techno, un gardien des beats qui continue d'inspirer et de faire vibrer les amateurs de musique électronique à travers le globe.",
                "image" => "storage/uploads/TechnoKnight.png",
            ]);
    }
}
