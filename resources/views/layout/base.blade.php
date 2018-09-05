<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @section('metas')

        {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> --}}

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="description" content="Inmobiliaria Web">
        <meta name="author" content="Mamei">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>

        {{-- CSRF --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show

    <title>@yield('title') {{ config('app.name') }} </title>

    {{--Links--}}
    @section('headLinks')
        @include('partials.links')
    @show
    {{-- End Links --}}
</head>
<body>

@section('navBar')
   @@include('partials.navbar')
@show

<div style="background: red">  
<a href="{{route(Route::currentRouteName(),["es"])}}">ESPAÑOL</a><br/>
<a href="{{route(Route::currentRouteName(),["en"])}}">INGLES</a><br/>
<a href="{{route("home")}}">Home</a><br/>
<a href="{{route("aboutMe")}}">About</a><br/>

</div>
@yield('content')
@section('footerScripts')
    @include('partials.footerLinks')
@show

</body>

</html>