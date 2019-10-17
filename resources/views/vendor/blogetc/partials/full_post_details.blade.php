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

<div class="col-lg-12" style="display: initial;">
    <?=$post->image_tag("medium", false, 'post-details-image img-fluid d-block pr-4 pb-4', true, null, 'width: 700px;height: 360px;float:left;'); ?>
        <p class="post-details-body">
        {!! $post->post_body_output() !!}
        </p>
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

