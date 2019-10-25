{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

@php
    $comments_count = $post->comments->count();
@endphp


    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 color-gray" style="background: transparent;border: none;">
            <?=$post->image_tag("medium", false, "card-img-top", true, null, "max-width: 460px;height: 190px;border-radius: unset;");?>
            <div class="card-title" style="margin-top: .75rem;">
                <div style="float: left;width: 50%;">({{ $comments_count }}) {!!($comments_count ? "comments" : "comments")!!}</div>
                <div style="float: right;">{{ humanize_date($post->posted_at, "m/d/Y") }}</div>
            </div>
            <div class="card-body" style="padding: 0;">
                <h4 class="card-title text-uppercase color-gray">{{$post->title}}</h4>
                <p class="card-text">{!! $post->generate_introduction(200) !!}</p>
            </div>
            <div class="card-footer" style="background-color: transparent;border-top: none;text-align: center;">
                <a href="{{$post->url()}}" class="btn text-uppercase" style="border: rgb(225, 175, 90) solid 3px;color: rgb(225, 175, 90) !important;">@lang('blog.read_more')</a>
            </div>
        </div>
    </div>
