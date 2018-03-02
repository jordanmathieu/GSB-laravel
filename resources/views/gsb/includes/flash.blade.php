@if (Session::has("success"))
    <div class="alert alert-success" role="alert">
        <li>{{ Session::get("success") }}</li>
    </div>
@endif
@if (Session::has("error"))
    <div class="alert alert-danger" role="alert">
        <li>{{ Session::get("error") }}</li>
    </div>
@endif
@if (Session::has("information"))
    <div class="alert alert-primary" role="alert">
        <li>{{ Session::get("information") }}</li>
    </div>
@endif