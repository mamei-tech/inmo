@if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
        Post</a>
@endif

<h1 style="text-align: right;padding: 50px 0px 50px 0;">{{$post->title}}</h1>

<div class="row col col-lg-6" style="color: #8e8e8e;">
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
<article class="row single-post no-gutters">
    <div class="" style="width: 100%;">
        <div class="image-wrapper float-left pr-3" style="">
            <?=$post->image_tag("medium", false, 'd-block mx-auto'); ?>
        </div>
        <div class="single-post-content-wrapper color-gray" style="">
            {!! $post->post_body_output() !!}
            <footer style="text-align: right;">
                @includeWhen($post->author,"blogetc::partials.author",['post'=>$post])
                <div class="row">
                    <div class="col">
                        <h3 style="color: rgb(136, 136, 136);"><strong>{{ humanize_date($post->posted_at, "M / Y") }}</strong></h3>
                    </div>
                </div>

                <div class="row social-media" style="margin-top: 3rem;">
                    <div class="col">
                        <a href="{{$profile->link_facebook}}">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 15px;margin-top:5px;margin-right: 15px;" viewBox="0 0 11 26">
                                <title>Facebook</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Capa_1-2" data-name="Capa 1">
                                        <path class="cls-1" d="M11.15,7.84,10.72,12H7.42v12h-5V12H0V7.84H2.47V5.36C2.47,2,3.86,0,7.83,0h3.3V4.13H9.06c-1.54,0-1.64.58-1.64,1.66V7.84Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{$profile->link_instagram}}">
                            <svg id="Logo_FIXED" data-name="Logo — FIXED" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;margin-top:5px;margin-right: 15px;" viewBox="60 90 280 200">
                                <title>Twitter_Logo_Blue</title>
                                <path class="cls-2" d="M153.62,301.59c94.34,0,145.94-78.16,145.94-145.94,0-2.22,0-4.43-.15-6.63A104.36,104.36,0,0,0,325,122.47a102.38,102.38,0,0,1-29.46,8.07,51.47,51.47,0,0,0,22.55-28.37,102.79,102.79,0,0,1-32.57,12.45,51.34,51.34,0,0,0-87.41,46.78A145.62,145.62,0,0,1,92.4,107.81a51.33,51.33,0,0,0,15.88,68.47A50.91,50.91,0,0,1,85,169.86c0,.21,0,.43,0,.65a51.31,51.31,0,0,0,41.15,50.28,51.21,51.21,0,0,1-23.16.88,51.35,51.35,0,0,0,47.92,35.62,102.92,102.92,0,0,1-63.7,22A104.41,104.41,0,0,1,75,278.55a145.21,145.21,0,0,0,78.62,23"></path>
                            </svg>
                        </a>
                        <a href="{{$profile->link_in}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 26" style="height: 30px;width: 30px;margin-top:5px;margin-right: 15px;">
                                <title>Linkedin</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Capa_1-2" data-name="Capa 1">
                                        <path class="cls-1" d="M.3,7.8H5.45V24H.3ZM2.91,0A2.74,2.74,0,0,0,0,2.8a2.72,2.72,0,0,0,2.84,2.8h0A2.73,2.73,0,0,0,5.78,2.8,2.72,2.72,0,0,0,2.91,0ZM18.08,7.42a5.05,5.05,0,0,0-4.64,2.68V7.8H8.3s.06,1.52,0,16.2h5.14V15a4.28,4.28,0,0,1,.17-1.32,2.83,2.83,0,0,1,2.64-2c1.86,0,2.61,1.49,2.61,3.66V24H24V14.71C24,9.74,21.47,7.42,18.08,7.42Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>

                    </div>

                    <div class="col-md-auto">
                        <button class="btn btn-yellow"><a href="{{ route('contacts') }}">@lang('app.contactMe')</a>
                        </button>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</article>

@includeWhen($post->categories,"blogetc::partials.categories",['post'=>$post])
