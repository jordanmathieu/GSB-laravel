<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneFraisForfait extends Model
{
	// TABLE NAME: Laravel is expecting ligne_frais_forfait
	protected $table = "LignesFraisForfait";

	// TIMESTAMPS: Laravel is expecting created_at and updated_at
	public $timestamps = false;


	// FILLABLE: We allow theses columns to be modified [added/updated]
	protected $fillable = [
		'refFicheFrais',
		'refTypeFraisForfait',
		'quantite',
	];

	/**
	 * LigneFraisForfait is linked to FicheFrais
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function FicheFrais()
	{
		//A LigneFraisForfait belong to 1 FicheFrais
		return $this->belongsTo(FicheFrais::class, "refFicheFrais");
	}

	/**
	 * LigneFraisForfait is linked to TypeFraisForfait
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function TypeFraisForfait()
	{
		//A LigneFraisForfait belong to 1 TypeFraisForfait
		return $this->belongsTo(TypeFraisForfait::class, "refTypeFraisForfait");
	}
}
