<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="I piatti dei migliori ristoranti della tua zona, consegnati dove vuoi con Deliveroo. Ordina subito!">

        <title>Deliveroo - @yield('title')</title>

        {{-- JS --}}
        {{-- <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script> --}}
        <script src=" {{ asset('js/plane.js') }} " charset="utf-8"></script>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link href=" {{ asset('css/app.css') }} " rel="stylesheet">
    </head>

    <body>
        {{-- contenuto della sidbar --}}
        <nav class="flex-center position-ref full-height sidebar">
            @include('layouts.partials.sidebar')
        </nav>

        {{-- contenuto della pagina --}}
        <main>
            @yield('content')
            @include('layouts.partials.footer')
        </main>



        {{-- contenuto del carrello --}}
        {{-- <aside>
            @include('layouts.partials.cart')
        </aside> --}}


        {{-- contenuto del banner di approvazione delle policy del sito --}}
        {{-- <section>
            @include('layouts.partials.policy')
        </section> --}}
        <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
    <script src=" {{ asset('js/popper.js') }} " charset="utf-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

</html>
