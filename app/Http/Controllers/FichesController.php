<?php

namespace App\Http\Controllers;

use App\Models\FicheFrais;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class FichesController extends Controller
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
            $FicheFrais->refVisiteur = $Visiteur->id;
            $FicheFrais->mois = $currentDate->month;
            $FicheFrais->nbJustificatif = 0;
            $FicheFrais->montantValide = 0;
            $FicheFrais->dateModif = $currentDate;
            $FicheFrais->refEtat = "CR";

            // Send the new FicheFrais to DB
            $FicheFrais->save();

            // Inform the Visiteur
            Session::flash("information", "Une Fiche Frais a été créée.");

            // Refreshes the Page
            return redirect(route("gsb.fiches.index"));
        }

        // Returns the View, with the FicheFrais
        return view("gsb.fiches.index", compact("FicheFrais"));
    }

}
