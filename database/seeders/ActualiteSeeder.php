<?php

namespace Database\Seeders;

use App\Models\Actualite;
use Illuminate\Database\Seeder;

class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualité spécifiques
        Actualite::factory()
            ->create([
                "titre" => "La scène techno féminine",
                "contenu" => "La scène techno féminine est en plein essor, et les femmes artistes qui la composent continuent de gagner en visibilité, de repousser les limites et d'inspirer de nouvelles générations de productrices et DJ. Au fil des années, elles ont conquis des publics du monde entier grâce à leur talent, leur créativité et leur dévouement à l'art de la musique électronique.

                Ce mouvement de plus en plus influent est le reflet d'une industrie qui évolue. Des artistes techno féminines comme Charlotte de Witte, Amelie Lens, Nina Kraviz et bien d'autres ont non seulement excellé dans leur domaine, mais ont également ouvert la voie à d'autres femmes désireuses de se lancer dans la musique électronique.

                Parallèlement à cette montée en puissance, des collectifs et des initiatives visant à promouvoir la diversité dans la musique électronique voient le jour. Ils s'efforcent de créer des espaces inclusifs où les femmes et les personnes sous-représentées peuvent s'exprimer et prospérer. Des événements exclusivement féminins, des ateliers de production musicale et des mentorats sont organisés pour encourager les talents émergents.

                Ces efforts contribuent non seulement à rendre la scène techno plus diversifiée, mais aussi à briser les stéréotypes de genre qui ont longtemps prévalu dans le monde de la musique électronique. Ils montrent que le talent n'a pas de genre, et que la créativité peut s'épanouir chez tous ceux qui sont passionnés par la musique.

                À mesure que la scène techno féminine continue de prospérer et de s'épanouir, il est évident qu'elle apporte une contribution significative à l'évolution de la musique électronique. Elle incite à repenser les normes et à célébrer la diversité, tout en offrant une nouvelle perspective sur ce que la musique techno peut être. Les artistes féminines repoussent les limites de l'expérimentation sonore et continuent de nous surprendre avec leur créativité. Le futur de la musique électronique s'annonce passionnant et plus inclusif que jamais.",
                "image" => "storage/uploads/feminin.png",
                "created_at" => "2023-09-12 17:50:03"
            ]);
        Actualite::factory()
            ->create([
                "titre" => "Nouvel album de Hugo Lee",
                "contenu" => "Le célèbre producteur et DJ Hugo Lee vient de sortir son dernier album intitulé Dreams. Cet album marque un moment important dans la carrière du musicien et offre une plongée profonde dans l'univers de la musique électronique expérimentale.

                Dreams représente une exploration sonore audacieuse et créative qui transporte les auditeurs vers des horizons musicaux inattendus. Hugo Lee a su fusionner des éléments de techno classique avec des textures sonores innovantes, créant ainsi un paysage sonore unique et captivant.

                Les premières réactions ne se sont pas fait attendre, et l'album a déjà reçu des critiques élogieuses de la part des aficionados de la musique électronique. Les auditeurs saluent la manière dont Hugo Lee parvient à repousser les limites du genre tout en préservant l'essence de la techno. Chaque piste de l'album raconte une histoire sonore différente, devenant ainsi une véritable expérience immersive pour ceux qui l'écoutent.

                Dreams est le fruit de nombreuses heures de travail en studio, de recherches sonores et d'expérimentations artistiques. Il illustre parfaitement l'évolution constante de la musique électronique et la capacité des artistes à innover et à surprendre leur public.

                Cet album promet de rester dans les mémoires en tant qu'œuvre marquante de la musique électronique contemporaine, et il représente un nouvel accomplissement pour Hugo Lee dans sa carrière de producteur et de DJ. Alors que les mélodies de Dreams résonnent dans les clubs et les casques d'écoute du monde entier, il est clair que la musique électronique continue de se réinventer et de nous emmener vers de nouveaux horizons sonores.",
                "image" => "storage/uploads/hugoLee.jpg",
                "created_at" => "2023-09-11 17:50:03"
            ]);
        Actualite::factory()
            ->create([
                "titre" => "Nouveaux talents émergents",
                "contenu" => "La scène techno continue de vibrer au rythme de l'innovation, avec l'émergence constante de nouveaux talents venant des quatre coins du monde. Ces artistes prometteurs apportent des influences uniques à ce genre musical en perpétuelle évolution.

                Les clubs et les festivals sont devenus des terrains d'expression pour cette nouvelle génération d'artistes techno qui ne cessent de repousser les frontières de la créativité. Leurs sets audacieux et leurs productions originales apportent un vent de fraîcheur à la scène électronique, captivant les foules par des sons novateurs et des rythmes hypnotiques.

                Ces talents émergents explorent une multitude de sous-genres techno, allant de la techno minimale et industrielle à la techno mélodique et progressive. Ils intègrent également des éléments de musique du monde, de house, d'ambient et d'autres influences pour créer des expériences sonores uniques.

                L'accessibilité croissante des logiciels de production musicale a permis à de nombreux artistes en herbe de réaliser leurs rêves musicaux depuis leur propre studio. Cette démocratisation de la production a ouvert la porte à une diversité de voix musicales, élargissant ainsi l'horizon de la musique électronique.

                Les plateformes de streaming et les réseaux sociaux ont également joué un rôle majeur en permettant à ces nouveaux talents d'atteindre un public mondial plus rapidement que jamais. Le partage de mixsets, de morceaux originaux et de performances en direct sur Internet a contribué à créer des communautés en ligne de passionnés de techno.

                Alors que ces talents émergents continuent de gravir les échelons de l'industrie, ils offrent une perspective rafraîchissante et novatrice à la musique électronique. Leurs contributions uniques enrichissent la scène techno en l'inscrivant dans une évolution constante, tout en célébrant la créativité et la diversité qui font de ce genre musical l'une des forces motrices de la musique électronique contemporaine. Le futur de la techno s'annonce prometteur grâce à ces artistes passionnés et déterminés.",
                "image" => "storage/uploads/StellarStalkersDelight.jpg",
                "created_at" => "2023-08-29 17:50:03"
            ]);
        Actualite::factory()
            ->create([
                "titre" => "Révolution des logiciels ",
                "contenu" => "L'un des aspects les plus passionnants de la musique électronique, notamment de la techno, est la révolution en cours dans le domaine des logiciels de production musicale. Cette évolution rapide permet aux artistes de créer des sons techno sophistiqués à moindre coût et d'explorer des horizons musicaux sans précédent. De plus en plus d'artistes produisent désormais leur musique depuis le confort de leur domicile.

                Les logiciels de production musicale, souvent appelés DAW (Digital Audio Workstation), ont connu une transformation radicale au cours des dernières années. Ils offrent désormais une gamme impressionnante d'outils et de fonctionnalités, permettant aux producteurs de manipuler des sons, de créer des rythmes complexes et d'expérimenter avec des effets sonores de manière inimaginable il y a quelques années à peine.

                Cette révolution est particulièrement bénéfique pour les artistes de techno, car le genre repose souvent sur des textures sonores uniques, des percussions hypnotiques et des expérimentations sonores avancées. Les DAW modernes, tels que Ableton Live, Logic Pro, FL Studio et d'autres, offrent des bibliothèques de sons étendues, des synthétiseurs virtuels puissants et une automatisation précise, ce qui permet aux producteurs de créer des paysages sonores complexes.

                De plus, les logiciels de production ont rendu la collaboration à distance plus accessible que jamais. Les artistes peuvent travailler ensemble sur des morceaux, échanger des idées et contribuer à des projets, même s'ils sont géographiquement éloignés. Cette connectivité accrue a ouvert de nouvelles opportunités de création pour la communauté de la musique électronique.

                L'un des avantages les plus significatifs de cette révolution est la réduction des coûts associés à la production musicale. Auparavant, la création de musique techno exigeait un investissement considérable dans du matériel coûteux. Aujourd'hui, un ordinateur personnel puissant et un logiciel de production sont tout ce dont un artiste a besoin pour commencer à produire de la musique de haute qualité.

                En fin de compte, la révolution des logiciels de production a rendu la création musicale plus accessible, plus abordable et plus créative que jamais. Cela a permis à de nombreux artistes de se lancer dans la production de musique techno depuis chez eux, contribuant ainsi à une diversité et à une innovation accrues dans le genre. Cette révolution est une source d'inspiration pour la prochaine génération d'artistes qui façonnent l'avenir de la musique électronique.",
                "image" => "storage/uploads/revolution.png",
                "created_at" => "2023-09-01 17:50:03"
            ]);
    }
}
