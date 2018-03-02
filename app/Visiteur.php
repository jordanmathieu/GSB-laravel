<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    // PREVENTS PRIMARY_KEY from being treated as int
    public $incrementing = false;

    // Forces the Table name to be Visiteur and not visiteur
    protected $table = 'Visiteur';

    public function FicheFrais()
    {
        return $this->hasMany(FicheFrais::class, "idVisiteur");
    }

}
