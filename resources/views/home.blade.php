@extends('layouts.app')

@section('content')

@php 
    $inHome = true;
@endphp


@include('partials.slider')

{{--Section 1--}}
<div class="home-section-1">
    <div class="light-gray-block float-right">
        <h1 class="" style="margin-bottom: 15px;">DO YOU KNOW THAT?</h1>
        <p class=" color-white">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas dasdsadasdsad dasas dasd asdasdas dasas das d</p>
        <div class="">
            <button class="btn btn-white">LEARN MORE</button>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

{{--Section 2--}}
<div class="home-section-2">
    <div class="dark-gray-block">
        <h1 style="margin-bottom: 15px;">TODAY IS YOUR DAY!</h1>
        <p class="color-white" style="margin-right: 25px;">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas dasdsadasdsad dasas dasd asdasdas dasas das d</p>
        <button class="btn btn-white">LEARN MORE</button>
    </div>
</div>

{{--Section 3--}}
<div>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }} " defer></script>
@endsection

