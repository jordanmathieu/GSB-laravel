<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    // TABLE NAME: Laravel is expecting visiteur
    protected $table = "Visiteur";

    // PRIMARY_KEY TYPE: Laravel is expecting an int, autoincrement
    public $incrementing = false;
    protected $keyType = "string";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;


    /**
     * Visiteur is linked to FicheFrais
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function FicheFrais()
    {
        // One Visiteur has Many FicheFrais (1 per month, in theory)
        return $this->hasMany(FicheFrais::class, "idVisiteur");
    }

}
