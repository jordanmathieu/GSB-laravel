<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FichesFrais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: FichesFrais
         * Contains every FichesFrais of the year, per month, per Visiteurs
         */
        Schema::create("FichesFrais", function (Blueprint $table) {
            $table->increments("id");

            $table->string("refVisiteur", 4);
            $table->integer("mois");
            $table->integer("nbJustificatif");
            $table->decimal("montantValide");
            $table->timestamp("dateModif");
            $table->string("refEtat", 2);

            $table->unique(["refVisiteur", "mois"]);
            $table->foreign("refEtat")->references("id")->on("Etats");
            $table->foreign("refVisiteur")->references("id")->on("Visiteurs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("FichesFrais");
    }
}
