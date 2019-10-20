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
        <div class="col-8 mb-0 pb-0" style="color: #8e8e8e;align-items: initial;">
            @if ($search_results->hasPages())
                <ul class="pagination" role="navigation">
                    {{-- Previous Page Link --}}
                    @if ($search_results->onFirstPage())
                        <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
                    @else
                        <li><a href="{{ $search_results->appends(['s'=>$query])->previousPageUrl() }}" rel="prev">@lang('pagination.previous') </a></li>
                    @endif

                    <li> &nbsp{{ $search_results->currentPage() }}/{{ $search_results->lastPage() }}&nbsp </li>
                    {{-- Next Page Link --}}
                    @if ($search_results->hasMorePages())
                        <li><a href="{{ $search_results->appends(['s'=>$query])->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
                    @else
                        <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
                    @endif
                </ul>
            @endif
        </div>
        <div class="col-4 mb-0 pb-0" style="align-items: flex-end;color: #8e8e8e;">
            {{$search_results->total()}} @lang('pagination.found')
        </div>
    </div>

    <div class='blog-section-4 pt-0'>
        <div class="row text-left" style="align-items: unset;">
            @forelse($search_results as $result)

                <?php $post = $result->indexable; ?>
                @if($post && is_a($post,\WebDevEtc\BlogEtc\Models\BlogEtcPost::class))
                    @include("blogetc::partials.index_loop")
                @else
                    <div class='alert alert-danger'>Unable to show this search result - unknown type</div>
                @endif
            @empty
                <div class='alert alert-danger d-none'>@lang('blog.sorry_but_there_were_no_results')</div>
            @endforelse
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/views/blog.js') }}" defer></script>
@endpush