<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Orange toolz</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="#">
                            <img width="50%" src="https://orangetoolz.com/wp-content/uploads/2018/10/logo-white.png" alt="">
                        </a>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
{{--                                <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
                            </li>
                            <li class="nav-item">
{{--                                <a class="nav-link" href="#">Link</a>--}}
                            </li>
                        </ul>
                        <form class="d-flex">
                            <div>
                                @if (Route::has('login'))
                                    <div>
                                        @auth
                                            <a type="button" class="btn btn-outline-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                                        @else
                                            <a type="button" class="btn btn-outline-primary" href="{{ route('login') }}">Log in</a>

                                            @if (Route::has('register'))
                                                <a type="button" class="btn btn-outline-danger" href="{{ route('register') }}">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </form>

                    </div>
                </div>
            </nav>
            <div class="container">
                <h2>Please login</h2>
            </div>
        </div>


{{--    JS Files--}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
