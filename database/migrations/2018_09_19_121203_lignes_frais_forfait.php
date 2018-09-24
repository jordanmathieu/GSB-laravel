<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LignesFraisForfait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: LignesFraisForfait
         * Contains every TypesFraisForfait quantity
         */
        Schema::create("LignesFraisForfait", function (Blueprint $table) {
            $table->primary(['refFicheFrais', 'refTypeFraisForfait']);

            $table->integer("refFicheFrais")->unsigned();
            $table->integer("refTypeFraisForfait")->unsigned();
            $table->integer("quantite");

            $table->unique(['refFicheFrais', 'refTypeFraisForfait']);
            $table->foreign("refFicheFrais")->references("id")->on("FichesFrais");
            $table->foreign("refTypeFraisForfait")->references("id")->on("TypesFraisForfait");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("LignesFraisForfait");
    }
}
