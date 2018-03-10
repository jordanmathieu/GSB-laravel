<?php

namespace App\Http\Controllers;

use App\FraisHorsForfait;
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
     * Shows the form to add a new Frais
     * @return View
     */
    public function newHorsForfait(): View
    {
        return view("gsb.frais.hors-forfait.new");
    }

    /**
     * Adds a new FraisHorsForfait in the DB
     * @param Request $request
     * @return RedirectResponse
     */
    public function addHorsForfait(Request $request): RedirectResponse
    {
        // Fetch the Visiteur from the Session
        $Visiteur = Session::get("Visiteur");

        // Validate the data that has been sent
        $this->validate(request(), [
            "libelle" => "required|max:255",
            "montant" => "required|numeric",
            "date" => "required"
        ]);

        // Add the FraisHorsForfait to the DB
        FraisHorsForfait::create([
            "idVisiteur" => $Visiteur->id,
            "mois" => Carbon::now()->month,
            "libelle" => $request->input("libelle"),
            "montant" => $request->input("montant"),
            "date" => $request->input("date")
        ]);

        // Informs the Visiteur
        Session::flash("success", "Nouveau frais créé !");

        // Redirect the Visiteur
        return redirect(route("gsb.frais.horsforfait.index"));
    }

    /**
     * Deletes a FraisHorsForfait from the DB
     * @param int $idFrais
     * @return RedirectResponse
     */
    public function deleteHorsForfait(int $idFrais): RedirectResponse
    {
        // Fetch the Visiteur from the Session
        $Visiteur = Session::get("Visiteur");

        // Fetch the FraisHorsForfait associated with that ID
        $frais = FraisHorsForfait::find($idFrais);

        // Check if the Frais exists and the author is the Visiteur
        if (!empty($frais) && $frais->idVisiteur == $Visiteur->id) {
            // All good, delete from DB
            $frais->delete();

            // Inform the Visiteur that everything is good.
            Session::flash("success", "Le frais a été supprimé !");
        } else {
            // Something went wrong
            // Inform the Visiteur that he can't delete the Frais
            Session::flash("error", "Un problème est survenu lors de la suppression du frais.");
        }

        // Redirect the Visiteur
        return redirect(route("gsb.frais.horsforfait.index"));
    }
}
