<?php

namespace App\Http\Controllers;

use App\Models\FicheFrais;
use App\Models\Visiteur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VisiteursController extends Controller
{
    /**
     * Shows the login view
     * @return object
     */
    public function login(): object  // Either View or RedirectResponse...
    {
        if (!Session::has("Visiteur"))
        {
            // Shows them the login view
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
        // Get the hashed password of the user to verify
        $hashedPassword = Visiteur::select("password")
            ->where("login", "=", $request->username)
            ->first();

        // Select the Visiteur with the login and hashed password
        $Visiteur = Visiteur::select(["id", "nom", "prenom", "adresse", "cp", "ville", "dateEmbauche"])
            ->where("login", "=", $request->username)
            ->where("password", "=",  Hash::check($request->password, $hashedPassword))
            ->first();

        if ($Visiteur)
        {
            // We've found a Visiteur

            // Adds the Visiteur to the Session
            Session::put("Visiteur", $Visiteur);

            // Adds a success  to inform the User
            Session::flash("success", "Bienvenue, $Visiteur->nom $Visiteur->prenom.");

            // Redirects the Visiteur to the main page
            return redirect(route("gsb.fiches.index"));
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
    public function logout(): RedirectResponse
    {
        // Deletes everything.
        Session::flush();

        // Redirects them to the login page
        return redirect(route("visiteur.login"));
    }
}
