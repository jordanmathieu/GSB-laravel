<?php

namespace App\Http\Controllers;

use App\FicheFrais;
use App\FraisHorsForfait;
use App\Visiteur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class FraisController extends Controller
{
    /**
     * Shows the list of FicheFrais created for the Visiteur
     * @return object
     */
    public function index(): object // Eitther View or RedirectResponse...
    {
        // We need Today's date
        $currentDate = Carbon::now();

        // Fetch the Visiteur from the Session
        $Visiteur = Session::get("Visiteur");

        // Refresh FicheFrais data in the Session, from the DB
        $Visiteur->load('FicheFrais');

        // Fetch the FicheFrais from the Session
        $FicheFrais = $Visiteur->FicheFrais;

        // Check if a FicheFrais has been created for the current month
        if (!($FicheFrais->contains("mois", $currentDate->month)))
        {
            // Create a new FicheFrais
            $FicheFrais = new FicheFrais();

            // Sets the default values
            $FicheFrais->idVisiteur = $Visiteur->id;
            $FicheFrais->mois = $currentDate->month;
            $FicheFrais->nbJustificatif = 0;
            $FicheFrais->montantValide = 0;
            $FicheFrais->dateModif = $currentDate;
            $FicheFrais->idEtat = "CR";

            // Send the new FicheFrais to DB
            $FicheFrais->save();

            // Inform the Visiteur
            Session::flash("information", "Une Fiche Frais à été créée.");

            // Refreshes the Page
            return redirect(route("gsb.frais.index"));
        }

        // Returns the View, with the FicheFrais
        return view("gsb.frais.fiches", compact("FicheFrais"));
    }

    /**
     * Show the list of LignesFraisHorsForfait
     * @return View
     */
    public function indexHorsForfait(): View
    {
        // Fetch the Visiteur from the Session
        $Visiteur = Session::get("Visiteur");

        // Refresh the FraisHorsForfait data in the Session, from the DB, only for the current month
        $Visiteur->load("FraisHorsForfaitMonth");

        // Fetch the FraisHorsForfait from the Session, only for the current month
        $FraisHorsForfait = $Visiteur->FraisHorsForfaitMonth;

        // Returns the View, with the FraisHorsForfait
        return view("gsb.frais.hors-forfait.index", compact("FraisHorsForfait"));
    }
}
