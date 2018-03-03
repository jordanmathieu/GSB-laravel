<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GsbFrais extends Migration
{



    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: Visiteur
         * Contains every Visiteur of GSB-Frais
         */
        Schema::create("Visiteur", function(Blueprint $table) {
           $table->string("id", 4);
           $table->string("nom");
           $table->string("prenom");
           $table->string("login");
           $table->string("password");
           $table->string("adresse");
           $table->integer("cp");
           $table->string("ville");
           $table->timestamp("dateEmbauche");

           $table->primary("id");
        });

        /**
         * TABLE: Etat
         * Contains every possible FicheFrais states
         */
        Schema::create("Etat", function(Blueprint $table) {
           $table->string("id", 2);
           $table->string("libelle");

           $table->primary("id");
        });

        /**
         * TABLE: FicheFrais
         * Contains every FicheFrais of the year, per month, per Visiteur
         */
        Schema::create("FicheFrais", function(Blueprint $table) {
           $table->string("idVisiteur", 4);
           $table->integer("mois");
           $table->integer("nbJustificatif");
           $table->decimal("montantValide");
           $table->timestamp("dateModif");
           $table->string("idEtat", 2);

           $table->primary(["idVisiteur", "mois"]);
           $table->foreign("idEtat")->references("id")->on("Etat");
           $table->foreign("idVisiteur")->references("id")->on("Visiteur");
        });

        /**
         * TABLE: LigneFraisHorsForfait
         * Contains every FraisHorsForfait, per month, per Visiteur
         */
        Schema::create("LigneFraisHorsForfait", function(Blueprint $table) {
           $table->increments("id");
           $table->string("idVisiteur", 4);
           $table->integer("mois");
           $table->string("libelle");
           $table->decimal("montant");
           $table->timestamp("date");

           $table->foreign(["idVisiteur", "mois"])->references(["idVisiteur", "mois"])->on("FicheFrais");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("LigneFraisHorsForfait");
        Schema::dropIfExists("FicheFrais");
        Schema::dropIfExists("Etat");
        Schema::dropIfExists("Visiteur");
    }
}
