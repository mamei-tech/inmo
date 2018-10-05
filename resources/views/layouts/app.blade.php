<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    @stack('styles')

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

    @include('partials.footer')
</div>
@stack('scripts')
<script type="text/javascript">
    function parallax(){
        document.querySelectorAll(".img-parallax").forEach(function (e) {
            e.style.backgroundPositionY = ( e.offsetTop - window.scrollY - ( e.offsetTop - window.scrollY )* 0.5) + "px";// Con retardo
            //e.style.backgroundPositionY = ( e.offsetTop - e.offsetHeight - window.scrollY - ( e.offsetTop - window.scrollY )* - 0.2) + "px";
        })
    }
    document.addEventListener("scroll", function () {
       parallax();
    });
</script>
</body>
</html>

