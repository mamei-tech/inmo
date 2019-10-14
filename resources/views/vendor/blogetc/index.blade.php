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


    <div class="home-section-3 row">
        <div class="col pb-0 mb-0 pr-0" style="align-items: end">
        <nav aria-label="breadcrumb" style="background: transparent;">
            <ol class="breadcrumb row" style="background: transparent;margin-bottom: 0rem;padding: .75rem 0rem;">
                <li class="hvr-underline-from-center"><a href="{{Route("blogetc.mostpopular", [App::getLocale()])}}"><h1>most popular</h1></a></li>
                <li class="hvr-underline-from-center"><h1 style="margin: 0 6px 0 6px;">/</h1></li>
                <li class="hvr-underline-from-center"><a href="{{Route("blog", [App::getLocale()])}}"><h1>last publications</h1></a></li>
                <li class="hvr-underline-from-center"><h1 style="margin: 0 6px 0 6px;">/</h1></li>
                <li class="hvr-underline-from-center active" aria-current="page"><a href="{{Route("blog", [App::getLocale()])}}"><h1>all publications</h1></a></li>
            </ol>
        </nav>
        </div>
    </div>

    <div class="home-section-3 row">
        <div class="col-8 mb-0 pb-0" style="color: #8e8e8e;align-items: initial;">
            {{ $posts->links('vendor.pagination.simple-default') }}
        </div>
        <div class="col-4 mb-0 pb-0 pr-0" style="align-items: flex-end;color: #8e8e8e;">
            {{$posts->total()}} @lang('pagination.found')
        </div>
    </div>
    {{-- POST BLOCK --}}
    <div class='home-section-4 postsection pt-0'>
        <div class="row pb-4">
        @forelse($posts as $post)
            @include("blogetc::partials.index_loop")
        @empty
            <div class='alert alert-danger'>No posts</div>
        @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
@endpush