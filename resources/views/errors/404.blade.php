<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="I piatti dei migliori ristoranti della tua zona, consegnati dove vuoi con Deliveroo. Ordina subito!">

        <title>Deliveroo - @yield('404')</title>

        {{-- JS --}}
        <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
        <script src=" {{ asset('js/plane.js') }} " charset="utf-8"></script>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link href=" {{ asset('css/app.css') }} " rel="stylesheet">
    </head>

    <body>
        <section id="errors">
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_uF120X.json"  background="transparent"  speed="1"  style="width: 600px; height: 600px;"  loop autoplay></lottie-player>

            <di class="content-404">
                <h2>Oops, <br><span class="exception">nothing</span> here...</h2>
                <a href=" {{ route('home') }} ">Go Back</a>
            </div>
        </section>

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    </body>
