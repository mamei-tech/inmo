@extends('layout.base')

<title> Inmobiliaria </title>

@section('headLinks')
    @parent
@endsection

@section('navBar')
    @parent
@endsection

@section('content')
    <a id="moveToDown" class="hidden" href="#section-1"></a>
    <a id="moveToUp" class="hidden" href="#slider-1"></a>

    {{--Slider--}}
    <section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true"
             data-interval="5000" id="slider-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-section__container">
            <div>
                <ol class="carousel-indicators">
                    <li data-app-prevent-settings="" data-target="#slider-1" class="active" data-slide-to="0"></li>
                    <li data-app-prevent-settings="" data-target="#slider-1" data-slide-to="1"></li>
                    <li data-app-prevent-settings="" data-target="#slider-1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height active"
                         style="background-image: url('images/slider2.jpg')">
                        <div class="mbr-box__magnet mbr-box__magnet--center-right mbr-box__magnet--sm-padding mbr-after-navbar"
                             style="top: -20px;">
                            <div class=" container" style="top: -40px; position: relative;margin-right: 0">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4 edupaddingslider"
                                         style="background-color: #ffffff2a;">
                                        <div style="padding:20px;0">
                                            <h3 class="mbr-hero__text" style="color: #F3C567;">NEED A HOME? CALL ME!</h3>
                                            <p class="mbr-hero__subtext" style="color: #8B8383">CONTACT YOUR REALTOR</p>
                                            <p class="mbr-hero__subtext" style="color: #8B8383">ASSOCIATE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height"
                         style="background-image: url('images/slider2.jpg')">
                        <div class="mbr-box__magnet mbr-box__magnet--center-right mbr-box__magnet--sm-padding mbr-after-navbar"
                             style="top: -20px;">
                            <div class=" container" style="top: -40px; position: relative;margin-right: 0">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4 edupaddingslider"
                                         style="background-color: #ffffff2a;">
                                        <div style="padding:20px;0">
                                            <h3 class="mbr-hero__text" style="color: #F3C567;">PUEDES VIVIR EN LO MEJOR DE
                                                MIAMI</h3>
                                            <p class="mbr-hero__subtext" style="color: #8B8383">PAGANDO LOS MEJORES
                                                PRECIOS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height"
                         style="background-image: url('images/slider2.jpg')">
                        <div class="mbr-box__magnet mbr-box__magnet--center-right mbr-box__magnet--sm-padding mbr-after-navbar"
                             style="top: -20px;">
                            <div class=" container" style="top: -40px; position: relative;margin-right: 0">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4 edupaddingslider"
                                         style="background-color: #ffffff2a;">
                                        <div style="padding:20px;0">
                                            <h3 class="mbr-hero__text" style="color: #F3C567;">PARA PODER SENTIRLO TIENES
                                                QUE VIVIRLO</h3>
                                            <p class="mbr-hero__subtext" style="color: #8B8383">BRICKELL AND DAWNTOWN
                                                MIAMI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{--Section 1--}}
    <section class="mbr-section mbr-section--relative mbr-parallax-background" id="section-1" style="background-image: url('images/bg3.jpg');">

        <div class="mbr-section__container  container" style="margin-right: 0">
            <div class="row" style="margin-right: -20px;">
                <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                    <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                    </div>
                    <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__right " style="background-color: #0000002a;padding-top: 50px; padding-bottom: 50px;padding-right: 10px;">
                        <div class="edupaddingslider">
                            <div class="mbr-section__container mbr-section__container--middle">
                                <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg" style="text-align: right;">
                                    <h3 class="mbr-header__text" style="color: #F3C567;">DO YOU KNOW THAT</h3>
                                </div>
                            </div>
                            <div class="mbr-section__container mbr-section__container--middle">
                                <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg" style="text-align: right;color: white"><p>Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.</p></div>
                            </div>
                            <div class="">
                                <div class="mbr-buttons mbr-buttons--auto-align btn-inverse" style="text-align: right;">
                                    <a class="mbr-buttons__btn btn btn-sm btn-default" href="https://mobirise.com" style="margin: 0;">GO IT</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Section 2--}}
    <section class="mbr-section mbr-section--relative mbr-parallax-background" id="msg-box4-8" style="background-image: url('images/slide1.jpg');">

        <div class="mbr-section__container  container" style="margin-left: 0">
            <div class="row" style="margin-left: -20px;">
                <div class="mbr-box mbr-box--fixed mbr-box--adapted">

                    <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__right " style="background-color: #ffffff2a;padding-top: 50px; padding-bottom: 50px;padding-left: 10px;">
                        <div class="edupaddingsliderleft">
                            <div class="mbr-section__container mbr-section__container--middle">
                                <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg" style="text-align: left;">
                                    <h3 class="mbr-header__text" style="color: #F3C567;">TODAY IS YOUR DAY</h3>
                                </div>
                            </div>
                            <div class="mbr-section__container mbr-section__container--middle">
                                <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg" style="text-align: left;color: white"><p>Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.</p></div>
                            </div>
                            <div class="">
                                <div class="mbr-buttons mbr-buttons--auto-align btn-inverse" style="text-align: left;">
                                    <a class="mbr-buttons__btn btn btn-sm btn-default" href="https://mobirise.com" style="margin: 0;">GO IT</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--Section 3--}}
    <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-9" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-section__container container mbr-section__container--std-top-padding">
            <div class="mbr-section__row row">
                <div class="mbr-section__col col-xs-12 col-sm-4">

                    <div class="mbr-section__container mbr-section__container--middle" >
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text" style="color: #F3C567;">YOUR HOME FROM THE BEACH!</h3>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle" >
                        <div class="mbr-article mbr-article--wysiwyg">
                            <p>Bootstrap 3 has been noted as one of the most reliable and proven frameworks and Mobirise has been equipped.</p>
                        </div>
                    </div>

                    <div class="mbr-section__container mbr-section__container--last btn-index-section-features">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>

                </div>
                <div class="mbr-section__col col-xs-12 col-sm-4">

                    <div class="mbr-section__container mbr-section__container--middle" >
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text" style="color: #F3C567;">GREAT HOMES IN BRICKELL TO LOW PRICES!</h3>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--wysiwyg">
                            <p>One of Bootstrap 3's big points is responsiveness and Mobirise makes effective use of this by generating highly responsive website for you.</p>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--last btn-index-section-features">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>
                </div>

                <div class="mbr-section__col col-xs-12 col-sm-4">

                    <div class="mbr-section__container mbr-section__container--middle" >
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text" style="color: #F3C567;">ROLAND FRANK</h3>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--wysiwyg">
                            <p>Google has a highly exhaustive list of fonts compiled into its web font platform and Mobirise makes it easy for you to use them on your website easily and freely.</p>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--last btn-index-section-features">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mbr-section__row row row-index-edu">
                <div class="mbr-section__col col-xs-12 col-sm-4">
                    <div class="mbr-section__container mbr-section__container--last">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>
                </div>
                <div class="mbr-section__col col-xs-12 col-sm-4">
                    <div class="mbr-section__container mbr-section__container--last">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>
                </div>
                <div class="mbr-section__col col-xs-12 col-sm-4">
                    <div class="mbr-section__container mbr-section__container--last">
                        <div class="mbr-buttons mbr-buttons--left">
                            <a href="https://mobirise.com" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GO IT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('footerScripts')
    @parent
    <script src="{{ asset('js/home.js') }} " defer></script>
@endsection