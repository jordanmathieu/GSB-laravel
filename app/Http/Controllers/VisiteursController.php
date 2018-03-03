<?php

namespace App\Http\Controllers;

use App\FicheFrais;
use App\Visiteur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class VisiteursController extends Controller
{
    /**
     * Shows the login view
     * @return object
     */
    public function login(): object  // Eitther View or RedirectResponse...
    {
        if (!Session::has("Visiteur"))
        {
            // Shows them tthe login view
            return view("gsb.login");
        }
        // They're already logged in, redirects them to the main website
        return redirect("/");
    }

    /**
     * Checks if the Visiteur has sent correct data
     * @param Request $request
     * @return RedirectResponse
     */
    public function check(Request $request): RedirectResponse
    {
        // Select the Visiteur with the login an password
        // SECURITY WARNING
        // The password isn't hashed !
        $Visiteur = Visiteur::select(["id", "nom", "prenom", "adresse", "cp", "ville", "dateEmbauche"])
            ->where("login", "=", $request->username)
            ->where("password", "=", $request->password)
            ->first();

        if ($Visiteur)
        {
            // We've found a Visiteur

            // Adds the Visiteur to the Session
            Session::put("Visiteur", $Visiteur);

            // Adds a success  to inform the User
            Session::flash("success", "Bienvenue, $Visiteur->nom $Visiteur->prenom.");

            // Redirects the Visiteur to the main page
            return redirect(route("gsb.frais.index"));
        }
        else
        {
            // Nothing. How sad

            // Adds an error to inform the User
            Session::flash("error", "Visiteur inconnu.");

            // Redirects them back to the login page
            return redirect(route("visiteur.login"));
        }
    }

    /**
     * Logs off the Visiteur and redirect them to the login page
     * @return RedirectResponse
     */
    public function logoff(): RedirectResponse
    {
        // Deletes everything.
        Session::flush();

        // Redirects them to the login page
        return redirect(route("visiteur.login"));
    }
}
