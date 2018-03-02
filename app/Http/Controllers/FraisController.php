<?php

namespace App\Http\Controllers;

use App\FicheFrais;
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

        // No query is made here, as $Visiteur is requested from the Session
        $Visiteur = Session::get("Visiteur");

        // Forces a query to FicheFrais table to sync the data
        $Visiteur->load('FicheFrais');

        // No query is made here, as FicheFrais is requested from the Visiteur, which is saved in the Session
        $FicheFrais = $Visiteur->FicheFrais;

        // Check if an entry has the month equals to the current one
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
            return redirect(route("gsb.frais.list"));
        }

        // Shows them the FicheFrais
        return view("gsb.frais.list", compact("Visiteur", "FicheFrais"));
    }
}
