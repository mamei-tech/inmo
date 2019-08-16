@extends('layouts.app')

@section('title', __('app.guides'))

@push('styles')
    <link href="{{ asset('css/guides.css') }}" rel="stylesheet"></link>
@endpush
@php
    $inGuide = true;
@endphp
@section('content')
    <div class="guide-section-0">

        <h1>{{ __('app.guides') }}</h1>
        <h3 class="color-gray subtitle">{{ __('app.guide_subtitle') }}</h3>
        <input type="email" class="form-control offset-lg-8 col-lg-4 col-sm-12" name="email" required=""
               placeholder="@lang('app.yourEmail')">

        <div style="margin-top: 50px;">
            <div class="pagination-mobile"></div>

            <div id="container-guides" class="row">
                @foreach ($guides as $g)

                    <div class="col-xl-3 col-sm-12" style="display: flex; flex-direction: column">

                        <div class="container-img-guide" style="background-image: url('{{ $g->imagePath }}')">
                            <h3 class="color-yellow">{{App::getLocale()=="es"? $g->text_es : $g->text_en}}</h3>
                        </div>


                        <p style="margin-top: 15px;flex: 1" class="color-gray container-guides-info">{{App::getLocale()=="es"? $g->description_es : $g->description_en}}</p>

                        <div style="display: flex;justify-content: center;">
                            <button type="button" class="btn btn-yellow">@lang('app.download')</button>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        {{--<div class="container-guides row">--}}
            {{--@foreach ($guides as $g)--}}
                {{--<div class="guide-item col-md-4 col-xs-12">--}}
                    {{--<div class="box">--}}
                        {{--<div id="{{$g->id}}"></div>--}}
                    {{--</div>--}}
                    {{--<h3>{{App::getLocale()=="es"? $g->text_es : $g->text_en}}</h3>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}

        {{--<h4 class="color-yellow selected">{{ __('app.guides_selected') }}</h4>--}}

        {{--<form id="form-send-email" action="" method="post">--}}
            {{--<div class="form-group">--}}

            {{--</div>--}}

            {{--<div>--}}
                {{--<button type="button" onclick="downloadGuide()" class="btn btn-yellow">@lang('app.download')</button>--}}
            {{--</div>--}}
        {{--</form>--}}

    </div>
    <div class="guide-section-1">
        <h2 class="color-yellow"> {{ __('app.suscribe_guides') }}  </h2>
        <h3 style="margin-top: 15px;" class="color-white"> {{ __('app.suscribe_subtitle_guides') }}  </h3>

        <div class="row">
            <div id="container-suscribe" style="margin-top: 40px;" class="offset-lg-3 col-lg-9 col-sm-12">
                <input type="email" class="form-control" name="email-suscribe" required=""
                       placeholder="@lang('app.yourEmail')" style="margin-right: 10px;">
                <button type="button" class="btn btn-yellow">@lang('app.join')</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var urlSendEmail = '{{route("guide.sendEmail", [App::getLocale()])}}';
    </script>
    <script src="{{ asset('js/views/guides.js') }}" defer></script>
@endpush