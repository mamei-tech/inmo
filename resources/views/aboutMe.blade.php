@extends('layouts.app')

<title> Inmobiliaria / About Me </title>

@section('headLinks')
    @parent
@endsection

@section('navBar')
    @parent
@endsection

@section('content')
    <section class="engine"><a rel="external" href="https://mobirise.com">best responsive website builder</a></section><section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header4-5" style="background-image: url('images/bg5.jpg');">
        <div class="mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
            <div class="mbr-box__container mbr-section__container container">
                <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-left">
                        <div class="row">
                            <div class=" col-sm-6 col-sm-offset-6">
                                <div class="mbr-hero animated fadeInUp col-sm-12 no-padding-col-edu">
                                    <h3 class="active-edu" style="font-size: 28px;text-align: right;letter-spacing: 2px;">JORGE E. HIDALGO BORROTO, LLC</h3>
                                    <h3 class="mbr-hero__text" style="font-size: 16px;text-align: right;line-height: 15px;">REAL STATE ASSOCIATE</h3>
                                </div>

                                <div class="mbr-hero animated fadeInUp delay col-sm-12 no-padding-col-edu">
                                    <div class="col-sm-6 no-padding-col-edu">
                                        <div>
                                            <p class="p-edu-about-me">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a.</p>

                                            <p class="p-edu-about-me">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a development time by providing you with a.</p>

                                            <p class="p-edu-about-me">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a development time by providing you with a.</p>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 no-padding-col-edu">
                                        <div>
                                            <p class="p-edu-about-me">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with time by providing you with a.</p>

                                            <p class="p-edu-about-me">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website.Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website.Make your own website.</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-sm-12 no-padding-col-edu">
                                        <p>JHIDALGO@COLDFAXREALTY.COM</p>
                                    </div>
                                    <div class="col-sm-12 no-padding-col-edu">
                                        <p>PH: 1-(561)-503-2456</p>
                                    </div>
                                    <div class="col-sm-12 no-padding-col-edu">
                                        <p>55 MERRICK WAY SUITE 202-A, CORAL GABLES, FL 33314</p>
                                    </div>
                                    <div class="col-sm-12 no-padding-col-edu">
                                        <p>WWW.COLDFAXMIAMI.COM</p>
                                    </div>
                                </div>

                                <div class="mbr-hero animated fadeInUp delay col-sm-12 no-padding-col-edu" style="padding-top: 25px;">
                                    <div class="mbr-social-icons mbr-social-icons--style-1 col-sm-6 no-padding-col-edu">
                                        <a class="mbr-social-icons__icon social-icon-edu" title="Facebook" target="_blank" href="https://www.facebook.com/pages/Mobirise/1616226671953247"><i class="socicon socicon-facebook"></i></a>
                                        <a class="mbr-social-icons__icon social-icon-edu" title="Twitter" target="_blank" href="https://twitter.com/mobirise"><i class="socicon socicon-twitter"></i></a>
                                        <a class="mbr-social-icons__icon social-icon-edu" title="Instagram" target="_blank" href="https://instagram.com/mobirise/"><i class="socicon socicon-instagram"></i></a>
                                    </div>

                                    <div class="col-sm-6 no-padding-col-edu">
                                        <a class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay btn-edu-about-me" href="@{{ route('contacts') }}">CONTACT ME</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>

        </div>
    </section>
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/aboutMe.js') }} " defer></script>
@endsection

<?php var_dump(session("segment") ) ?>