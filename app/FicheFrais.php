<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheFrais extends Model
{
    // TABLE NAME: Laravel is expecting visiteur
    protected $table = "FicheFrais";

    //  PRIMARY_KEY COUPLE: Laravel is expecting 1 primary key, 1 column named "id"
    protected $primaryKey = ["idVisiteur", "mois"];

    // PRIMARY_KEY TYPE: Laravel is expecting an int, autoincrement
    public $incrementing = false;
    protected $keyType = "string";

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


}
