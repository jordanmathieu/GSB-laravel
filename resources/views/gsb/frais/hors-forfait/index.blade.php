@extends("gsb.includes.template")
@section("content")
    <h4>
        Mes Frais Hors Forfait
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
            <th>Actions</th>
        </tr>
        @foreach($FraisHorsForfait as $frais)
            <tr>
                <td>{{ $frais->libelle }}</td>
                <td>{{ $frais->montant . "€" }}</td>
                <td>{{ \Carbon\Carbon::parse($frais->date)->diffForHumans() }}</td>
                <form action="{{ route("gsb.frais.horsforfait.delete", $frais->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("delete") }}
                    <td><button class="btn btn-danger btn-sm" type="submit">Supprimer</button></td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection