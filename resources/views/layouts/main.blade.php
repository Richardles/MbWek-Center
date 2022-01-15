<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MbWekCenter') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: grey;
        }

    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
                MbWekCenter
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"
                            style="color: white;">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/search-product"
                            style="color: white;">{{ __('Search Product') }}</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"
                                    style="color: white;">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"
                                    style="color: white;">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (auth()->user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('insert-product') }}"
                                    style="color: white;">{{ __('Insert Item') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get-user') }}"
                                    style="color: white;">{{ __('Manage User') }}</a>
                            </li>
                        @endif
                        @if (auth()->user()->role_id == 2)
                            <li class="nav-item">
                                <a class="nav-link" href="/update-profile/{{ auth()->user()->user_id }}"
                                    style="color: white;">{{ __('Update Profile') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/transaction-history"
                                    style="color: white;">{{ __('Transaction') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}" style="color: white;"><i
                                        class="fa fa-shopping-cart" aria-hiddebin="true"></i></a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-5">
        @yield('container')
    </div>

    <footer class="bg-info text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-light" href="https://mdbootstrap.com/">RR CV</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
</body>

</html>
