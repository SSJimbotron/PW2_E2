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
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "TechnoKnight white night",
            "journee" => "vendredi",
            "heure" => "22h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "DJ RythmRAider",
            "journee" => "samedi",
            "heure" => "18h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "Hugo lee",
            "journee" => "samedi",
            "heure" => "19h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "TechnoKnight rebooted",
            "journee" => "samedi",
            "heure" => "20h30",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "DEE JAY",
            "journee" => "samedi",
            "heure" => "21h30",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "Mister technofantome",
            "journee" => "samedi",
            "heure" => "22h30",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "Echo Enchantress",
            "journee" => "samedi",
            "heure" => "23h30",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "StellarStalker's Delight",
            "journee" => "dimanche",
            "heure" => "20h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "La scène techno féminine",
            "journee" => "dimanche",
            "heure" => "21h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
        Artiste::factory()
        ->create([
            "nom" => "TechnoKnight",
            "journee" => "dimanche",
            "heure" => "22h00",
            "description" => "",
            "image" => "storage/uploads/feminin.png",
        ]);
    }
}
