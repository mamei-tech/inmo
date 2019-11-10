<div class="row social-media" style="margin-top: 3rem;">
    <div class="col" style="margin-bottom: 30px;">

        {{-- Facebook --}}
        {{-- https://developers.facebook.com/tools/debug/sharing/ --}}
        {{-- <a href="https://www.facebook.com/sharer/sharer.php?p[url]={{urlencode($url)}}&;p[title]={{$title}}&;p[summary]={{$summary}}&;&p[images][0]={{urlencode($image)}}" target="_blank"> --}}
        <a class="social-media-link" href="https://www.facebook.com/sharer.php?u={{$url}}" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 15px;margin-top:5px;margin-right: 15px;" viewBox="0 0 11 26">
                <title>Facebook</title>
                <g id="Capa_2" data-name="Capa 2">
                    <g id="Capa_1-2" data-name="Capa 1">
                        <path class="cls-1" d="M11.15,7.84,10.72,12H7.42v12h-5V12H0V7.84H2.47V5.36C2.47,2,3.86,0,7.83,0h3.3V4.13H9.06c-1.54,0-1.64.58-1.64,1.66V7.84Z"></path>
                    </g>
                </g>
            </svg>
        </a>

        {{-- Linked In --}}
        {{-- !!! Revisar si el link de compartir de linked in es http o https --}}
        <a class="social-media-link" href="https://www.linkedin.com/shareArticle?&url={{$url}}&title={{$title}}" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 26" style="height: 30px;width: 30px;margin-top:5px;margin-right: 15px;">
                <title>Linkedin</title>
                <g id="Capa_2" data-name="Capa 1">
                    <path class="cls-1" d="M.3,7.8H5.45V24H.3ZM2.91,0A2.74,2.74,0,0,0,0,2.8a2.72,2.72,0,0,0,2.84,2.8h0A2.73,2.73,0,0,0,5.78,2.8,2.72,2.72,0,0,0,2.91,0ZM18.08,7.42a5.05,5.05,0,0,0-4.64,2.68V7.8H8.3s.06,1.52,0,16.2h5.14V15a4.28,4.28,0,0,1,.17-1.32,2.83,2.83,0,0,1,2.64-2c1.86,0,2.61,1.49,2.61,3.66V24H24V14.71C24,9.74,21.47,7.42,18.08,7.42Z"></path>
                </g>
            </svg>
        </a>


        {{-- Pinterest --}}
        {{-- https://developers.pinterest.com/tools/widget-builder/ --}}
            <a class="social-media-link" data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/bookmarklet/?url={{$url}}&media={{$image}}&description={{$title}}" target="_blank">
            {{-- <img src=""/> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17" style="height: 30px;width: 30px;margin-top:5px;margin-right: 15px;">
                <title>Pinterest</title>
                <g id="Capa_2" data-name="Capa 1">
                    <path class="cls-1" d="M15.025 6.225c0 3.819-2.123 6.662-5.246 6.662-1.049 0-2.035-0.568-2.365-1.213-0.568 2.238-0.682 2.667-0.682 2.667-0.203 0.746-0.619 1.493-0.985 2.074-1.043 0.737-1.14-0.404-1.14-0.404-0.024-0.684-0.012-1.505 0.166-2.237 0 0 0.189-0.785 1.25-5.285-0.315-0.62-0.315-1.543-0.315-1.543 0-1.441 0.835-2.516 1.872-2.516 0.885 0 1.314 0.67 1.314 1.467 0 0.885-0.57 2.213-0.859 3.439-0.24 1.037 0.518 1.871 1.529 1.871 1.847 0 3.084-2.363 3.084-5.158 0-2.137-1.44-3.729-4.045-3.729-2.945 0-4.778 2.2-4.778 4.652 0 0.848 0.252 1.442 0.644 1.91 0.178 0.215 0.203 0.29 0.139 0.543-0.049 0.177-0.15 0.607-0.201 0.771-0.063 0.253-0.266 0.341-0.48 0.253-1.353-0.558-1.986-2.049-1.986-3.718 0-2.756 2.325-6.068 6.928-6.068 3.717 0 6.156 2.692 6.156 5.562z"></path>
                </g>
            </svg>
        </a>

        {{-- Mail --}}
        <a class="social-media-mail" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 17" style="height: 30px;width: 30px;margin-top:5px;margin-right: 15px;">
                <title>Mail</title>
                <g id="Capa_2" data-name="Capa 1">
                    <path class="cls-1" d="M0 2v13h17v-13h-17zM8.494 9.817l-6.896-6.817h13.82l-6.924 6.817zM5.755 8.516l-4.755 4.682v-9.383l4.755 4.701zM6.466 9.219l2.026 2.003 1.996-1.966 4.8 4.744h-13.677l4.855-4.781zM11.201 8.555l4.799-4.725v9.467l-4.799-4.742z"></path>
                </g>
            </svg>
        </a>


        {{-- Twitter --}}
        {{-- https://dev.twitter.com/web/tweet-button/web-intent --}}

    </div>

    <div class="col-md-auto">
        <button class="btn btn-yellow"><a href="{{ route('contacts') }}">@lang('app.contactMe')</a>
        </button>
    </div>
</div>