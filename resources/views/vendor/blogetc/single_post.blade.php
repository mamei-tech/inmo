@extends("layouts.app")

@section('title', __('app.blog'))

@push('styles')
    <link href="{{ asset('css/contacts.css') }}" rel="stylesheet"/>
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

    @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
        <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right d-none">Edit
            Post</a>
    @endif

    <h1 class="blog-section-3 row no-gutters justify-content-end">{{$post->title}}</h1>

    <div class="blog-section-3 row no-gutters">
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


    <div class='blog-section-3 row no-gutters pt-0'>
        @include("blogetc::partials.show_errors")
        @include("blogetc::partials.full_post_details")
    </div>

    @if(\Auth::check())
        @include("blogetc::partials.add_comment_form")
    @endif

    <div class="contact-section-testimonials" style="background: #e4e4e4;">
        @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
            {{--<div class="col" id='maincommentscontainer' style="margin-top: 6rem !important;">--}}
            @include("blogetc::partials.show_comments")
        @else
            {{--Comments are disabled--}}
        @endif
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
    <script src="{{ asset('js/views/share.js') }}" defer></script>

@endpush
{{--<script async defer src="//assets.pinterest.com/js/pinit.js"></script>--}}