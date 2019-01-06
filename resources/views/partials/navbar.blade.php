<?php $class = isset($inHome) ? "" : "scrolled"; ?>

<div class="nav-bar {{$class}}">
    <div class="container" style="position: relative;">
        <div class="brand-ct">
            <div class="brand-img">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/personal.png')  }}"/>
            </div>
            <div class="brand-subimg">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/company.png')  }}"/>
            </div>
        </div>
        <div class="menu-ct pc">
            <ul>
                <li class="lang-{{App::getLocale()}}" style="margin-right: calc((100vw - 1250px) / 2);">
                    <a class="lang-en"
                       style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                       href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
                    <a class="lang-es"
                       style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                       href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
                </li>

                @unless(isset($inHome) && $inHome==true)
                    <li class="hvr-underline-from-center">
                        <a href="{{Route("home")}}">@lang('app.home')</a>
                    </li>
                @endunless

                <li class="hvr-underline-from-center">
                    <a class="link-neighborhoods" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
                </li>
                <li class="hvr-underline-from-center">
                    <a class="link-guides" href="{{Route("guides")}}">@lang('app.guides')</a>
                </li>
                <li class="hvr-underline-from-center">
                    <a class="link-about" href="{{Route("about")}}">@lang('app.aboutMe')</a>
                </li>
                <li class="hvr-underline-from-center">
                    <a class="link-contacts" href="{{Route("contacts")}}">@lang('app.contact')</a>
                </li>
            </ul>
        </div>
        <div class="menu-ct mobile">
            <ul>
                <div class="phone-lang-buttons">
                    <div class="brand-subimg">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/company.png')  }}"/>
                    </div>
                    <li class="lang-{{App::getLocale()}}">
                        <a class="lang-en"
                           style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                           href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
                        <a class="lang-es"
                           style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                           href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
                    </li>
                </div>


                <div>
                    <li class="hvr-underline-from-center">
                        <a href="{{Route("home")}}">@lang('app.home')</a>
                    </li>
                </div>


                <div>
                    <li class="hvr-underline-from-center">
                        <a class="link-neighborhoods" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
                    </li>
                </div>
                <div>
                    <li class="hvr-underline-from-center">
                        <a class="link-guides" href="{{Route("guides")}}">@lang('app.guides')</a>
                    </li>
                </div>
                <div>
                    <li class="hvr-underline-from-center">
                        <a class="link-about" href="{{Route("about")}}">@lang('app.aboutMe')</a>
                    </li>
                </div>
                <div>
                    <li class="hvr-underline-from-center">
                        <a class="link-contacts" href="{{Route("contacts")}}">@lang('app.contact')</a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="mobile-buttons float-right">
            <div class="tablet-lang-buttons lang-{{App::getLocale()}} float-left" style="margin:2px 40px 0 0;">
                <a class="lang-en"
                   style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                   href="{{route(Route::currentRouteName(),["en"])}}">ENG</a> /
                <a class="lang-es"
                   style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
                   href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
            </div>
            <a class="button-toggle">
                <span class="button-toggle-line"></span>
            </a>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">

        @if(!isset($inHome))

        var link = document.querySelector(".nav-bar .pc .link-{{Route::currentRouteName()}}");
        var linkMobile = document.querySelector(".nav-bar .mobile .link-{{Route::currentRouteName()}}");

        if (link === null)
        {
            link = document.querySelector(".nav-bar .pc .link-neighborhoods");
            linkMobile = document.querySelector(".nav-bar .mobile .link-neighborhoods");
        }

        link.parentNode.classList.add("active");
        linkMobile.parentNode.classList.add("active");

        {{--document.querySelector(".nav-bar .pc .link-{{Route::currentRouteName()}}").parentNode.classList.add("active");--}}
        {{--document.querySelector(".nav-bar .mobile .link-{{Route::currentRouteName()}}").parentNode.classList.add("active");--}}
        var navbar = document.querySelector(".nav-bar");
        navbar.classList.add("scrolled");

        document.addEventListener("scroll", function () {

            if (window.prevScrollY < window.scrollY && window.scrollY > 80) {//bajando
                navbar.classList.add("scroll-down");
                navbar.classList.remove("open");
            }
            else //subiendo
                navbar.classList.remove("scroll-down");

            window.prevScrollY = window.scrollY;

        });
        @endif

        document.querySelector('.mobile-buttons .button-toggle').addEventListener("click", function () {
            var navbar = document.querySelector(".nav-bar");
            var menuMobile = document.querySelector(".menu-ct.mobile");
            if (navbar.classList.contains("open")) {
                navbar.classList.remove("open");
            }
            else {
                navbar.classList.add("open");
            }
        });
    </script>
@endpush