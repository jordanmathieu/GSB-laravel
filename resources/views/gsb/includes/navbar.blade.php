<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            VISITEUR
        </h6>
        <ul class="nav flex-column mb-2">
            @if (Session::has("Visiteur"))
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ Session::get("Visiteur")[0]->nom }}
                        {{ Session::get("Visiteur")[0]->prenom }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("visiteur.logoff") }}">
                        Se déconnecter
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route("visiteur.login") }}" class="nav-link">
                        Se connecter
                    </a>
                </li>
            @endif
        </ul>

        @if (Session::has("Visiteur"))
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                GESTION DES FRAIS
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Frais Hors Forfait
                    </a>
                </li>
            </ul>
        @endif
    </div>
</nav>