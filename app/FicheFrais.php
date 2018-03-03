<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheFrais extends Model
{
    // TABLE NAME: Laravel is expecting visiteur
    protected $table = "FicheFrais";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;


    // FILLABLE: We allow theses columns to be modified [added/updated]
    protected $fillable = ['idVisiteur', 'mois', 'nbJustificatif', 'montantValide', 'dateModif', 'idEtat'];


    /**
     * FicheFrais is linked to Visiteur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Visiteur()
    {
        // A FicheFrais belongs to 1 Visiteur, not more
        return $this->belongsTo(Visiteur::class, "idVisiteur");
    }


    public function FraisHorsForfait()
    {
        return $this->hasMany(FraisHorsForfait::class, "id");
    }
}
