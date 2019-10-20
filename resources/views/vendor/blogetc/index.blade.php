@extends("layouts.app")

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush

@php
    $inBlog = true;
@endphp

@section('mainclass', 'blogindex')


@section("content")

    @include("blogetc::partials.search_section")

    @php isset($dr) ? $dr = 1 : $dr = 0 @endphp
    <input id="dr" type="text" hidden value="{{$dr}}">

    @guest
        @include("blogetc::partials.section_login")
    @endguest

    @auth
        @include("blogetc::partials.section_logout")
    @endauth


    <div class="blog-section-3 row no-gutters">
        <div class="col pb-0 mb-0 pr-0" style="align-items: end">
        <nav class="nav-breadcrumb" aria-label="breadcrumb" style="background: transparent;">
            <ol class="breadcrumb row no-gutters" style="background: transparent;margin-bottom: 0rem;padding: .75rem 0rem;">
                <li class="hvr-underline-from-center @isset($mostpopular_active) {{ $mostpopular_active }} @endisset"><a href="{{Route("blogetc.mostpopular", [App::getLocale()])}}"><h1>most popular</h1></a></li>
                <li class="hvr-underline-from-center breadcrumb-slash"><h1 style="margin: 0 6px 0 6px;">/</h1></li>
                <li class="hvr-underline-from-center @isset($lastpub_active) {{ $lastpub_active }} @endisset"><a href="{{Route("blogetc.lastpublications", [App::getLocale()])}}"><h1>last publications</h1></a></li>
                <li class="hvr-underline-from-center breadcrumb-slash"><h1 style="margin: 0 6px 0 6px;">/</h1></li>
                <li class="hvr-underline-from-center @isset($allpub_active) {{ $allpub_active }} @endisset" aria-current="page"><a href="{{Route("blog", [App::getLocale()])}}"><h1>all publications</h1></a></li>
            </ol>
        </nav>
        </div>
    </div>


    @if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="blog-section-3 row no-gutters">
        <div class="col-8 mb-0 pb-0" style="color: #8e8e8e;align-items: initial;">
            {{ $posts->links('vendor.pagination.simple-default') }}
        </div>
        <div class="col-4 mb-0 pb-0 pr-0" style="align-items: flex-end;color: #8e8e8e;">
            {{$posts->total()}} @lang('pagination.found')
        </div>
    </div>
    @endif
    {{-- POST BLOCK --}}
    <div class='blog-section-4 pt-0'>
        <div class="row text-left" style="align-items: unset;">
        @forelse($posts as $post)
            @include("blogetc::partials.index_loop")
        @empty
            <div class='alert alert-danger'>No posts</div>
        @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
@endpush