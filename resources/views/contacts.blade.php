@extends('layouts.app')

@section('title')
    @lang('app.contact')
@endsection

@section('content')
    <div class="contact-section-0">
        <div></div>
        <div>
            <h1>@lang('app.contactMe')</h1>
            <h3>@lang('app.moreInformation')</h3>
            <form action="@{{ route('sendContact') }}" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourName')">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" required="" placeholder="@lang('app.yourEmail')">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" required="" placeholder="@lang('app.yourPhone')">
                </div>
                <div class="form-group">
                <textarea rows="3" class="form-control" name="writeMe" required=""
                          placeholder="@lang('app.writeMe')"></textarea>
                </div>

                <div class="container-social-buttom">
                    <div>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 15px;margin-top:5px;"
                                 viewBox="0 0 11 26">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }</style>
                                </defs>
                                <title>Facebook</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Capa_1-2" data-name="Capa 1">
                                        <path class="cls-1"
                                              d="M11.15,7.84,10.72,12H7.42v12h-5V12H0V7.84H2.47V5.36C2.47,2,3.86,0,7.83,0h3.3V4.13H9.06c-1.54,0-1.64.58-1.64,1.66V7.84Z"/>
                                    </g>
                                </g>
                            </svg>
                        </a>

                        <a class="mbr-social-icons__icon social-icon-edu" title="Instagram" target="_blank"
                           href="https://instagram.com/mobirise/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="7 0 11 25"
                                 style="height: 30px;width: 30px;margin-top:5px;">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }</style>
                                </defs>
                                <title>Instagram</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Capa_1-2" data-name="Capa 1">
                                        <path class="cls-1"
                                              d="M18.3,0H5.63A5.65,5.65,0,0,0,0,5.63V18.3a5.65,5.65,0,0,0,5.63,5.63H18.3a5.65,5.65,0,0,0,5.63-5.63V5.63A5.65,5.65,0,0,0,18.3,0Zm4.22,18.3a4.23,4.23,0,0,1-4.22,4.22H5.63A4.23,4.23,0,0,1,1.41,18.3V9.86H5.92a6.61,6.61,0,0,0-.64,2.82,6.69,6.69,0,0,0,13.38,0A6.61,6.61,0,0,0,18,9.86h4.52Zm-5.28-5.63A5.28,5.28,0,1,1,12,7.39,5.29,5.29,0,0,1,17.25,12.67Zm-.14-4.22a6.6,6.6,0,0,0-10.28,0H1.41V5.63A4.23,4.23,0,0,1,5.63,1.41H18.3a4.23,4.23,0,0,1,4.22,4.22V8.45Zm3.24-4.62V5.66a.77.77,0,0,1-.76.76H17.66a.77.77,0,0,1-.77-.76V3.83a.77.77,0,0,1,.77-.76h1.93A.77.77,0,0,1,20.35,3.83Z"/>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a class="mbr-social-icons__icon social-icon-edu" title="Twitter" target="_blank"
                           href="https://twitter.com/mobirise/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 26"
                                 style="height: 30px;width: 30px;margin-top:5px;">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }</style>
                                </defs>
                                <title>Twitter</title>
                                <g id="Capa_2" data-name="Capa 2">
                                    <g id="Capa_1-2" data-name="Capa 1">
                                        <path class="cls-1"
                                              d="M.3,7.8H5.45V24H.3ZM2.91,0A2.74,2.74,0,0,0,0,2.8a2.72,2.72,0,0,0,2.84,2.8h0A2.73,2.73,0,0,0,5.78,2.8,2.72,2.72,0,0,0,2.91,0ZM18.08,7.42a5.05,5.05,0,0,0-4.64,2.68V7.8H8.3s.06,1.52,0,16.2h5.14V15a4.28,4.28,0,0,1,.17-1.32,2.83,2.83,0,0,1,2.64-2c1.86,0,2.61,1.49,2.61,3.66V24H24V14.71C24,9.74,21.47,7.42,18.08,7.42Z"/>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-yellow">@lang('app.send')</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="contact-section-testimonials">
        <div>
            <h1>@lang('app.testimonials')</h1>
            <h3 class="color-gray">@lang('app.expressOpinion')</h3>
        </div>

        <div>
            <div>
                <div class="container-image">
                        <svg xmlns="http://www.w3.org/2000/svg" class="color-gray" viewBox="0 0 170 170"><defs><style>.cls-1 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill: #aaa;
                                    }</style></defs><g id="Capa_2" data-name="Capa 2"><g
                                        id="Capa_1-2" data-name="Capa 1"><rect class="cls-1" width="170" height="170"/><path
                                            class="cls-2"
                                            d="M97.69,85.8H86.47V97h-1.6V85.8H73.64V84.2H84.86V73h1.6V84.2H97.69Z"/></g></g></svg>

                </div>
            </div>
            <form action="@{{ route('sendTestimonials') }}" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" required="" placeholder="@lang('app.yourName')">
                </div>

                <div class="form-group">
                    <textarea rows="5" class="form-control" name="testimonials" required=""
                              placeholder="@lang('app.yourtestimonials')"></textarea>
                </div>

                <button type="submit" class="btn btn-yellow">@lang('app.send')</button>
            </form>
        </div>
    </div>
@endsection
