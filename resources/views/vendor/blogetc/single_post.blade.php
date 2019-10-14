@extends("layouts.app")

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush

@php
    $inBlog = true;
@endphp

@section('mainclass', 'blogindex')

@section("content")

    @include("blogetc::partials.search_section")

    @php isset($dr) ? $dr = 1 : $dr = 0 @endphp
    <input id="dr" type="text" hidden value="{{$dr}}">

    {{-- SingIN SingUP Forms --}}
    @guest
        <div class="section-sigin-sigout">

            <div class="section-sigin-sigout-text" style="cursor: pointer;" id="section-sigin-sigout-text">
                <h3 class="color-white">@lang('app.signin_signout')</h3>

                <div class="arrow-floating">
                    <span class="arrow-toggle-line"></span>
                </div>
            </div>

            <div id="su" class="container-signin-signout row"  style="display: none">

                <div class="container-signin-signout-aux">
                </div>

                <div class="container-signin-signout-content">

                    <div class="container-signin-signout-button">

                        <button type="button" class="btn btn-yellow" style="margin-right: 15px">
                            <a href="{{Route("auth.redirectToProvider", [App::getLocale(), "facebook"])}}">
                                @lang('app.facebook')
                            </a>
                        </button>

                        <button type="button" class="btn btn-yellow" style="margin-left: 15px">
                            <a href="{{Route("auth.redirectToProvider", [App::getLocale(), "google"])}}">
                                @lang('app.google')
                            </a></button>
                    </div>

                    <form id="frm-singup" method="POST" action="{{ route('auth.register', [App::getLocale()]) }}" aria-label="{{ __('auth.Register') }}">
                        @csrf

                        <div class="container-signin-signout-input" style="margin-top: 30px;">

                            <div class="form-group" style="margin-right: 15px;">
                                <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourUsername')">
                            </div>

                            <div class="form-group" style="margin-left: 15px;">
                                <input type="email" class="form-control" name="email" required="" placeholder="@lang('app.yourEmail')">
                            </div>

                        </div>

                        <div class="container-signin-signout-input" style="margin-top: 10px;">
                            <div class="form-group" style="margin-right: 15px;">
                                <input type="password" class="form-control" name="password" required="" placeholder="@lang('app.yourPassword')">
                            </div>

                            <div class="form-group" style="margin-left: 15px;">
                                <input type="password" class="form-control" name="password_confirmation" required="" placeholder="@lang('app.comfirm_pass')">
                            </div>
                        </div>

                        <div style="margin-top: 10px;" class="container-signin-signout-last">
                            <h3 class="color-yellow">@lang('app.privacy')</h3>

                            <span class="h3-middle">
                            <h3 class="color-white" style="margin-right: 5px;">@lang('app.haveAccount')</h3>
                            <h3 class="color-yellow changecontext">@lang('app.singin')</h3>
                        </span>

                            <button type="submit" class="btn btn-yellow">@lang('app.singup')</button>
                        </div>

                    </form>

                </div>
            </div >

            <div id="si" class="container-signin-signout row"  style="display: none">

                <div class="container-signin-signout-aux">
                </div>

                <div class="container-signin-signout-content">

                    <div class="container-signin-signout-button">

                        <button type="button" class="btn btn-yellow" style="margin-right: 15px">
                            <a href="{{Route("auth.redirectToProvider", [App::getLocale(), "facebook"])}}">
                                @lang('app.facebook')
                            </a>
                        </button>

                        <button type="button" class="btn btn-yellow" style="margin-left: 15px">
                            <a href="{{Route("auth.redirectToProvider", [App::getLocale(), "google"])}}">
                                @lang('app.google')
                            </a></button>
                    </div>

                    <form id="frm-singin" method="POST" action="{{ route('dologin', [App::getLocale()]) }}" aria-label="{{ __('auth.Login') }}">
                        @csrf

                        <div class="container-signin-signout-input" style="margin-top: 20px;">

                        </div>

                        <div class="container-signin-signout-input" style="margin-top: 10px;">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="@lang('app.yourEmail')" autofocus="" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group" style="margin-left: 15px;">
                                <input type="password" class="form-control" name="password" required="" placeholder="@lang('app.yourPassword')">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="display: inline">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div style="margin-top: 10px;" class="container-signin-signout-last">
                            <h3 class="color-yellow"><a href="{{ route('password.request') }}">@lang('app.forgotpass')</a></h3>

                            <span class="h3-middle">
                            <h3 class="color-white" style="margin-right: 5px;">@lang('app.nohaveAccount')</h3>
                            <h3 class="color-yellow changecontext" style="cursor: pointer;">@lang('app.singup')</h3>
                        </span>


                            <button type="submit" class="btn btn-yellow">@lang('app.singin')</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    @endguest


    @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
        <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right d-none">Edit
            Post</a>
    @endif

    <h1 class="home-section-3 row justify-content-end">{{$post->title}}</h1>

    <div class="home-section-3 row" style="color: #8e8e8e;">
        <ul class="pagination" role="navigation">
            {{-- Previous Page Link --}}


            @isset ($previous)
                <li><a href="{{Route("blogetc.single", [App::getLocale(), $previous->slug])}}" rel="prev">@lang('pagination.previous') </a></li>
            @else
                <li class="disabled d-none" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @endif
            &nbsp&nbsp
            &nbsp&nbsp
            {{-- Next Page Link --}}
            @isset ($next)
                <li><a href="{{Route("blogetc.single", [App::getLocale(), $next->slug])}}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled d-none" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </div>


    <div class='home-section-3 row no-gutters pt-0'>
        @include("blogetc::partials.show_errors")
        @include("blogetc::partials.full_post_details")
    </div>
    <div class="row">
        @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
            <div class="col" id='maincommentscontainer' style="margin-top: 6rem !important;">
                @include("blogetc::partials.show_comments")
            </div>
        @else
            {{--Comments are disabled--}}
        @endif
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
    <script src="{{ asset('js/views/share.js') }}" defer></script>

@endpush
{{--<script async defer src="//assets.pinterest.com/js/pinit.js"></script>--}}