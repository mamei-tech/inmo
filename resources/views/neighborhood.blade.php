@extends('layouts.app')

@section('title', __('app.neighborhoods'))

@push('styles')
    <link href="{{ asset('css/neighborhood.css') }}" rel="stylesheet"></link>
@endpush

@section('content')
    {{--Section volver al inicio--}}
    <div class="back-init"></div>

    {{--Section light gray--}}
    <div class="container-ligh-gray">
        <img class="container-ligh-gray-background" src="/images/lg/9.jpg">
        <div class="light-gray-block float-right">
            <h1>@lang('app.brickell')</h1>
            <h2>@lang('app.moreThanCommunity')</h2>

            <div class="container-sales">
                <h2 class="color-yellow link-sales"><a href="#">@lang('app.sales')</a></h2>
                <h2 class="color-yellow">/</h2>
                <h2 class="color-yellow link-sales"><a href="#">@lang('app.rentals')</a></h2>
            </div>

            <div class="arrow-floating light-block">
                <span class="arrow-toggle-line"></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="container-open-ligh-gray">
        <div class="text-brickell">
            <p class="color-gray display-pc">@lang('app.firstTextBrickell')</p>
            <p class="color-gray display-tablet">@lang('app.firstTextBrickellTable')</p>
            <p class="color-gray display-mobile">@lang('app.firstTextBrickellMobile')</p>
        </div>

        <div class="first-img-brickell img-parallax">
        </div>

        <div class="text-brickell">
            <p class="color-gray display-pc">@lang('app.secondTextBrickell')</p>
            <p class="color-gray display-tablet">@lang('app.secondTextBrickellTable')</p>
            <p class="color-gray display-mobile">@lang('app.secondTextBrickellMobile')</p>
        </div>

        <div class="second-img-brickell img-parallax"></div>

        <div class="text-brickell">
            <p class="color-gray column-especial display-pc">@lang('app.thirthTextBrickell')</p>
            <p class="color-gray display-tablet">@lang('app.thirthTextBrickellTable')</p>
            <p class="color-gray display-mobile">@lang('app.thirthTextBrickellMobile')</p>
        </div>

        <div class="thirth-img-brickell img-parallax"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray">@lang('app.fourthTextBrickellMobile')</p>
        </div>
    </div>

    {{--Section dark gray--}}
    <div class="container-dark-gray">
        <img class="container-dark-gray-background" src="/images/lg/10.jpg">
        <div class="dark-gray-block">
            <h1>@lang('app.downtownMiami')</h1>
            <h2>@lang('app.magicCity')</h2>

            <div class="container-sales">
                <h2 class="color-yellow link-sales"><a href="#">@lang('app.sales')</a></h2>
                <h2 class="color-yellow">/</h2>
                <h2 class="color-yellow link-sales"><a href="#">@lang('app.rentals')</a></h2>
            </div>

            <div class="arrow-floating dark-block">
                <span class="arrow-toggle-line"></span>
            </div>
        </div>
    </div>

    <div class="container-open-dark-gray">
        <div class="text-brickell">
            <p class="color-gray display-pc">@lang('app.firstTextDowntown')</p>
            <p class="color-gray display-tablet">@lang('app.firstTextDowntownTable')</p>
            <p class="color-gray display-mobile">@lang('app.firstTextDowntownMobile')</p>
        </div>

        <div class="first-img-downtown img-parallax"></div>

        <div class="text-brickell">
            <p class="color-gray display-pc column-especial">@lang('app.secondTextDowntown')</p>
            <p class="color-gray display-tablet">@lang('app.secondTextDowntownTable')</p>
            <p class="color-gray display-mobile">@lang('app.secondTextDowntownMobile')</p>
        </div>

        <div class="second-img-downtown img-parallax"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray display-pc column-especial">@lang('app.thirthTextDowntown')</p>
            <p class="color-gray display-tablet">@lang('app.thirthTextDowntownTable')</p>
            <p class="color-gray display-mobile">@lang('app.thirthTextDowntownMobile')</p>
        </div>

        <div class="thirth-img-downtown img-parallax display-mobile"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray">@lang('app.fourthTextDowntownMobile')</p>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/neighborhood.js') }} " defer></script>
@endpush