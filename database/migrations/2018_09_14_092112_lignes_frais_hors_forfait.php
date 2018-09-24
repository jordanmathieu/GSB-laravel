<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LignesFraisHorsForfait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: LignesFraisHorsForfait
         * Contains every FraisHorsForfait, per month, per Visiteurs
         */
        Schema::create("LignesFraisHorsForfait", function (Blueprint $table) {
            $table->increments("id");

            $table->integer("refFicheFrais")->unsigned();
            $table->string("libelle");
            $table->decimal("montant");
            $table->timestamp("date");

            $table->foreign("refFicheFrais")->references("id")->on("FichesFrais");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("LignesFraisHorsForfait");
    }
}
