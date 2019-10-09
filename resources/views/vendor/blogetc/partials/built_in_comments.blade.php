@forelse($comments as $comment)

    <div id="containercomment" class="container-signin-signout row no-gutters" style="padding: 0 120px 10px;">
        <div class="col-2">
            {{--todo: agregar imagen del usuario autenticado--}}
            <img alt="..." class="img-thumbnail rounded-0" src="http://192.168.49.132/images/blog_images/default_medium.png">
        </div>
        <div class="col-2"></div>
        <div class="col-8">
                <div class="card-body p-0" style="color: rgb(136, 136, 136);">
                    <h3 class="card-title" style="color: rgb(136, 136, 136);">{{$comment->author()}}</h3>
                    {!! nl2br(e($comment->comment))!!}
                </div>
        </div>
    </div>

    <div class="card bg-light mb-3 d-none">
        <div class="card-header">
            {{$comment->author()}}

            @if(config("blogetc.comments.ask_for_author_website") && $comment->author_website)
                (<a href='{{$comment->author_website}}' target='_blank' rel='noopener'>website</a>)
            @endif

            <span class="float-right" title='{{$comment->created_at}}'><small>{{$comment->created_at->diffForHumans()}}</small></span>
        </div>
        <div class="card-body bg-white">
            <p class="card-text">{!! nl2br(e($comment->comment))!!}</p>
        </div>
    </div>

@empty
    <div class="d-none"></div>
@endforelse

@if(count($comments)> config("blogetc.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>Only the first {{config("blogetc.comments.max_num_of_comments_to_show",500)}} comments are
            shown.</em>
    </p>
@endif

