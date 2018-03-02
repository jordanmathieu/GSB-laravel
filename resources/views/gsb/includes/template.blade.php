<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GSB Frais</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">
</head>

<body>
    @include("gsb.includes.header")

<div class="container-fluid">
    <div class="row">
        @include("gsb.includes.navbar")

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @include("gsb.includes.flash")
            @yield("content")
        </main>
    </div>
</div>
</body>
</html>
