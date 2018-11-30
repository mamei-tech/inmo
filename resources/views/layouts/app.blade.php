<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="autor" content="JORGE E. HIDALGO BORROTO, LLC">
    <meta name="keywords" content="3 bedroom apartments,apartments,apartment,apartment rentals,apartments for rent near me,apartments homes for rent,apartments for rent,cheap apartments,apartments near me,apartments for sale,rental apartments,studio apartments,apt for rent,brickell, brickell apartments, brickell city centre, brickell condos, brickell key, brickell miami, brickell zip code, condo rentals, condominium, condos, condos for rent, condos for rent near me, condos for sale, condos for sale near me, condos near me, downtown miami, for rent near me, for sale, home for sale, homes for rent, homes for rent near me, homes for sale, homes for sale near me, house for rent, house for sale, house for sale near me, houses for rent, houses for rent near me, houses for sale, houses for sale near me, luxury apartments, places for rent near me, places to rent near me, real estate for sale, real estate rentals, realator, realtor, realtor miami, realtor near me, realtor reviews, realtor websites, realtors, rent apartment, rental homes, rental properties, rentals, rentals near me, townhomes for rent, townhomes for sale, what is my house worth, what's my house worth"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/alertify.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    @stack('styles')
    <script type="text/javascript">
        window._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        @if(App::getLocale()=="en")
            alertify.labels.ok = "OK";
        alertify.labels.cancel = "Cancel";
        @endif
    </script>
</head>
<body>
<div id="app">
    @include('partials.navbar')

    @unless(isset($inHome) && $inHome==true)
        <div class="navbar-space-fill"></div>
    @endunless
    <main class="">
        @yield('content')
    </main>

    <div id="back-to-top" class="display-tablet display-mobile" onclick="window.scroll( 0, 0)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><defs><style>.cls-01{fill:#e0af59;opacity:0.7;}.cls-02{fill:#fff;}</style></defs><title>Recurso 12</title><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><rect class="cls-01" width="50" height="50"/><path class="cls-02" d="M37.54,30.71l-1.13,1.13L25,20.42,13.58,31.84l-1.13-1.13L25,18.16Z"/></g></g></svg>
    </div>

    @include('partials.footer')
</div>
@stack('scripts')
<script type="text/javascript">
    @php
        $message = \Illuminate\Support\Facades\Session::get("status");
    @endphp
    @if($message)
    alertify.log("{{$message}}");
    @endif

    function parallax(){
        $(".img-parallax").each(function (i, e) {
            e.style.backgroundPositionY = ( e.offsetTop - window.scrollY - ( e.offsetTop - window.scrollY )* 1.2) + "px";// Con retardo
            // e.style.backgroundPositionY = ( e.offsetTop - e.offsetHeight - window.scrollY - ( e.offsetTop - window.scrollY )* - 0.2) + "px";
        })
    }

    try {
        parallax();
    } catch (e) {
    }

    document.addEventListener("scroll", parallax);
    document.addEventListener("readystatechange", parallax);

    window._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>
</body>
</html>

