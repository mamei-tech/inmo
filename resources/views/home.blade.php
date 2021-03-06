@extends('layouts.app')



@section('title', 'Jorge E. Hidalgo')



@push('styles')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />

@endpush



@section('content')

    @php

        $inHome = true;

    @endphp



    @include('partials.slider')



    {{--Section 0--}}

    <div class="home-section-menu hiden-pc">



        <div class="lang-{{App::getLocale()}}">

            <a class="lang-en"

               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"

               href="{{route(Route::currentRouteName(),["en"])}}">ENG</a>

            /

            <a class="lang-es"

               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"

               href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>

        </div>




        <div>

            <a class="hvr-underline-from-center" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>

        </div>


        <div>

            <a class="hvr-underline-from-center" href="{{Route("about")}}">@lang('app.aboutMe')</a>

        </div>

        <div>

            <a class="hvr-underline-from-center" href="{{Route("contacts")}}">@lang('app.contact')</a>

        </div>
        <div>

            <a class="hvr-underline-from-center" href="{{Route("guides")}}">@lang('app.guides')</a>

        </div>

        <div>

            <a class="hvr-underline-from-center" href="http://jehidalgorealestate.idxbroker.com/idx/homevaluation">@lang('app.tools')</a>

        </div>


        <div>

            <a class="hvr-underline-from-center" href="{{Route("blog")}}">@lang('app.blog')</a>

        </div>



    </div>

    {{--Widget IDX--}}
    <div class="container-widget-idx">
        <h1 class="" style="margin-bottom: 15px;">{{__('app.property_search')}}</h1>

        <script charset="UTF-8" type="text/javascript" id="idxwidgetsrc-15691" src="https://jehidalgorealestate.idxbroker.com/idx/quicksearchjs.php?widgetid=15691"></script>
    </div>

    {{--Promotion--}}
    @php $even = false;
    @endphp
    @foreach ($promotions as $p)

        @php $even = !$even;

        @endphp

        <div class="promotion">

            <div class="promotion-background" style="width: 100%; height: 100%; background-size: cover; background-position: center center;" data-image-lg="{{$p->ImageLgPath}}" data-image-md="{{$p->ImageMdPath}}" data-image-sm="{{$p->ImageSmPath}}"></div>

            <div class="promotion-text {{$even?"light":"dark"}}-gray-block">

                <h1 class="" style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>

                <p class="color-white">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>

                <div class="">

                    <a href="{{$p->link}}" target="_blank" class="btn btn-white">{{__('app.learn_more')}}</a>

                </div>

            </div>

            <div class="clearfix"></div>

        </div>

    @endforeach



    {{--Section 3--}}

    <div class="home-section-3 row" style="margin: 0">

        @foreach ($promotionsSecond as $p)

            <div class="col-xl-4 col-md-6 col-sm-12">

                <h1 style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>

                <p class="color-gray">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>

                <a href="{{$p->link}}" target="_blank" class="btn btn-gray">{{__('app.learn_more')}}</a>

            </div>

        @endforeach

    </div>

@endsection



@push('scripts')

    <script src="{{ asset('js/views/home.js') }} "></script>

@endpush



