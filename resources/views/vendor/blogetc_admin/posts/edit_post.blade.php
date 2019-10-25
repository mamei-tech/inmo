@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>@lang('blog.editing_post')
        <a target='_blank' href='{{$post->url()}}' class='float-right btn btn-primary'>@lang('blog.view_post')</a>
    </h5>

    <form method='post' action='{{route("blogetc.admin.update_post", [App::getLocale(),$post->id])}}'  enctype="multipart/form-data" >

        @csrf
        @method("patch")
        @include("blogetc_admin::posts.form", ['post' => $post])

        <input type='submit' class='btn btn-primary' value='Save Changes' >

    </form>

@endsection