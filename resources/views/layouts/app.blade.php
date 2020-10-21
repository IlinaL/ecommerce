<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monohoo | @yield('title', '')</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Logo -->
    <link rel="shortcut icon" href="pictures/Shop/logo.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{URL::asset('/css/main.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light"> <!-- NavBar -->
        <a class="navbar-brand nav-link text-white bg-black" href="{{route('monohoo.index')}}"
            style="font-family:'Raleway','sans-serif';">M O N O H O O </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item ">
                    <a class="navbar-brand " href="{{route('home.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('shop.index')}}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('contact.index')}}">Contact</a>
                </li>
            </ul>
            
            <ul class="navbar-nav my-2 my-lg-0"> <!-- Login & Register -->
                @guest
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('login')}}">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('register')}}">Register</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="navbar-brand text-success hover:bg-success" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
            </ul> <!-- END Login & Register -->
            
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="navbar-brand " href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
                @endguest
                <li>
                    <a class="navbar-brand" href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i><span
                            class="cart-count"></a>
                </li>
            </ul> 
        </div>
    </nav> <!-- END Navbar -->
    @yield('content')
    @yield('style')
    @yield('script')
</body>

</html>