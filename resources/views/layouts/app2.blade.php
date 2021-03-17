<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <div class="navbar navbar-expand-md" style="" id="app2">
        <div class="container"><h2>
                 <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Deliveboo') }}
            </a>
            </h2>

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
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown text-center">

                            <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>

                            {{-- aggiunto logout backoffice --}}
                            <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                            </form>

                            {{-- <a class="dropdown-item" href="{{ route('admin.user.index')}}">User info</a>

                            <a class="dropdown-item" href="{{ route('admin.restaurant.index') }}">Restaurants</a>

                            <a class="dropdown-item" href="{{ route('admin.menu.index')}}">Menus</a>

                            <a class="dropdown-item" href="{{ route('admin.dish.index') }}">Dishes</a>

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->owner_name }}
                            </a> --}}

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div> --}}

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>



        @yield('content')

</div>

<script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
<script src=" {{ asset('js/popper.js') }} " charset="utf-8"></script>
</body>
</html>
