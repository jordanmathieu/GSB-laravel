@extends("gsb.includes.template")

@section("content")
    {{ dd($horsForfaitMois) }}
    <h4>Mois Frais Hors</h4>
    <hr>

    <table class="table table-dark">
        <tr>
            <th>Mois</th>
            <th>NbFraisHorsForfait</th>
        </tr>
        @foreach($horsForfaitMois as $forfaitMois)
        <tr>
            <td>{{ $forfaitMois->mois }}</td>
            <td>{{ $forfaitMois->nbHorsForfait }}</td>
        </tr>
        @endforeach
    </table>

@endsection
