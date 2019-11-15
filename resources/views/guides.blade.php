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
            @if ($guides instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="blog-section-3 row no-gutters" style="font-size: 13px;">
                    <div class="col-8 mb-0 pb-0" style="color: #8e8e8e;align-items: initial;">
                        {{ $guides->links('vendor.pagination.simple-default') }}
                    </div>
                    <div class="col-4 mb-0 pb-0 pr-0" style="align-items: flex-end;color: #8e8e8e;">
                        {{$guides->total()}} {{str_plural(__('pagination.document'), $guides->total() ? 2 : -1)}}
                    </div>
                </div>
            @endif

            <div id="container-guides" class="row">
                @foreach ($guides as $g)

                    <div class="col-md-6 col-lg-4 mb-5">

                        <div class="row g">

                            <div class="col-6 pic-cont">
                                <div class="container-img-guide" style="position:relative; background-image: url('{{ $g->imagePath }}')">
                                    {{--<div class="overlay-guides"></div>--}}
                                </div>
                            </div>

                            <div class="col-6">
                                <p class="color-gray container-guides-info mb-0">{{App::getLocale()=="es"? $g->description_es : $g->description_en}}</p>

                                <div id="container-btn-download">
                                    <button type="button" id="btn-{{ $g->id }}" class="btn btn-yellow btn-download-guide">@lang('app.download')</button>
                                </div>
                            </div>

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

