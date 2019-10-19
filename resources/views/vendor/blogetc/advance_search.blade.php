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

    @guest
        @include("blogetc::partials.section_login")
    @endguest

    <div class="row no-gutters" style="padding: 50px 120px;justify-content: end;">
        <h1 style="">
            @lang('app.advance_search')
        </h1>
    </div>
    <div class='row no-gutters advancesearch'>
        <div id="accordion" style="min-width: 100%;">
            <div class="card" v-for="(item, index) in postComputed" v-bind:key="item.year">
                <div class="card-header" v-bind:id="'headingAccordionParent'+index" style="background: #8c8c8c;border-radius: 0 !important;padding: .95rem 1.25rem;">
                    <div class="row">
                        <h1 class="col text-right" style="color: #e4e4e4;">
                            @{{ item.year }}
                        </h1>
                        <button class="btn btn-no-hover col-auto" data-toggle="collapse"
                                v-bind:data-target="'#collapseAccordionParent'+index"
                                style="float: right;color: white;border: none;cursor: pointer;"
                                v-on:click="changeYear(item.year)"
                        >
                            <a :class="yearselected === item.year ? 'fa fa-angle-down fa-2x' : 'fa fa-angle-up fa-2x'" style="color: rgb(225, 175, 90);"></a>
                        </button>
                    </div>
                </div>

                <div v-bind:id="'collapseAccordionParent'+index" class="collapse" v-bind:class="{ 'show': yearselected === item.year }" data-parent="#accordion">
                    <div class="card-body" style="background: #e4e4e4;padding: 1.25rem 0 1.25rem 0;">
                        <div id="sub-accordion" v-if="item.value.length">
                            <div class="card" v-for="(post, subindex) in item.value" v-bind:key="post.id" style="border-radius: 0;color: darkgray;font-weight: bold;">
                                <div class="card-header row no-gutters" v-bind:id="'headingSubAccordion'+subindex" style="border-radius: 0 !important;padding: 6px 0 0 10px;border: 0;" v-bind:style="subindex % 2 ? 'background: #e4e4e4;' : 'background: #fbfbfb;'">
                                    <div class="col-8">
                                        <h3 style="color: grey;">@{{ post.title }}</h3>
                                    </div>
                                    <div class="col-2 text-lowercase" style="min-width: 100px;">
                                        (@{{ post.count_comments }}) @lang('blog.comments')
                                    </div>
                                    <div class="col">
                                        @{{ post.posted_at }}
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-no-hover collapsed" data-toggle="collapse"
                                                style="float: right;color: white;border: none;background: inherit;padding: 0px;"
                                                v-bind:data-target="'#collapseSubAccordion'+subindex"
                                                v-on:click="selectPost(post)"
                                        >
                                            <a :class="postselected_id === post.id ? 'fa fa-caret-down fa-2x' : 'fa fa-caret-up fa-2x'" style="color: rgb(225, 175, 90);"></a>
                                        </button>
                                    </div>
                                    <div class="col-auto pr-4"></div>
                                </div>
                                <div v-bind:id="'collapseSubAccordion'+subindex" class="search-advance-section collapse" data-parent="#sub-accordion" :style="subindex % 2 ? 'background: #e4e4e4;' : 'background: #fbfbfb;'">

                                    <div class="search-advance-item" :style="subindex % 2 ? 'background: #e4e4e4;' : 'background: #fbfbfb;'">
                                        <div class="search-advance-item-img">
                                            <img alt="..." class="img-thumbnail rounded-0" :src="post.image_medium" style="border: none;height: 200px;width: 360px;">
                                        </div>

                                        <div class="search-advance-item-body" :style="subindex % 2 ? 'background: #e4e4e4;' : 'background: #fbfbfb;'">
                                            <p v-html="post.post_body" class="color-gray" style="column-fill: unset;column-gap: unset;"></p>
                                            <div class="card-footer" style="background-color: transparent;border-top: none;text-align: right;padding: 20px 0 20px 0;">
                                                <a :href="post.url" class="btn text-uppercase" style="border: rgb(225, 175, 90) solid 3px;color: rgb(225, 175, 90) !important;">@lang('blog.read_more')</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <p v-else>@lang('blog.sorry_but_there_were_no_results')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/vue.min.js') }}"></script>
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
                postselected_id: null,
            },

            methods: {
                showPostsByYearRequest: function (postdata = null) {
                    const url = this.publicPath + '/api/v1/advance_search/allpostbyyear';
                    const vm = this;
                    axios
                        .post(url, postdata)
                        .then(response => {
                            vm.posts        = response.data.data.posts;
                            vm.yearselected = response.data.data.year_selected;
                    })
                .catch(error => {})
                },

                showSubAccordion: function () {
                  return this.yearselected
                },

                selectPost: function (post) {
                    this.postselected_id = post.id;
                },

                changeYear: function (year) {
                    this.showPostsByYearRequest({"year":year})
                },
            },

            computed: {
                postComputed: function () {
                    return _.orderBy(this.posts, ['year'], ['desc']);
                },
            },

            created: function () {
                // if (debug) console.debug('-- hook created triggered in advancesearch--');
            },

            mounted: function () {
                // if (debug) console.debug('-- hook mounted triggered in advancesearch--');
                this.showPostsByYearRequest()
            }
        });

        window.app = app;
    </script>
@endpush