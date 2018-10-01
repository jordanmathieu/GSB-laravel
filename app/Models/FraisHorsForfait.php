<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraisHorsForfait extends Model
{
    // TABLE NAME: Laravel is expecting lignes_frais_hors_forfait
    protected $table = "LignesFraisHorsForfait";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;

    // FILLABLE: We allow theses columns to be modified [added/updated]
    protected $fillable = ['refFicheFrais', 'libelle', 'montant', 'date'];


    public function Visiteur()
    {
        return $this->belongsTo(Visiteur::class,"refVisiteur");
    }

    public function FicheFrais()
    {
        return $this->belongsTo(FicheFrais::class, "refVisiteur", "refVisiteur");
    }
    
}
