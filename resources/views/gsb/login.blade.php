@extends("gsb.includes.template")
@section("content")
    @if (Session::has("success"))
        <div class="alert alert-primary" role="alert">
            <li>{{ Session::get("success") }}</li>
        </div>
    @endif
    @if (Session::has("error"))
        <div class="alert alert-danger" role="alert">
            <li>{{ Session::get("error") }}</li>
        </div>
    @endif

    <form method="POST" action="{{ route("visiteur.check") }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection