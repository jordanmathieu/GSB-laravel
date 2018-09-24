@extends("gsb.includes.template")
@section("content")
    <form method="POST" action="{{ route("gsb.frais.horsforfait.check") }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="libelle">Libelle</label>
            <input required type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle">
        </div>

        <div class="form-group">
            <label for="montant">Montant (€)</label>
            <input required type="number" step=".01" class="form-control" id="montant" name="montant" placeholder="Montant (€)">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input required type="date" class="form-control" id="date" name="date" placeholder="Date">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection