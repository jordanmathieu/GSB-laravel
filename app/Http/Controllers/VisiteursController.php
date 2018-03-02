<?php

namespace App\Http\Controllers;

use App\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class VisiteursController extends Controller
{
    public function login()
    {
        if (!Session::has("Visiteur"))
        {
            return view("gsb.login");
        }
        return redirect("/");
    }

    public function check(Request $request)
    {
        $Visiteur = Visiteur::select(["id", "nom", "prenom", "adresse", "cp", "ville", "dateEmbauche"])
            ->where("login", "=", $request->username)
            ->where("password", "=", $request->password)
            ->first();

        if ($Visiteur)
        {
            Session::flash("success", "Visiteur connecté.");
            Session::push("Visiteur", $Visiteur);
            return redirect(route("visiteur.login"));
        }
        else
        {
            Session::flash("error", "Visiteur inconnu.");
            return redirect(route("visiteur.login"));
        }
    }

    public function logoff()
    {
        Session::flush();
        return redirect(route("visiteur.login"));
    }
}
