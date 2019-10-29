@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>@lang('blog.manage_blog_posts')</h5>

    @forelse($posts as $post)
        <div class="card m-4" style="">
            <div class="card-body">
                <h5 class='card-title'><a href='{{$post->url()}}'>{{$post->title}}</a></h5>
                <h5 class='card-subtitle mb-2 text-muted'>{{$post->subtitle}}</h5>
                <p class="card-text">{{$post->html}}</p>

                <?=$post->image_tag("thumbnail", false, "float-right");?>

                <dl class="">
                    <dt class="">@lang('blog.author')</dt>
                    <dd class="">{{$post->author_string()}}</dd>
                    <dt class="">@lang('blog.posted_at')</dt>
                    <dd class="">{{$post->posted_at}}</dd>
                    <dt class="">@lang('blog.language')</dt>
                    <dd class="">{{$post->lang}}</dd>

                    <dt class="">@lang('blog.is_published')</dt>
                    <dd class="">

                        {!!($post->is_published ? "Yes" : '<span class="border border-danger rounded p-1">No</span>')!!}

                    </dd>
                </dl>

                <a href="{{$post->url()}}" class="card-link btn btn-outline-secondary"><i class="fa fa-file-text-o"
                                                                                          aria-hidden="true"></i>
                    @lang('blog.read_more')</a>
                <a href="{{$post->edit_url()}}" class="card-link btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    @lang('blog.edit_post')</a>
                <form onsubmit="return confirm('Are you sure you want to delete this blog post?\n You cannot undo this action!');"
                      method='post' action='{{route("blogetc.admin.destroy_post", [App::getLocale(), $post->id])}}' class='float-right'>
                    @csrf
                    <input name="_method" type="hidden" value="DELETE"/>
                    <button type='submit' class='btn btn-danger btn-sm'>
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        @lang('blog.delete')
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class='alert alert-warning'>@lang('blog.alert_no_posts')</div>
    @endforelse


@endsection