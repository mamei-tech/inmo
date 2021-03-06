<div class="form-group">
    <label for="blog_title">@lang('app.title')</label>
    <input type="text" class="form-control" required id="blog_title" aria-describedby="blog_title_help" name='title'
           value="{{old("title",$post->title)}}">
    <small id="blog_title_help" class="form-text text-muted">@lang('blog.the_title_blog_post_description')</small>
</div>

<div class="form-group">
    <label for="blog_subtitle">@lang('app.subtitle')</label>
    <input type="text" class="form-control" id="blog_subtitle" aria-describedby="blog_subtitle_help" name='subtitle'
           value='{{old("subtitle",$post->subtitle)}}'>
    <small id="blog_subtitle_help" class="form-text text-muted">@lang('blog.the_subtitle_blog_post_description')</small>
</div>

<div class="row">
    <div class='col-sm-6 col-md-4'>
        <div class="form-group">
            <label for="blog_change_lang">@lang('blog.language')</label>

            <select name='lang' class='form-control' id='blog_change_lang'
                    aria-describedby='blog_change_language_help'>
                @foreach ($lang_enum as $item)
                    <option @if( $item == $post->lang ) selected='selected' @endif value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
            <small id="blog_change_language_help" class="form-text text-muted">@lang('blog.change_language_description')
            </small>
        </div>
    </div>
</div>
<div class='row'>


    <div class='col-sm-12 col-md-4'>


        <div class="form-group">
            <label for="blog_slug">@lang('blog.post_slug')</label>
            <input type="text" class="form-control" id="blog_slug" aria-describedby="blog_slug_help" name='slug'
                   value="{{old("slug",$post->slug)}}">
            <small id="blog_slug_help" class="form-text text-muted">@lang('blog.the_slug_description') {{route("blogetc.single", [App::getLocale(), ""])}}/<u><em>this_part</em></u></small>
        </div>

    </div>
    <div class='col-sm-6 col-md-4'>


        <div class="form-group">
            <label for="blog_is_published">@lang('blog.is_published')</label>

            <select name='is_published' class='form-control' id='blog_is_published'
                    aria-describedby='blog_is_published_help'>

                <option @if(old("is_published",$post->is_published) == '1') selected='selected' @endif value='1'>
                    @lang('blog.published')
                </option>
                <option @if(old("is_published",$post->is_published) == '0') selected='selected' @endif value='0'>
                    @lang('blog.not_published')
                </option>

            </select>
            <small id="blog_is_published_help" class="form-text text-muted">@lang('blog.is_published_description')
            </small>
        </div>

    </div>
    <div class='col-sm-6 col-md-4'>

        <div class="form-group">
            <label for="blog_posted_at">@lang('blog.posted_at')</label>
            <input type="text" class="form-control" id="blog_posted_at" aria-describedby="blog_posted_at_help"
                   name='posted_at'
                   value="{{old("posted_at",$post->posted_at ?? \Carbon\Carbon::now())}}">
            <small id="blog_posted_at_help" class="form-text text-muted">When this should be published. If this value is
                greater
                than now ({{\Carbon\Carbon::now()}}) then it will not (yet) appear on your blog. Should be in the <code>YYYY-MM-DD
                    HH:MM:SS</code> format.
            </small>
        </div>


    </div>
</div>


<div class="form-group">
    <label for="blog_post_body">@lang('blog.post_body')
        @if(config("blogetc.echo_html"))
            (HTML)
        @else
         (Html will be escaped)
        @endif

    </label>
    <textarea style='min-height:600px;' class="form-control" id="blog_post_body" aria-describedby="blog_post_body_help"
              name='post_body'>{{old("post_body",$post->post_body)}}</textarea>


    <div class='alert alert-danger'>
        @lang('blog.body_description')
    </div>
</div>




@if(config("blogetc.use_custom_view_files",true))
    <div class="form-group">
        <label for="blog_use_view_file">Custom View File</label>
        <input type="text" class="form-control" id="blog_use_view_file" aria-describedby="blog_use_view_file_help"
               name='use_view_file'
               value='{{old("use_view_file",$post->use_view_file)}}'>
        <small id="blog_use_view_file_help" class="form-text text-muted">Optional - if anything is entered here, then it
            will attempt to load <code>view("custom_blog_posts." . $use_view_file)</code>. You must create the file in
            /resources/views/custom_blog_posts/FILENAME.blade.php.
        </small>
    </div>
@endif



<div class="form-group">
    <label for="blog_seo_title">SEO: {{"<title>"}} tag (optional)</label>
    <input class="form-control" id="blog_seo_title" aria-describedby="blog_seo_title_help"
              name='seo_title' tyoe='text' value='{{old("seo_title",$post->seo_title)}}' >
    <small id="blog_seo_title_help" class="form-text text-muted">@lang('blog.seo_title_tag')</small>
</div>

<div class="form-group">
    <label for="blog_meta_desc">Meta Desc (optional)</label>
    <textarea class="form-control" id="blog_meta_desc" aria-describedby="blog_meta_desc_help"
              name='meta_desc'>{{old("meta_desc",$post->meta_desc)}}</textarea>
    <small id="blog_meta_desc_help" class="form-text text-muted">@lang('blog.meta_desc_description')</small>
</div>

<div class="form-group">
    <label for="blog_short_description">Short Desc (optional)</label>
    <textarea class="form-control" id="blog_short_description" aria-describedby="blog_short_description_help"
              name='short_description'>{{old("short_description",$post->short_description)}}</textarea>
    <small id="blog_short_description_help" class="form-text text-muted">@lang('blog.short_desc_description')</small>
</div>

@if(config("blogetc.image_upload_enabled",true))

    <div class='bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border'>
        <style>
            .image_upload_other_sizes {
                display: none;
            }
        </style>
        <h4>@lang('blog.featured_images')</h4>


        @foreach(config("blogetc.image_sizes") as $size_key =>$size_info)
            <div class="form-group mb-4 p-2
        @if($loop->iteration>1)
                    image_upload_other_sizes
            @endif
                    ">
                @if($post->has_image($size_info['basic_key']))
                    <div style='max-width:55px;  ' class='float-right m-2'>
                        <a style='cursor: zoom-in;' target='_blank' href='{{$post->image_url($size_info['basic_key'])}}'>
                            <?=$post->image_tag($size_info['basic_key'], false, 'd-block mx-auto img-fluid '); ?>
                        </a>
                    </div>
                @endif

                <label for="blog_{{$size_key}}">Image - {{$size_info['name']}} (optional)</label>
                <small id="blog_{{$size_key}}_help" class="form-text text-muted">Upload {{$size_info['name']}} image -
                    <code>{{$size_info['w']}}&times;{{$size_info['h']}}px</code> - it will
                    get automatically resized if larger
                </small>
                <input class="form-control" type="file" name="{{$size_key}}" id="blog_{{$size_key}}"
                       aria-describedby="blog_{{$size_key}}_help">


            </div>
        @endforeach

        <p>
            @lang('blog.images_resize') <span onclick='$(this).parent().hide(); $(".image_upload_other_sizes").slideDown()'
                                           class='btn btn-light btn-sm'>@lang('blog.show_other_sizes')</span>
        </p>

    </div>
@else
    <div class='alert alert-warning'>Image uploads were disabled in blogetc.php config</div>
@endif
