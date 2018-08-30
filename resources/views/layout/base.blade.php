<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    {{-- Meta, title, CSS, favicons, etc. --}}
    @section('metas')

        {{--TODO benith the favicon sentecen benith--}}
        {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> --}}

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="description" content="Inmobiliaria Web">
        <meta name="author" content="Mamei">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
              name='viewport'/>

        {{-- CSRF --}}
        {{-- TODO Ver q es esto --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

    @show

    <title> {{ config('app.name', 'Inmobiliaria') }} </title>

{{--Links--}}
@section('headLinks')
    @include('partials.links')
@show
{{-- End Links --}}

<body>

{{-- Navbar --}}
@section('navBar')
   @include('partials.navbar')
@show
{{-- End Navbar --}}

{{-- Content --}}
@section('content')
@show
{{-- End Content --}}

{{-- Footer --}}
{{--@section('footer')--}}
    {{--@include('partials.footer')--}}
{{--@show--}}
{{-- End Footer --}}

</body>

{{--Links Footer--}}
@section('footerScripts')
    @include('partials.footerLinks')
    {{--   Core JS Files and + plus  --}}

@show
{{-- End Links Footer --}}

</html>



