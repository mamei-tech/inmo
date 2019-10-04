{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

@php
    $comments_count = $post->comments->count();
@endphp

<div class="col-xl-3 col-md-6 col-sm-12 pr-0">
    <div class="card color-gray" style="background-color: rgb(228, 228, 228);border: none;">
        <?=$post->image_tag("medium", false, "card-img-top", true, null, "width: 269px;height: 179px;");?>
        <div class="card-title" style="margin-top: .75rem;">
            <div style="float: left;width: 50%;">({{ $comments_count }}) {!!($comments_count ? "comments" : "comments")!!}</div>
            <div style="float: inline-end;">{{ humanize_date($post->posted_at, "d/m/Y") }}</div></div>
        <div class="card-body" style="padding: 0px;">
            <h5 class="card-title text-uppercase">{{$post->title}}</h5>
            <p class="card-text" style="height: 180px;">{!! $post->generate_introduction(200) !!}</p>
        </div>
        <div class="card-footer" style="background-color: transparent;border-top: none;text-align: center;">
            <a href="#" class="btn text-uppercase" style="border: rgb(225, 175, 90) solid 3px;color: rgb(225, 175, 90) !important;">READ MORE</a>
        </div>
    </div>
</div>

