{{--TODO Falta lo de la tipografia--}}
{{--TODO Falta el tamaño del texto--}}
{{--TODO Falta el espacio entre letras--}}
{{--TODO Falta las imagenes de la firma y la otra--}}

<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--transparent mbr-navbar--sticky mbr-navbar--auto-collapse" id="section-menu">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand first-brand-edu">
                   <span class="mbr-brand__logo">
                       <div class="first-logo-edu">
                           <a href="{{ route('home') }}">
                               <img src="{{ asset('images/bg3.jpg') }}" class="mbr-navbar__brand-img mbr-brand__img">
                           </a>
                       </div>
                       <div class="second-logo-edu">
                           <a href="{{ route('home') }}">
                               <img src="{{ asset('images/bg5.jpg') }}" class="mbr-navbar__brand-img mbr-brand__img sub-img">
                           </a>
                       </div>
                   </span>
                </div>
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand second-brand-edu">
                       <span class="mbr-brand__logo">
                           <div class="second-brand-second-logo-edu">
                               <a href="{{ route('home') }}">
                                   <img src="{{ asset('images/bg5.jpg') }}" class="mbr-navbar__brand-img mbr-brand__img">
                               </a>
                           </div>
                       </span>
                    </div>
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand language-brand-edu">
                    <ul class="mbr-navbar__items mbr-navbar__item-language mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right mbr-buttons--active mbr-buttons--only-links">
                        <li class="mbr-navbar__item navbar__item-language">
                            <span class="item-language color-gray btn_nav_edu" href="{{ route('neighborhood') }}">ESP</span>
                        </li>
                        <li class="mbr-navbar__item navbar__item-language navbar__item-language-separator">
                            <span class="color-gray btn_nav_edu item-language-separator item-language">/</span>
                        </li>
                        <li class="mbr-navbar__item">
                            <span class="item-language color-white btn_nav_edu" href="{{ route('neighborhood') }}">ENG</span>
                        </li>
                    </ul>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger color-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__item-language mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right mbr-buttons--active mbr-buttons--only-links">
                                <li class="mbr-navbar__item">
                                    <span class="item-language color-white btn_nav_edu" href="{{ route('neighborhood') }}">ENG</span>
                                </li>
                                <li class="mbr-navbar__item navbar__item-language navbar__item-language-separator">
                                    <span class="color-gray btn_nav_edu item-language-separator item-language">/</span>
                                </li>
                                <li class="mbr-navbar__item navbar__item-language">
                                    <span class="item-language color-gray btn_nav_edu" href="{{ route('neighborhood') }}">ESP</span>
                                </li>
                            </ul>

                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links">
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white btn_nav_edu" href="{{ route('neighborhood') }}">NEIGHBORHOODS</a>
                                </li>
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white btn_nav_edu" href="https://mobirise.com">GUIDES</a>
                                </li>
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white btn_nav_edu" href="{{ route('aboutMe') }}">ABOUT ME</a>
                                </li>
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white btn_nav_edu" href="{{ route('contacts') }}">CONTACT</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>