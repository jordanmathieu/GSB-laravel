<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Etats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: Etats
         * Contains every possible FichesFrais states
         */
        Schema::create("Etats", function (Blueprint $table) {
            $table->string("id", 2);
            $table->string("libelle");

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
        Schema::dropIfExists("Etats");
    }
}
