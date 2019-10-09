
{{-- SingIN SingUP Forms --}}
<div class="section-sigin-sigout">

    <div class="section-sigin-sigout-text" style="cursor: pointer;" id="section-comments-post">
        <h3 class="color-white">@lang('blog.can_writte_your_coment_here')</h3>

        <div class="arrow-floating">
            <span class="arrow-toggle-line"></span>
        </div>
    </div>

    <div id="containercomment" class="container-signin-signout row no-gutters open"  style="display: none">
        <div class="col-2">
            <img alt="..." class="img-thumbnail rounded-0" src="http://192.168.49.132/images/blog_images/default_medium.png">
        </div>
        <div class="col-2"></div>
        <div class="col-8">
            <form method='post' action='{{route("blogetc.comments.add_new_comment", [App::getLocale(),$post->slug])}}' style="width: 100%;">
                @csrf

                <div class="form-group" style="width: 100%;">
                        <textarea
                                class="form-control rounded-0"
                                name='comment'
                                required
                                id="comment"
                                placeholder="@lang('blog.write_your_comment')"
                                rows="7">{{old("comment")}}</textarea>
                </div>

                @if($captcha)
                    {{--Captcha is enabled. Load the type class, and then include the view as defined in the captcha class --}}
                    @include($captcha->view())
                @endif

                <button type="submit" class="btn btn-yellow" style="margin-bottom: 35px;margin-top: 45px;">
                    @lang('app.send')
                </button>

            </form>
        </div>

    </div>

</div>