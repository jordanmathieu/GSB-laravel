<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisHorsForfait extends Model
{
    // TABLE NAME: Laravel is expecting visiteur
    protected $table = "LigneFraisHorsForfait";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;

    public function Visiteur()
    {
        return $this->belongsTo(Visiteur::class,"idVisiteur");
    }

    public function FicheFrais()
    {
        return $this->belongsTo(FicheFrais::class, "idVisiteur", "idVisiteur");
    }
    
}
