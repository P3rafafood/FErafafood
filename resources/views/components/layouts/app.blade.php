<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Rafa Order Shop' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        .btn-orange {
            color: white;
            background-color: orange;
        }

        .btn-orange:hover {
            border: 1px solid orange;
            color: orange;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="logo" width="50px" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ (Route::is('menu.*')) ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ (Route::is('menu.food')) ? 'active' : '' }}" href="{{ route('menu.food') }}">Makanan</a></li>
                            <li><a class="dropdown-item {{ (Route::is('menu.drink')) ? 'active' : '' }}" href="{{ route('menu.drink') }}">Minuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ (Route::is('order')) ? 'active' : '' }}" href="{{ route('order') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-orange {{ (Route::is('login')) ? 'active' : '' }}" href="{{ route('login') }}">LogIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
