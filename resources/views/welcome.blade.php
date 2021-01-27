<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Aplikasi Rekam Jejak Santri</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.6/examples/cover/cover.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">PDPS</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <!-- <a class="nav-link active" href="{{ URL::to('login') }}">Login</a> -->
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <img src="{{ asset('pdps.png') }}" alt="Logo Nurul Jadid" width="200" height="200">
            <br>
            <br>
            <br>
            <h1 class="cover-heading">Pengelolaan Data Prestasi Santri</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
                <a href="{{ URL::to('login') }}" class="btn btn-lg btn-secondary">Login</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>This website belongs <a href="https://nuruljadid.net/">Pondok Pesantren Nurul Jadid</a>, by <a href="https://instagram.com/masbro.dev">@masbro</a>.</p>
            </div>
        </footer>
    </div>



</body>

</html>