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
                @foreach($TypeFrais as $type)
                    {{$type->libelle}} : <input value=0 id="{{$type->id}}"> <br>
                @endforeach
            </div>
            <div class="card-footer">
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>
@endsection