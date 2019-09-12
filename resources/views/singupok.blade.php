@extends('layouts.app')

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/neighborhood.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="singup-description row" style="margin: 0">

        <div class="" role="">
            {{ __('auth.register_info') }}
        </div>

        <div class="regiter-geenral-info">
            {{ __('auth.email_check_info') }}
            {{ __('auth.email_resend1') }}, <a class="color-yellow singup-description-link" href="{{ route('auth.resend', [App::getLocale(), 'user_id' => $user_id]) }}">{{ __('auth.email_resend2') }}</a>.


        </div>

        <button type="button" class="btn btn-yellow" style="height: 40px"><a id="btnback" href="{{route('blog')}}" >@lang('app.back')</a></button>

    </div>

@endsection

@push('scripts')

@endpush