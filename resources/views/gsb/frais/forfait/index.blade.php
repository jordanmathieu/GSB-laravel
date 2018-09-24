@extends("gsb.includes.template")
@section("content")
    <h4>
        Mes Frais Forfait
    </h4>
    <hr>

    <div class="card">
        <label class="card-header">Types de Frais Forfait</label>
        <form action="{{ redirect(route("gsb.frais.forfait.new")) }}">
            <div class="card-body  align-self-center">

                @foreach ($FicheFrais->LignesFraisForfait as $Frais)
                    <div class="form-group">
                        <label for="{{ $Frais->TypeFraisForfait->id }}">{{ $Frais->TypeFraisForfait->libelle }}</label>
                        <input id="{{ $Frais->TypeFraisForfait->id }}" class="form-control"}} type="text" value="{{ $Frais->quantite }}">
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary" type="submit">Valider</button>
            </div>
    </form>
    </div>
@endsection