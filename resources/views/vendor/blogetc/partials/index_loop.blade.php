{{--Used on the index page (so shows a small summary--}}
{{--See the guide on webdevetc.com for how to copy these files to your /resources/views/ directory--}}
{{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}

<div class="col-xl-3 col-md-6 col-sm-12">
<div class="card" style="background-color: rgb(228, 228, 228);border: none;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-title" style="margin-top: .75rem;"><div style="float: left;width: 50%;">(6) comments</div><div style="float: inline-end;">25/04/2019</div></div>

    <div class="card-body" style="padding: 0px;">
        <h5 class="card-title text-uppercase">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <div class="card-footer" style="background-color: transparent;border-top: none;text-align: center;">
        <a href="#" class="btn text-uppercase" style="border: rgb(225, 175, 90) solid 3px;color: rgb(225, 175, 90) !important;">READ MORE</a>
    </div>
</div>
</div>

<div class="" style='display: none;max-width:600px; margin: 50px auto; background: #fffbea;border-radius:3px;padding:0;' >

    <div class='text-center'>
        <?=$post->image_tag("medium", true, ''); ?>
    </div>
    <div style='padding:10px;'>
    <h3 class=''><a href='{{$post->url()}}'>{{$post->title}}</a></h3>
    <h5 class=''>{{$post->subtitle}}</h5>

    <p>{!! $post->generate_introduction(400) !!}</p>

    <div class='text-center'>
        <a href="{{$post->url()}}" class="btn btn-primary">View Post</a>
    </div>
        </div>
</div>
