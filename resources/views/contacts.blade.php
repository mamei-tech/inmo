@extends('layouts.app')

@section('title', __('app.contact'))
@push('head')
    {!! htmlScriptTagJsApi(/* $formId - INVISIBLE version only */) !!}
@endpush
@push('styles')
    <link href="{{ asset('css/cropper.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/contacts.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="contact-section-0 img-parallax">
        <div></div>
        <div>
            <h1>@lang('app.contactMe')</h1>
            <h3>@lang('app.moreInformation')</h3>
            <form id="form-send-contact" action="{{ route('contacts.store', [App::getLocale()]) }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourName')" value="{{$data['name']}}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" required=""
                           placeholder="@lang('app.yourEmail')" value="{{$data['email']}}">
                </div>

                <div class="form-group">
                    <input id="phone-contact" type="tel" class="form-control"
                           name="phone" placeholder="@lang('app.yourPhone')" value="{{$data['phone']}}" required>

                    <span class="invalid-feedback" role="alert" style="text-align: left; color: white; ">
                        <strong>{{ __('app.phone_incorrect') }}</strong>
                    </span>
                </div>

                <div class="form-group">
                    <textarea rows="3" class="form-control" name="text" required=""
                              placeholder="@lang('app.writeMe')">{{$data['text']}}</textarea>
                </div>

                {!! htmlFormSnippet() !!}
                <div class="clearfix"></div>
                <div class="container-social-buttom">
                    <div>
                        <a href="{{$profile->link_facebook}}">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 15px;margin-top:5px;"
                                 viewBox="0 0 11 26">
                                <title>Facebook</title>
                                <g id="Capa_2">
                                    <g id="Capa_1-2">
                                        <path class="cls-1"
                                              d="M11.15,7.84,10.72,12H7.42v12h-5V12H0V7.84H2.47V5.36C2.47,2,3.86,0,7.83,0h3.3V4.13H9.06c-1.54,0-1.64.58-1.64,1.66V7.84Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{$profile->link_instagram}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="7 0 11 25"
                                 style="height: 30px;width: 30px;margin-top:5px;">
                                <title>Instagram</title>
                                <g id="Capa_2">
                                    <g id="Capa_1-2">
                                        <path class="cls-1"
                                              d="M18.3,0H5.63A5.65,5.65,0,0,0,0,5.63V18.3a5.65,5.65,0,0,0,5.63,5.63H18.3a5.65,5.65,0,0,0,5.63-5.63V5.63A5.65,5.65,0,0,0,18.3,0Zm4.22,18.3a4.23,4.23,0,0,1-4.22,4.22H5.63A4.23,4.23,0,0,1,1.41,18.3V9.86H5.92a6.61,6.61,0,0,0-.64,2.82,6.69,6.69,0,0,0,13.38,0A6.61,6.61,0,0,0,18,9.86h4.52Zm-5.28-5.63A5.28,5.28,0,1,1,12,7.39,5.29,5.29,0,0,1,17.25,12.67Zm-.14-4.22a6.6,6.6,0,0,0-10.28,0H1.41V5.63A4.23,4.23,0,0,1,5.63,1.41H18.3a4.23,4.23,0,0,1,4.22,4.22V8.45Zm3.24-4.62V5.66a.77.77,0,0,1-.76.76H17.66a.77.77,0,0,1-.77-.76V3.83a.77.77,0,0,1,.77-.76h1.93A.77.77,0,0,1,20.35,3.83Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{$profile->link_in}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 26"
                                 style="height: 30px;width: 30px;margin-top:5px;">
                                <title>Linkedin</title>
                                <g id="Capa_2">
                                    <g id="Capa_1-2">
                                        <path class="cls-1"
                                              d="M.3,7.8H5.45V24H.3ZM2.91,0A2.74,2.74,0,0,0,0,2.8a2.72,2.72,0,0,0,2.84,2.8h0A2.73,2.73,0,0,0,5.78,2.8,2.72,2.72,0,0,0,2.91,0ZM18.08,7.42a5.05,5.05,0,0,0-4.64,2.68V7.8H8.3s.06,1.52,0,16.2h5.14V15a4.28,4.28,0,0,1,.17-1.32,2.83,2.83,0,0,1,2.64-2c1.86,0,2.61,1.49,2.61,3.66V24H24V14.71C24,9.74,21.47,7.42,18.08,7.42Z"
                                        ></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{$profile->link_youtube}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.16 24.37"
                                 style="height: 30px;width: 30px;margin-top:5px;">
                                <title>Youtube</title>
                                <g id="Capa_2">
                                    <g id="Capa_1-2">
                                        <path class="cls-1"
                                              d="M9.79,9.21a1.68,1.68,0,0,0,1.44-.69,2.68,2.68,0,0,0,.38-1.61V4.53a2.63,2.63,0,0,0-.38-1.59,1.69,1.69,0,0,0-1.44-.69,1.66,1.66,0,0,0-1.43.69A2.64,2.64,0,0,0,8,4.53V6.91a2.71,2.71,0,0,0,.38,1.61A1.66,1.66,0,0,0,9.79,9.21ZM9.21,4.28c0-.63.19-.94.59-.94s.59.31.59.94V7.14c0,.63-.18,1-.59,1s-.59-.33-.59-1ZM12.73,8.7a3.44,3.44,0,0,1-.11-1V2.33h1.24v5a2.89,2.89,0,0,0,0,.48c0,.19.12.3.29.3s.5-.19.77-.59V2.33h1.24V9.11H14.94V8.36a2,2,0,0,1-1.4.84A.77.77,0,0,1,12.73,8.7Zm4.71,8.23v.63H16.22v-.63c0-.61.21-.93.61-.93S17.44,16.32,17.44,16.93ZM4.14,2.54C3.84,1.7,3.54.84,3.25,0H4.69l1,3.58L6.58,0H8L6.33,5.43V9.11H5V5.43A21.71,21.71,0,0,0,4.14,2.54ZM19.81,12.6a2.56,2.56,0,0,0-2.18-2,69.82,69.82,0,0,0-7.55-.27,69.43,69.43,0,0,0-7.54.27,2.57,2.57,0,0,0-2.19,2A22.21,22.21,0,0,0,0,17.36a21.39,21.39,0,0,0,.35,4.76,2.53,2.53,0,0,0,2.18,2,66.65,66.65,0,0,0,7.55.29,66.68,66.68,0,0,0,7.55-.29,2.55,2.55,0,0,0,2.18-2,22.27,22.27,0,0,0,.35-4.76A21.41,21.41,0,0,0,19.81,12.6ZM5.75,14H4.3v7.74H2.94V14H1.51V12.69H5.75Zm3.67,7.74H8.22V21a2,2,0,0,1-1.39.83A.75.75,0,0,1,6,21.3a3.28,3.28,0,0,1-.11-1V15H7.14v5a3.32,3.32,0,0,0,0,.48c0,.19.12.29.29.29s.5-.19.78-.57V15H9.43Zm4.63-2a4.82,4.82,0,0,1-.12,1.36,1,1,0,0,1-1,.75,1.68,1.68,0,0,1-1.27-.75v.65H10.49v-9H11.7v3A1.65,1.65,0,0,1,13,14.91a1,1,0,0,1,1,.76A4.67,4.67,0,0,1,14.05,17Zm4.6-1.12H16.22v1.18c0,.63.21.94.63.94a.52.52,0,0,0,.54-.49,7.35,7.35,0,0,0,0-.83h1.24v.18a5.3,5.3,0,0,1,0,.79,1.61,1.61,0,0,1-.29.73,1.69,1.69,0,0,1-1.47.72,1.73,1.73,0,0,1-1.47-.69A2.56,2.56,0,0,1,15,19.53V17.18a2.6,2.6,0,0,1,.38-1.58,1.86,1.86,0,0,1,2.9,0,2.68,2.68,0,0,1,.37,1.58v1.4Zm-5.81-1.66v2.87c0,.61-.18.91-.53.91a.87.87,0,0,1-.61-.3V16.31a.87.87,0,0,1,.61-.3C12.66,16,12.84,16.32,12.84,16.92Z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <button type="button" id="button-send-contact" class="btn btn-yellow">@lang('app.send')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="contact-section-add-testimonials">
        <div>
            <h1>@lang('app.testimonials')</h1>
            <h3 class="color-gray">@lang('app.expressOpinion')</h3>
        </div>

        <div id="previewSvg" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" class="color-gray" viewBox="0 0 170 170">
                <defs>
                    <style>.cls-1 {
                            fill: #fff;
                        }

                        .cls-2 {
                            fill: #aaa;
                        }</style>
                </defs>
                <g id="Capa_2">
                    <g id="Capa_1-2">
                        <rect class="cls-1" width="170" height="170"></rect>
                        <path
                                class="cls-2"
                                d="M97.69,85.8H86.47V97h-1.6V85.8H73.64V84.2H84.86V73h1.6V84.2H97.69Z"></path>
                    </g>
                </g>
            </svg>
        </div>

        <div>
            <div style="position: relative">
                <div class="img-thumbnail">
                    <div id="preview" class="" style="overflow: hidden; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="color-gray" viewBox="0 0 170 170">
                            <defs>
                                <style>.cls-1 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill: #aaa;
                                    }</style>
                            </defs>
                            <g id="Capa_2">
                                <g id="Capa_1-2">
                                    <rect class="cls-1" width="170" height="170"></rect>
                                    <path
                                            class="cls-2"
                                            d="M97.69,85.8H86.47V97h-1.6V85.8H73.64V84.2H84.86V73h1.6V84.2H97.69Z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="container-form">
                <form id="form-send-testimonials" action="{{ route('testimonials.store', [App::getLocale()]) }}"
                      enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group form-add-testimonials-name">
                        <input type="text" class="form-control" name="name" required=""
                               placeholder="@lang('app.yourName')"  value="{{$data['t_name']}}">
                    </div>

                    <div class="form-group">
                        <textarea rows="5" class="form-control" name="testimonials" required=""
                                  placeholder="@lang('app.yourtestimonials')">{{$data['testimonials']}}</textarea>
                    </div>
                    <input type="hidden" class="hidden" name="foto"/>
                    <div>
                        {!! htmlFormSnippet() !!}
                    </div>
                    <div class="clearfix"> </div>
                    <button type="button" id="button-send-testimonials" class="btn btn-yellow"  style="margin-top: 15px;">@lang('app.send')</button>
                </form>
            </div>
        </div>
    </div>

    <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 340px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title color-gray">{{ __('app.select_image') }}</h2>
                    <button id="btnClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="thumbnail"
                              style="height: 250px; width: 250px">
                            <img id="image" src=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn btn-yellow" onclick="$('#input').click()">{{ __('app.select') }}</button>
                    <button type="button" class="btn btn-yellow" data-dismiss="modal">{{ __('app.ready') }}</button>
                    <button id="btnCancel" type="button" class="btn btn-yellow" data-dismiss="modal">{{ __('app.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
    <input style="display: none;" type="file" id="input">

    @if($testimonials->count())
        <div class="contact-section-testimonials">
            @foreach ($testimonials as $t)
                <div class="testmonials-item">
                    <div class="testmonials-item-img">
                        <img class="img-thumbnail" src="{{ $t->foto }}">
                    </div>

                    <div class="testmonials-item-body">
                        <h3 class="color-gray">{{ $t->name }}</h3>
                        <p class="color-gray">{{ $t->testimonials }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@push('scripts')
    <script type="text/javascript" src="/js/cropper.js"></script>
    <script type="text/javascript" src="/js/jquery-cropper.js"></script>
    <script type="text/javascript" src="/js/views/contacts.js"></script>
@endpush