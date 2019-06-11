@extends("gsb.includes.template")
@section("content")
    <h4>
        Lignes de frais hors-forfait non validées
    </h4>
    <hr>

    <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Ref Fiche Frais</th>
            <th>Libelle</th>
            <th>Montant</th>
            <th>Visiteur</th>
            <th>Date</th>
        </tr>
        @foreach($FraisHorsForfaitNonValides as $fraishorsforfaitnonvalides)
            <tr>
              <td>{{ $fraishorsforfaitnonvalides->id }}</td>
              <td>{{ $fraishorsforfaitnonvalides->refFicheFrais }}</td>
              <td>{{ $fraishorsforfaitnonvalides->libelle }}</td>
              <td>{{ $fraishorsforfaitnonvalides->montant . "€" }}</td>
              <td>{{ $fraishorsforfaitnonvalides->nom }} {{ $fraishorsforfaitnonvalides->prenom }}</td>
              <td>{{ date('d-m-Y', strtotime($fraishorsforfaitnonvalides->date)) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
