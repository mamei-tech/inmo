<div class="footer">
    <div class="container" style="position: relative;">
        <div class="brand-ct">
            <div class="brand-img">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/personal.png')  }}"/>
            </div>
            <div class="brand-subimg">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/company.png')  }}"/>
            </div>
        </div>
        <div class="menu-ct">
            <ul>
                @unless(isset($inHome) && $inHome==true)
                    <li>
                        <a href="{{Route("home")}}">@lang('app.home')</a>
                    </li>
                @endunless
                <li>
                    <a class="link-neighborhoods" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
                </li>

                <li>
                    <a class="link-about" href="{{Route("about")}}">@lang('app.aboutMe')</a>
                </li>
                <li>
                    <a class="link-contacts" href="{{Route("contacts")}}">@lang('app.contact')</a>
                </li>

                <li>
                    <span class="link-more">@lang('app.more')</span>
                    <div id="container-footer-arrow"><span class="footer-arrow-toggle-line"></span></div>
                </li>

                <div  class="li-especial li-especial-{{App::getLocale()}} guides">
                    <li>
                        <a class="link-guides" href="{{Route("guides")}}">@lang('app.guides')</a>
                    </li>
                </div>
                <div  class="li-especial li-especial-{{App::getLocale()}} tools">
                    <li>
                        <a class="link-tools" href="http://jehidalgorealestate.idxbroker.com/idx/homevaluation">@lang('app.tools')</a>
                    </li>
                </div>
                <div  class="li-especial li-especial-{{App::getLocale()}} blog">
                    <li>
                        <a class="link-blog" href="{{Route("blogetc.index")}}">@lang('app.blog')</a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="footer-copyright">
            <p class="color-gray">@lang('app.copyright')</p>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        @if(!isset($inHome))
            var link =  document.querySelector(".footer .link-{{Route::currentRouteName()}}");

            if (link === null)
            {
                link = document.querySelector(".footer .link-neighborhoods");
            }

            @if(isset($inGuide) || isset($inBlog))
                link = document.querySelector(".footer .link-more");
                linkReal = document.querySelector(".footer .link-{{Route::currentRouteName()}}");

                linkReal.parentNode.classList.add("active");
            @endif

            link.parentNode.classList.add("active");

        {{--document.querySelector(".footer .link-{{Route::currentRouteName()}}").parentNode.classList.add("active");--}}
        @endif

        $(document).ready(function () {
            $('#container-footer-arrow').click(function () {
                $('.footer-arrow-toggle-line').toggleClass('open');
                $('.footer .li-especial').toggleClass('open');
                $('.footer .footer-copyright').toggleClass('open');
                $('.footer').toggleClass('open');
            });

            $('.footer .link-more').click(function () {
                $('.footer-arrow-toggle-line').toggleClass('open');
                $('.footer .li-especial').toggleClass('open');
                $('.footer .footer-copyright').toggleClass('open');
                $('.footer').toggleClass('open');
            });
        });
    </script>
@endpush