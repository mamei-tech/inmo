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
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.localScroll.js') }}" defer></script>
    <script src="{{ asset('js/jquery.parallax.js') }}" defer></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    @section('navbar')
        @include('partials.navbar')
    @show
    @unless(isset($inHome) && $inHome==true)
        <div class="navbar-space-fill"></div>
    @endunless
    <main class="">
        @yield('content')
    </main>
    <div style="height: 100px; background-color: red;"></div>

</div>
</body>
</html>

@yield('scripts')
