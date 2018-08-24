@extends('layout.base')

<title> Inmobiliaria / House Info </title>

@section('headLinks')
    @parent
@endsection

@section('navBar')
    @parent
@endsection

@section('content')

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/houseInfo.js') }} " defer></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
@endsection