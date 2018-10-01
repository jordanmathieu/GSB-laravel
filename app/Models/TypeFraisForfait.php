<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFraisForfait extends Model
{
    // TABLE NAME: Laravel is expecting types_frais_forfait
    protected $table = "TypesFraisForfait";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;

    // FILLABLE: We allow theses columns to be modified [added/updated]
    protected $fillable = ['libelle', 'montant'];

    /**
     * TypeFraisForfait is linked to LigneFraisForfait
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function LigneFraisForfait()
    {
        return $this->hasMany(LigneFraisForfait::class, 'refTypeFraisForfait');
    }
}
