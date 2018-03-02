<?php

namespace App\Http\Controllers;

use App\FicheFrais;
use App\Visiteur;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class FraisController extends Controller
{
    public function index(): View
    {

        // NOTE: No query is made here, as $Visiteur is requested from the Session
        $Visiteur = Session::get("Visiteur");

        // NOTE: Forces a query to FicheFrais table to sync the data
        $Visiteur->load('FicheFrais');

        // NOTE: No query is made here, as FicheFrais is requested from the Visiteur, which is saved in the Session
        $FicheFrais = $Visiteur->FicheFrais;

        return view("gsb.frais.list", compact("Visiteur", "FicheFrais"));
    }
}
