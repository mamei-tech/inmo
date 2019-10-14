@forelse($comments as $comment)
    <div class="testmonials-item">
        <div class="testmonials-item-img">
            {{--todo: agregar imagen del usuario autenticado--}}
            {{--<img class="img-thumbnail rounded-0" src="{{ $comment->user->avatar }}">--}}
            <img alt="..." class="img-thumbnail rounded-0" src="http://192.168.49.132/images/blog_images/default_medium.png">
        </div>

        <div class="testmonials-item-body">
            <h3 class="color-gray">{{$comment->author()}}</h3>
            <p class="color-gray" style="column-fill: unset;column-gap: unset;">{{ $comment->comment }}</p>
        </div>
    </div>
@empty
    <div class='alert'>not comments</div>
@endforelse

@if(count($comments)> config("blogetc.comments.max_num_of_comments_to_show", 500) - 1)
    <p><em>Only the first {{config("blogetc.comments.max_num_of_comments_to_show", 500)}} comments are shown.</em>
    </p>
@endif

