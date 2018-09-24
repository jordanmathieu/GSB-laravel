<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypesFraisForfait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * TABLE: TypesFraisForfait
         * Contains all types of FraisForfait
         */
        Schema::create("TypesFraisForfait", function (Blueprint $table) {
            $table->increments("id");

            $table->string('libelle');
            $table->decimal('montant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("TypesFraisForfait");
    }
}
