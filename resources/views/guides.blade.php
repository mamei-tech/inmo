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

        <form id="form-send-email" action="" method="post">
            <input type="email" class="form-control offset-lg-8 col-lg-4 col-sm-12" name="email" required=""
                   placeholder="@lang('app.yourEmail')">
        </form>

        <div style="margin-top: 20px;">
            <div class="pagination-guide">
                <button class="btn" style="display: flex; padding-left: 0; padding-right: 0" onclick="previousPage()">
                    <span style="margin-top: 1px;"><< </span>
                    <span class="text-previous" style="margin-left: 5px;"></span>
                </button>
                <button class="page-active btn btn-no-hover" style="margin-left: 15px;font-size: 14px;padding-left: 0;padding-right: 0;">1</button>
                <button class="btn btn-no-hover" style="margin-right: 3px; margin-left: 3px;font-size: 14px;padding-left: 0;padding-right: 0;">/</button>
                <button class="total-guides btn btn-no-hover" style="margin-right: 15px;font-size: 14px;padding-left: 0;padding-right: 0;">{{ ceil($guides->count() / 4) }}</button>
                <button class="btn" style="display: flex; padding-left: 0;padding-right: 0;" onclick="nextPage()">
                    <span class="text-next" style="margin-right: 5px;"></span>
                    <span> >> </span>
                </button>
            </div>

            <div id="container-guides" class="row">
                @foreach ($guides as $g)

                    <div class="col-xl-3 col-sm-12" style="display: none; flex-direction: column">

                        <div class="container-img-guide" style="position:relative; background-image: url('{{ $g->imagePath }}')">
                            <div class="overlay-guides"></div>
                            <h3 class="color-yellow" style="z-index: 2">{{App::getLocale()=="es"? $g->text_es : $g->text_en}}</h3>
                        </div>


                        <p style="margin-top: 15px;flex: 1" class="color-gray container-guides-info">{{App::getLocale()=="es"? $g->description_es : $g->description_en}}</p>

                        <div style="display: flex;justify-content: center;" id="container-btn-download">
                            <button type="button" id="btn-{{ $g->id }}" onclick="downloadGuide(this)" class="btn btn-yellow">@lang('app.download')</button>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="guide-section-1">
        <h2 class="color-yellow"> {{ __('app.suscribe_guides') }}  </h2>
        <h3 style="margin-top: 15px;" class="color-white"> {{ __('app.suscribe_subtitle_guides') }}  </h3>

        <form id="form-add-subcriptor" action="" method="post">
        <div class="row">

            <div id="container-suscribe" style="margin-top: 40px;" class="offset-lg-3 col-lg-9 col-sm-12">

                    <input type="email" class="form-control" name="email-suscribe" required=""
                           placeholder="@lang('app.yourEmail')" style="margin-right: 10px;">

                <button type="button" class="btn btn-yellow" id="btn-add-subcriptor">@lang('app.join')</button>
            </div>

        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var urlSendEmail = '{{route("guide.sendEmail", [App::getLocale()])}}';
        var urlAddSubcriptor = '{{route("guide.addSubcriptor", [App::getLocale()])}}';
    </script>
    <script src="{{ asset('js/messages.'.App::getLocale().'.js') }}"></script>
    <script src="{{ asset('js/views/guides.js') }}" defer></script>
@endpush

