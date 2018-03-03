<?php

use App\Etat;
use App\Visiteur;
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
                "password" => $id,
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
            "password" => "root",
            "adresse" => "",
            "cp" => "",
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
            "libelle" => "	Saisie clôturée"
        ]);
    }
}
