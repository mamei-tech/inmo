@extends('layouts.app')

@section('title', __('app.guides'))

@push('styles')
    <link href="{{ asset('css/guides.css') }}" rel="stylesheet"></link>
@endpush

@section('content')
    <div class="guide-section-0 img-parallax">

        <h1>{{ __('app.guides') }}</h1>
        <h3 class="subtitle">{{ __('app.guide_subtitle') }}</h3>

        @php $even = false;
        @endphp

        <div class="container-guides">
            {{--@foreach ($guides as $g)--}}
                {{--@php $even = !$even;--}}
                {{--@endphp--}}

                {{--@if($even)--}}
                    {{--<div><div><h3 class="guides-h3">{{$g->text_en}}</h3></div>--}}
                {{--@else--}}
                    {{--<div><h3 class="guides-h3">{{$g->text_en}}</h3></div></div>--}}
                {{--@endif--}}

            {{--@endforeach--}}
        </div>

        <h4 class="color-yellow selected">{{ __('app.guides_selected') }}</h4>

        <form action="@{{ route('sendContact') }}" method="post">
            <div class="form-group">
                <input type="email" class="form-control offset-lg-6 col-lg-6 col-sm-12" name="email" required=""
                       placeholder="@lang('app.yourEmail')">
            </div>

            <div>
                <button type="submit" class="btn btn-yellow">@lang('app.download')</button>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/views/guides.js') }}" defer></script>
@endpush