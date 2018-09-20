@extends('layouts.admin')

@section('title', __('app.admin'))

@section('content')

    <div class="container">
        <h3>{{ __('app.config') }}</h3>
        <hr />
        <div class="row">
            <div class="col-md-3 container-btn" >
                <a href="{{ route('config.logo', [App::getLocale()]) }}">
                    <div class="container-btn-links">
                        <span class="fa fa-3x fa-image"></span>
                        <span style="font-size: 20px;">{{ __('app.logo') }}</span>
                    </div>
                </a>

            </div>
            <div class="clearfix"></div>

        </div>

        <br />
        <h3>{{ __('app.manage') }}</h3>
        <hr />
        <div class="row">
            <div class="col-md-3 container-btn">
                <a href="{{ route('promotion.index', [App::getLocale()]) }}">
                    <div class="container-btn-links">
                        <span class="fa fa-3x fa-tags"></span>
                        <span style="font-size: 20px;">{{ __('app.promotion') }}</span>
                    </div>
                </a>
            </div>

            <div class="clearfix"></div>
        </div>

@endsection