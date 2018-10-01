<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visiteurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: Visiteurs
         * Contains every Visiteurs of GSB-Frais
         */
        Schema::create("Visiteurs", function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("Visiteurs");
    }
}
