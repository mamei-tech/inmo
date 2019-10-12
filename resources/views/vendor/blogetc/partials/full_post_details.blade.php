@php
    $summary = $post->generate_introduction(150)
@endphp

@push('blogmeta')
    <meta property="og:url"                content="https://jehidalgorealestate.com/" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{$post->title}}" />
    <meta property="og:description"        content="{{$summary}}" />
    <meta property="og:image"              content="{{$post->image_url()}}" />
    <meta property="og:locale"             content="{{App::getLocale()}}" />
@endpush


@if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right d-none">Edit
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

                {{-- Sharing code --}}
                @include('partials.share', [
                    'url'       => urlencode('https://jehidalgorealestate.com/'),
                    'title'     => urlencode($post->title),
                    'summary'   => urlencode($summary),
                    'image'     => urlencode($post->image_url())
                ])
            </footer>
        </div>
    </div>
</article>

@includeWhen($post->categories,"blogetc::partials.categories",['post'=>$post])


<div id="sharebymail_modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div id="frst_modal_child" class="modal-dialog" role="document" style="width: 500px">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title color-gray">@lang('app.send_email')</h2>
                <button id="btnClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form-send-mail" action="mailto:" enctype="text/plain" method="GET">
                    @csrf

                    <div class="form-group form-add-testimonials-name">
                        <input type="email" class="form-control" id="mail_input" name="mail_input" required="" placeholder="@lang('app.to_email')" value="">
                    </div>

                    <div class="form-group form-add-testimonials-name">
                        <input type="text" class="form-control" id="mail_subject" name="subject" required="" placeholder="@lang('app.subject')" value="">
                    </div>

                    <div class="form-group">
                        <textarea rows="5" class="form-control" id="mail_textarea" name="body" required="" placeholder=""></textarea>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>

            <div class="modal-footer" style="justify-content: center;">
                <button id="mail_btnCancel" type="button" class="btn btn-yellow" data-dismiss="modal">@lang('app.cancel')</button>
                <button id="mail_btnSend" type="button" class="btn btn-yellow">@lang('app.send')</button>
            </div>
        </div>
    </div>
</div>

