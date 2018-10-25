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
        <div class="container-ligh-gray-background" style="background: url('/images/lg/9.jpg') 50% 50% /Cover; width: 100%; height: 100%;"></div>
        <div class="light-gray-block float-right">
            <h1>@lang('app.brickell')</h1>
            <h2>@lang('app.moreThanCommunity')</h2>

            <div class="container-sales">
                <h2 class="color-yellow link-sales"><a href="{{ route('houses', [App::getLocale()]) }}">@lang('app.sales')</a></h2>
                <h2 class="color-yellow">/</h2>
                <h2 class="color-yellow link-sales"><a href="{{ route('houses', [App::getLocale()]) }}">@lang('app.rentals')</a></h2>
            </div>

            <div class="arrow-floating light-block">
                <span class="arrow-toggle-line"></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="container-open-ligh-gray">
        <div class="text-brickell">
            <p class="color-gray display-pc"> @php echo html_entity_decode( __('app.firstTextBrickell')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.firstTextBrickellTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.firstTextBrickellMobile')) @endphp</p>
        </div>

        <div class="first-img-brickell img-parallax">
        </div>

        <div class="text-brickell">
            <p class="color-gray display-pc">@php echo html_entity_decode( __('app.secondTextBrickell')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.secondTextBrickellTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.secondTextBrickellMobile')) @endphp</p>
        </div>

        <div class="second-img-brickell img-parallax"></div>

        <div class="text-brickell">
            <p class="color-gray column-especial display-pc">@php echo html_entity_decode( __('app.thirthTextBrickell')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.thirthTextBrickellTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.thirthTextBrickellMobile')) @endphp</p>
        </div>

        <div class="thirth-img-brickell img-parallax"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray">@php echo html_entity_decode( __('app.fourthTextBrickellMobile')) @endphp</p>
        </div>
    </div>

    {{--Section dark gray--}}
    <div class="container-dark-gray">
        <div class="container-dark-gray-background" style="background: url('/images/lg/10.jpg') 50% 50% /Cover; width: 100%; height: 100%;"></div>
        <div class="dark-gray-block">
            <h1>@lang('app.downtownMiami')</h1>
            <h2>@lang('app.magicCity')</h2>

            <div class="container-sales">
                <h2 class="color-yellow link-sales"><a href="{{ route('houses', [App::getLocale()]) }}">@lang('app.sales')</a></h2>
                <h2 class="color-yellow">/</h2>
                <h2 class="color-yellow link-sales"><a href="{{ route('houses', [App::getLocale()]) }}">@lang('app.rentals')</a></h2>
            </div>

            <div class="arrow-floating dark-block">
                <span class="arrow-toggle-line"></span>
            </div>
        </div>
    </div>

    <div class="container-open-dark-gray">
        <div class="text-brickell">
            <p class="color-gray display-pc">@php echo html_entity_decode( __('app.firstTextDowntown')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.firstTextDowntownTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.firstTextDowntownMobile')) @endphp</p>
        </div>

        <div class="first-img-downtown img-parallax"></div>

        <div class="text-brickell">
            <p class="color-gray display-pc column-especial">@php echo html_entity_decode( __('app.secondTextDowntown')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.secondTextDowntownTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.secondTextDowntownMobile')) @endphp</p>
        </div>

        <div class="second-img-downtown img-parallax"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray display-pc column-especial">@php echo html_entity_decode( __('app.thirthTextDowntown')) @endphp</p>
            <p class="color-gray display-tablet">@php echo html_entity_decode( __('app.thirthTextDowntownTable')) @endphp</p>
            <p class="color-gray display-mobile">@php echo html_entity_decode( __('app.thirthTextDowntownMobile')) @endphp</p>
        </div>

        <div class="thirth-img-downtown img-parallax display-mobile"></div>

        <div class="text-brickell display-mobile">
            <p class="color-gray">@php echo html_entity_decode( __('app.fourthTextDowntownMobile')) @endphp</p>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/neighborhood.js') }} " defer></script>
@endpush