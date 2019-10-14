
{{-- SingIN SingUP Forms --}}
<div class="section-sigin-sigout">

    <div class="section-sigin-sigout-text" style="cursor: pointer;" id="section-comments-post">
        <h3 class="color-white">@lang('blog.can_writte_your_coment_here')</h3>

        <div class="arrow-floating">
            <span class="arrow-toggle-line"></span>
        </div>
    </div>

    <div id="containercomment" class="contact-section-add-testimonials pb-4" style="background-color: transparent;padding: 0;">
    <div>
        <div class="pt-4" style="position: relative">
            {{--todo: agregar imagen del usuario autenticado--}}
            <img alt="..." class="img-thumbnail rounded-0" src="http://192.168.49.132/images/blog_images/default_medium.png">
        </div>

        <div class="container-form">
            <form id="form-send-testimonials" action="{{route("blogetc.comments.add_new_comment", [App::getLocale(),$post->slug])}}"
                  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group form-add-testimonials-name d-none"></div>

                <div class="form-group pt-4">
                        <textarea rows="7" class="form-control" name="comment" required="" id="comment"
                                  placeholder="@lang('blog.write_your_comment')" style="border-radius: unset;">{{old("comment")}}</textarea>
                </div>
                <div class="clearfix"> </div>
                <button type="submit" class="btn btn-yellow"  style="margin-top: 15px;">@lang('app.send')</button>
            </form>
        </div>
    </div>
    </div>
</div>