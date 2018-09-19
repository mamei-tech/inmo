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

        <div class="lang-{{App::getLocale()}}">
            <a class="lang-en hvr-underline-from-center"
               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
               href="{{route(Route::currentRouteName(),["en"])}}">ENG</a>
            /
            <a class="lang-es hvr-underline-from-center"
               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
               href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
        </div>

        <div>
            <a class="hvr-underline-from-center" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
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
    @php $even = false;
    @endphp

    @foreach ($promotions as $p)
        @php $even = !$even;
        @endphp
        <div class="promotion">
            <img class="promotion-background" src="{{$p->ImagePath}}">
            <div class="promotion-text {{$even?"light":"dark"}}-gray-block">
                <h1 class="" style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>
                <p class="color-white">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>
                <div class="">
                    <a href="{{$p->link}}" class="btn btn-white">{{__('app.learn_more')}}</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach

    {{--Section 3--}}
    <div class="home-section-3 row" style="margin: 0">
        @foreach ($promotionsSecond as $p)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h1 style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>
                <p class="color-gray">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>
                <a href="{{$p->link}}" class="btn btn-gray">{{__('app.learn_more')}}</a>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }} " defer></script>
@endpush

