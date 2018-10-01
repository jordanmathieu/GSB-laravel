<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FicheFrais extends Model
{
	// TABLE NAME: Laravel is expecting visiteur
	protected $table = "FichesFrais";

	// TIMESTAMPS: Laravel is expecting created_at and updated_at
	public $timestamps = false;


	// FILLABLE: We allow theses columns to be modified [added/updated]
	protected $fillable = [
		'refVisiteur',
		'mois',
		'nbJustificatif',
		'montantValide',
		'dateModif',
		'refEtat',
	];


	/**
	 * FicheFrais is linked to Visiteur
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Visiteur()
	{
		// A FicheFrais belongs to 1 Visiteur, not more
		return $this->belongsTo(Visiteur::class, "refVisiteur");
	}

	public function FraisHorsForfait()
	{
		return $this->hasMany(FraisHorsForfait::class, 'refFicheFrais');
	}

	/**
	 * FicheFrais is linked to LigneFraisForfait
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function LignesFraisForfait()
	{
		return $this->hasMany(LigneFraisForfait::class, 'refFicheFrais');
	}
}
