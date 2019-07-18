@extends('layouts.app')

@section('title', __('app.blog'))

@push('styles')
    {{--<link href="{{ asset('css/blog.css') }}" rel="stylesheet"></link>--}}
@endpush
@php
    $inBlog = true;
@endphp
@section('content')

@endsection

@push('scripts')
    {{--<script src="{{ asset('js/views/guides.js') }}" defer></script>--}}
@endpush