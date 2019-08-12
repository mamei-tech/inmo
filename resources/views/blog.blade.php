@extends('layouts.app')

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet"></link>
@endpush
@php
    $inBlog = true;
@endphp
@section('content')
    <div class="section-search">
        {{--TODO Falta el icono de buscar--}}
        <h1>@lang('app.blog')</h1>

        <div class="search-advance">
            <h3 class="color-gray">@lang('app.advance_search')</h3>

            <div class="form-group">
                <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.search')">
            </div>
        </div>

    </div>

    <div class="section-sigin-sigout">

        <div class="section-sigin-sigout-text">
            <h3 class="color-white">@lang('app.signin_signout')</h3>

            <div class="arrow-floating">
                <span class="arrow-toggle-line"></span>
            </div>
        </div>

        <div class="container-signin-signout" style="display: none">

            <div class="container-signin-signout-aux">
            </div>

            <div class="container-signin-signout-content">

                <div class="container-signin-signout-button">
                    <button type="button" class="btn btn-yellow" style="margin-right: 15px">@lang('app.facebook')</button>
                    <button type="button" class="btn btn-yellow" style="margin-left: 15px"><a href="{{Route("auth.redirectToProvider", [App::getLocale(), "google"])}}">@lang('app.google')</a>></button>
                </div>

                <div class="container-signin-signout-input" style="margin-top: 30px;">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourEmail')">
                    </div>
                </div>

                <div class="container-signin-signout-input" style="margin-top: 10px;">
                    <div class="form-group" style="margin-right: 15px;">
                        <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourUsername')">
                    </div>

                    <div class="form-group" style="margin-left: 15px;">
                        <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourPassword')">
                    </div>
                </div>

                <div style="margin-top: 10px;" class="container-signin-signout-last">
                    <h3 class="color-yellow">@lang('app.privacy')</h3>

                    <span class="h3-middle"><h3 class="color-white" style="margin-right: 5px;">@lang('app.haveAccount')</h3><h3 class="color-yellow">@lang('app.singin')</h3></span>


                    <button type="button" class="btn btn-yellow">@lang('app.singup')</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
@endpush