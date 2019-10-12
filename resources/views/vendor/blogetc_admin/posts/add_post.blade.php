@extends("blogetc_admin::layouts.admin_layout")
@section("content")


    <h5>@lang('blog.admin') - @lang('blog.add_post')</h5>

    <form method='post' action='{{route("blogetc.admin.store_post", [App::getLocale()])}}'  enctype="multipart/form-data" >

        @csrf
        @include("blogetc_admin::posts.form", ['post' => new \WebDevEtc\BlogEtc\Models\BlogEtcPost()])

        <input type='submit' class='btn btn-primary' value=@lang('blog.add_post') >

    </form>

@endsection