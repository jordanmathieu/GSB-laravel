<?php

namespace App\Http\Controllers;

use App\FicheFrais;
use App\FraisHorsForfait;
use App\Visiteur;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class FraisController extends Controller
{
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

    /**
     * Show the form to add a new Frais
     * @return View
     */
    public function newHorsForfait(): View
    {
        return view("gsb.frais.hors-forfait.new");
    }

    public function checkHorsForfait(Request $request): RedirectResponse
    {
        $Visiteur = Session::get("Visiteur");

        $this->validate(request(), [
            "libelle" => "required|max:255",
            "montant" => "required|numeric",
            "date" => "required"
        ]);

        FraisHorsForfait::create([
            "idVisiteur" => $Visiteur->id,
            "mois" => Carbon::now()->month,
            "libelle" => $request->input("libelle"),
            "montant" => $request->input("montant"),
            "date" => $request->input("date")
        ]);

        return redirect(route("gsb.frais.horsforfait.index"));
    }
}
