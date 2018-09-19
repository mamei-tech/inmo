<div class="footer">
    <div class="container" style="position: relative;">
        <div class="brand-ct">
            <div class="brand-img">
                <img src="../images/borroto.png">
            </div>
            <div class="brand-subimg">
                <img src="../images/colfax.png">
            </div>
        </div>
        <div class="menu-ct">
            <ul>
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
        <div class="footer-copyright">
            <p class="color-gray">@lang('app.copyright')</p>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        @if(!isset($inHome))
        document.querySelector(".footer .link-{{Route::currentRouteName()}}").parentNode.classList.add("active");
        @endif
    </script>
@endpush