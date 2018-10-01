<?php

use App\Models\Etat;
use App\Models\Visiteur;
use App\Models\TypeFraisForfait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Frais extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // CREATE [10; 30] random Visiteur
        for ($i = 01; $i <= rand(10, 30); $i++) {
            $id = "a0" . sprintf("%02d", $i);
            Visiteur::create([
                "id" => $id,
                "nom" => $faker->lastName(),
                "prenom" => $faker->firstName(),
                "login" => $id,
                "password" => Hash::make($id),
                "adresse" => $faker->streetAddress(),
                "cp" => $faker->numberBetween(1, 99999),
                "ville" => $faker->city(),
                "dateEmbauche" => $faker->dateTime()
            ]);
        }

        // CREATE a "root" Visiteur
        Visiteur::create([
            "id" => "dev",
            "nom" => "developer",
            "prenom" => "",
            "login" => "root",
            "password" => Hash::make("root"),
            "adresse" => "",
            "cp" => 0,
            "ville" => "",
            "dateEmbauche" => $faker->dateTime()
        ]);

        // CREATE 2 Etat
        Etat::create([
            "id" => "CR",
            "libelle" => "Fiche créée, saisie en cours"
        ]);

        Etat::create([
            "id" => "CL",
            "libelle" => "Saisie clôturée"
        ]);

        //CREATE Type of FraisForfait
        TypeFraisForfait::create([
            "libelle" => "Forfait Etape",
            "montant" => 110.0
        ]);

        TypeFraisForfait::create([
            "libelle" => "Frais Kilométrique",
            "montant" => 0.62
        ]);

        TypeFraisForfait::create([
            "libelle" => "Nuitée Hôtel",
            "montant" => 80.0
        ]);

        TypeFraisForfait::create([
            "libelle" => "Repas Restaurant",
            "montant" => 25.0
        ]);
    }
}
