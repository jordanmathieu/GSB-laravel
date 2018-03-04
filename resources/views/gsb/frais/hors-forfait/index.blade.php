@extends("gsb.includes.template")
@section("content")
    <h4>
        Mes frais Hors Forfait
        <a href="{{ route("gsb.frais.horsforfait.new") }}">
            <button type="button" class="btn btn-outline-primary float-right">+ Ajouter</button>
        </a>
    </h4>
    <hr>

    <table class="table table-dark">
        <tr>
            <th>Libelle</th>
            <th>Montant</th>
            <th>Date</th>
        </tr>
        @foreach($FraisHorsForfait as $frais)
            <tr>
                <td>{{ $frais->libelle }}</td>
                <td>{{ $frais->montant . "€" }}</td>
                <td>{{ \Carbon\Carbon::parse($frais->date)->diffForHumans() }}</td>
            </tr>
        @endforeach
    </table>
@endsection