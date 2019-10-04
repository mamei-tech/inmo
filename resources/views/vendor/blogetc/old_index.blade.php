@extends("layouts.app")

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush

@php
    $inBlog = true;
@endphp

@section("content")

    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

    <div class="section-search">
        <h1>@lang('app.blog')</h1>

        <div class="search-advance">
            <h3 class="color-gray">@lang('app.advance_search')</h3>
            @include("blogetc::sitewide.search_form")
        </div>
    </div>

    @php isset($dr) ? $dr = 1 : $dr = 0 @endphp
    <input id="dr" type="text" hidden value="{{$dr}}">

    {{-- SingIN SingUP Forms --}}
    @guest
        <div class="section-sigin-sigout">

            <div class="section-sigin-sigout-text" style="cursor: pointer;">
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


    {{-- POST BLOCK --}}
    <div class='row'>
        <div class='col-sm-12 blogetc_container'>
            @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
                <div class="text-center">
                    <p class='mb-1'>You are logged in as a blog admin user.
                        <br>

                        <a href='{{route("blogetc.admin.index")}}' class='btn border  btn-outline-primary btn-sm '>
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Go To Blog Admin Panel</a>
                    </p>
                </div>
            @endif


            {{--TODO: see later--}}
            @if(isset($blogetc_category) && $blogetc_category)
                <h2 class='text-center'>Viewing Category: {{$blogetc_category->category_name}}</h2>

                @if($blogetc_category->category_description)
                    <p class='text-center'>{{$blogetc_category->category_description}}</p>
                @endif

            @endif


            @forelse($posts as $post)
                @include("blogetc::partials.index_loop")
            @empty
                <div class='alert alert-danger'>No posts</div>
            @endforelse

            <div class='text-center  col-sm-4 mx-auto'>
                {{$posts->appends( [] )->links()}}
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
@endpush