@extends('layouts.app')

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/neighborhood.css') }}" rel="stylesheet">
@endpush

@php
    $noLink = true;
@endphp

@section('content')

    <div class="singup-description" style="margin: 0">

        <div style="margin-bottom: 15px;">
            {{ __('auth.register_info') }}
        </div>

        <div style="margin-bottom: 40px;">
            {{ __('auth.email_check_info') }}
            {{ __('auth.email_resend1') }}, <a class="color-yellow singup-description-link" href="{{ route('auth.resend', [App::getLocale(), 'user_id' => $user_id]) }}">{{ __('auth.email_resend2') }}</a>.
        </div>

        <button type="button" class="btn btn-yellow" style="height: 40px"><a id="btnback" href="{{route('blog')}}" >@lang('app.back')</a></button>

    </div>

@endsection

@push('scripts')

@endpush