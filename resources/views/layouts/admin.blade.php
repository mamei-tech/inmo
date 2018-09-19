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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/kendo/kendo.all.min.js') }}"></script>
    <script src="{{ asset('js/kendo/kendo.culture.'.App::getLocale().'.min.js') }}"></script>
    <script src="{{ asset('js/kendo/kendo.messages.'.App::getLocale().'.min.js') }}"></script>
    <script src="{{ asset('js/kendo/kendo.aspnetmvc.min.js') }}"></script>
    <script src="{{ asset('js/underscore.min.js') }}"></script>
    <script src="{{ asset('js/alertify.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kendo/2016.3.914/kendo.common-office365.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/kendo/2016.3.914/kendo.office365.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @stack('styles')

    <script type="text/javascript">
        window._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    </script>

</head>
<body>
<div id="app">
    @include('partials.admin_navbar')
    <main class="" style="margin: 30px 0;">
        @yield('content')
    </main>
</div>
@stack('scripts')
<script type="text/javascript">
    @php
        $message = \Illuminate\Support\Facades\Session::get("status");
    @endphp
    @if($message)
        alertify.log("{{$message}}");
    @endif

</script>
</body>
</html>

