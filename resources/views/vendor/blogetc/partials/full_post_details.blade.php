@if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
        Post</a>
@endif

<h1 style="text-align: right;padding: 50px 0px 50px 0;">{{$post->title}}</h1>

<div class="row col col-lg-6" style="color: #8e8e8e;">
    <ul class="pagination singlepost" role="navigation">
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
                <h3 style="margin-top: 1rem;color: rgb(136, 136, 136);"><b class="text-capitalize">WRITTEN BY: Kmilo Denis</b></h3>
                <h3 style="color: rgb(136, 136, 136);"><strong>{{ humanize_date($post->posted_at, "M / Y") }}</strong></h3>
            </footer>
        </div>
    </div>
</article>

@includeWhen($post->author,"blogetc::partials.author",['post'=>$post])
@includeWhen($post->categories,"blogetc::partials.categories",['post'=>$post])
