<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    // TABLE NAME: Laravel is expecting visiteur
    protected $table = "Visiteurs";

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
        return $this->hasMany(FicheFrais::class, "refVisiteur");
    }

    public function FraisHorsForfait()
    {
        return $this->hasMany(FraisHorsForfait::class, "refVisiteur");
    }

    public function FraisMonth(int $month)
    {
        return $this->FicheFrais()->where('mois', '=', $month)->first();
    }

}
