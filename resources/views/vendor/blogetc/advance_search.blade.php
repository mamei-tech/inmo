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
    <div class="row" style="padding: 50px 120px;justify-content: end;">
        <h1 style="">
            @lang('app.advance_search')
        </h1>
    </div>
    <div class='row' style="padding: 1px 120px 70px;">
        <div id="accordion" style="min-width: 100%;">
            <div class="card" v-for="(item, index) in postComputed" v-bind:key="item.year">
                <div class="card-header" v-bind:id="'headingAccordionParent'+index" style="background: #8c8c8c;border-radius: 0 !important;padding: .95rem 1.25rem;">
                    <h1 class="" data-toggle="collapse" v-bind:data-target="'#collapseAccordionParent'+index" style="float: right;color: white;border: none;cursor: pointer;">
                        @{{ item.year }}
                    </h1>
                </div>

                <div v-bind:id="'collapseAccordionParent'+index" class="collapse" v-bind:class="{ 'show': yearselected === item.year }" data-parent="#accordion">
                    <div class="card-body" style="background: #e4e4e4;padding: 1.25rem 0 1.25rem 0;">
                        <div id="sub-accordion">
                            <div class="card" v-for="(post, subindex) in item.value" v-bind:key="post.id" style="border-radius: 0;color: darkgray;font-weight: bold;">
                                <div class="card-header row no-gutters" v-bind:id="'headingSubAccordion'+subindex" style="border-radius: 0 !important;padding: 6px 0 0 10px;border: 0;" v-bind:style="subindex % 2 ? 'background: #e4e4e4;' : 'background: #fbfbfb;'">
                                    <div class="col-8">
                                        <h3 class="font-weight-bold" style="color: grey;">titulo a mostrar aunque sea bien largo como este</h3>
                                    </div>
                                    <div class="col-2">
                                        (@{{ post.count_comments }}) comments
                                    </div>
                                    <div class="col">
                                        @{{ post.posted_at }}
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-no-hover collapsed" data-toggle="collapse" v-bind:data-target="'#collapseSubAccordion'+subindex" style="float: right;color: white;border: none;">
                                            Post #1
                                        </button>
                                    </div>
                                </div>
                                <div v-bind:id="'collapseSubAccordion'+subindex" class="collapse" data-parent="#sub-accordion">
                                    <div class="card-body" style="background: #e4e4e4;padding: 1.25rem 0 1.25rem 0;">
                                        @{{ post.post_body }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/lodash.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/views/blog.js') }}"></script>

    <script type="text/javascript">
        let debug = true;
        let BASE_URL =  "{{ env('APP_URL')  }}";

        // $(document).ready(function() {
        //    console.log('ssss')
        // });

        // blogindex
        let app = new Vue({
            el: '#accordion',
            data: {
                publicPath: BASE_URL,
                posts: {},
                yearselected: null,
            },

            methods: {
                showPostsByYearRequest: function (year = null) {
                    const url = this.publicPath + '/api/v1/advance_search/allpostbyyear';
                    const vm = this;
                    axios
                        .post(url, year)
                        .then(response => {
                            vm.posts        = response.data.data.posts;
                            vm.yearselected = response.data.data.year_selected;
                    })
                .catch(error => {})
                },

                showSubAccordion: function () {
                  return this.yearselected
                },
            },

            computed: {
                postComputed: function () {
                    return _.orderBy(this.posts, ['year'], ['desc']);
                },
            },

            created: function () {
                if (debug) console.debug('-- hook created triggered in advancesearch--');
            },

            mounted: function () {
                if (debug) console.debug('-- hook mounted triggered in advancesearch--');
                this.showPostsByYearRequest()
            }
        });

        window.app = app;
    </script>
@endpush