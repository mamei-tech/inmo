@extends("blogetc_admin::layouts.admin_layout")
@section("content")

    @forelse ($comments as $comment)

        <div class="card m-4" >
            <div class="card-body">

                <h5 class='card-title'>


                    {{$comment->author()}} @lang('blog.commented_on'):

                    @if($comment->post)
                    <a href='{{$comment->post->url()}}'>{{$comment->post->title}}</a>
                        @else
                        Unknown blog post

                        @endif

                    @lang('blog.on') {{$comment->created_at}} </h5>


                <p class='m-3 p-2'>{{$comment->comment}}</p>




                @if($comment->post)

                    {{--VIEW + EDIT POST LINKS--}}
                    <a href="{{$comment->post->url()}}" class="card-link btn btn-outline-secondary"><i class="fa fa-file-text-o"
                                                                                              aria-hidden="true"></i>
                        @lang('blog.read_more')</a>
                    <a href="{{$comment->post->edit_url()}}" class="card-link btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        @lang('blog.edit_post')</a>


                @endif



                @if(!$comment->approved)
                    {{--APPROVE BUTTON--}}
                    <form method='post' action='{{route("blogetc.admin.comments.approve", [App::getLocale(), $comment->id])}}' class='float-right'>
                        @csrf
                        @method("PATCH")
                        <input type='submit' class='btn btn-success btn-sm' value='Approve'/>
                    </form>
                @endif

                {{--DELETE BUTTON--}}
                <form
                        onsubmit="return confirm('@lang('blog.delete_comment_alert')');"
                        method='post' action='{{route("blogetc.admin.comments.delete", [App::getLocale(),  $comment->id])}}' class='float-right'>
                    @csrf
                    @method("DELETE")
                    <input type='submit' class='btn btn-danger btn-sm' value='@lang('blog.delete')' />
                </form>
            </div>
        </div>


    @empty
        <div class='alert alert-danger'>{{ __('blog.0_comment') }}</div>
    @endforelse

    <div class='text-center'>
        {{-- todo: probar visualmente luego --}}
        {{ $comments->links('vendor.pagination.simple-default') }}
    </div>

@endsection