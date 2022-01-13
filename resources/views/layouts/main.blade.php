<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MbWekCenter</title>
    
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: grey;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/') }}">MbWekCenter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light active" href="{{ route('home') }}">Home</a>
                    <a class="nav-link text-light" href="/search-product">Search Product</a>
                @guest
                    @if (Route::has('login'))
                    <a class="nav-link text-light" href="/login">Login</a>
                    @endif
                    
                    @if (Route::has('register'))
                    <a class="nav-link text-light" href="/register">Register</a>
                    @endif
                    
                @else
                    @if(auth()->user()->role_id == 1)
                        <a class="nav-link" href="{{ route('insert-product') }}" style="color: white;">{{__('Insert Item')}}</a>
                        <a class="nav-link" href="{{route('get-user')}}" style="color: white;">{{__('Manage User')}}</a>
                    @endif

                    @if(auth()->user()->role_id == 2)
                        <a class="nav-link" href="/update-profile/{{auth()->user()->user_id}}" style="color: white;">{{__('Update Profile')}}</a>
                        <a class="nav-link" href="/transaction-history" style="color: white;">{{__('Transaction')}}</a>
                        <a class="nav-link" href="{{route('cart')}}" style="color: white;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    @endif
                @endguest    
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
</body>
</html>