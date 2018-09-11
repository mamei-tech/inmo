@extends('layouts.app')

@section('title', __('app.home'))

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet"></link>
@endpush

@section('content')

    @php
        $inHome = true;
    @endphp


    @include('partials.slider')

    {{--Section 0--}}
    <div class="home-section-menu hiden-pc">

            <div class="lang-{{App::getLocale()}}" >
                <a class="lang-en hvr-underline-from-center"
                   style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                   href="{{route(Route::currentRouteName(),["en"])}}">ENG</a>
                /
                <a class="lang-es hvr-underline-from-center"
                   style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                   href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
            </div>

            <div>
                <a class="hvr-underline-from-center"  href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
            </div>
            <div>
                <a class="hvr-underline-from-center" href="{{Route("guides")}}">@lang('app.guides')</a>
            </div>
            <div>
                <a class="hvr-underline-from-center" href="{{Route("about")}}">@lang('app.aboutMe')</a>
            </div>
            <div>
                <a class="hvr-underline-from-center" href="{{Route("contacts")}}">@lang('app.contact')</a>
            </div>

    </div>

    {{--Section 1--}}
    <div class="home-section-1">
        <div class="light-gray-block float-right">
            <h1 class="" style="margin-bottom: 15px;">DO YOU KNOW THAT?</h1>
            <p class=" color-white">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das d</p>
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
            <p class="color-white">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das d</p>
            <button class="btn btn-white">LEARN MORE</button>
        </div>
    </div>

    {{--Section 3--}}
    <div class="home-section-3">
        <div class="column-section-3 first-col">
            <h1 style="margin-bottom: 15px;">YOUR HOME FROM THE BEACH</h1>
            <p class="color-gray">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das d</p>
            <button class="btn btn-gray">LEARN MORE</button>
        </div>
        <div class="column-section-3">
            <h1 style="margin-bottom: 15px;">GREAT HOMES IN BRICKELL TO LOW PRICES</h1>
            <p class="color-gray">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das d</p>
            <button class="btn btn-gray">LEARN MORE</button>
        </div>
        <div class="column-section-3 old-col">
            <h1 style="margin-bottom: 15px;">ROLAND FRANK</h1>
            <p class="color-gray">asdas as dasdas das das das dasas dasdasasas das das dasd assad asd asd asdas
                dasdsadasdsad dasas dasd asdasdas dasas das d</p>
            <button class="btn btn-gray">LEARN MORE</button>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }} " defer></script>
@endpush

