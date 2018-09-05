@extends('layouts.app')

<title> Inmobiliaria / Contacts </title>


@section('content')
    <section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header4-5" style="background-image: url('images/bg5.jpg');">
        <div class="mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
            <div class="mbr-box__container mbr-section__container container">
                <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-left">
                        <div class="row">
                            <div class=" col-sm-6 col-sm-offset-6">
                                <div class="mbr-hero animated fadeInUp col-sm-12 no-padding-col-edu">
                                    <h3 class="active-edu" style="font-size: 28px;text-align: right;letter-spacing: 2px;">CONTACT ME</h3>
                                    <h3 class="mbr-hero__text" style="font-size: 16px;text-align: right;line-height: 15px;">GET MORE INFORMATION</h3>
                                </div>

                                <div class="mbr-hero animated fadeInUp delay col-sm-12 no-padding-col-edu">
                                    <form action="@{{ route('sendContact') }}" method="post">

                                        <div class="col-sm-6 no-padding-col-edu">
                                            <div class="form-group" style="padding-left: 5px;">
                                                <input type="text" class="form-control form-control-edu-contacts" name="name" required="" placeholder="Name*">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 no-padding-col-edu">
                                            <div class="form-group" style="padding-left: 5px;">
                                                <input type="text" class="form-control form-control-edu-contacts" name="lastname" required="" placeholder="Last Name*">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 no-padding-col-edu">
                                            <div class="form-group" style="padding-left: 5px;">
                                                <input type="email" class="form-control form-control-edu-contacts" name="email" required="" placeholder="Email*">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 no-padding-col-edu">
                                            <div class="form-group" style="padding-left: 5px;">
                                                <input type="tel" class="form-control form-control-edu-contacts" name="phone" placeholder="Phone">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 no-padding-col-edu">
                                            <div class="form-group" style="padding-left: 5px;">
                                                <textarea class="form-control form-control-edu-contacts" name="message" rows="7" placeholder="Message"></textarea>
                                            </div>
                                        </div>

                                        <div class="mbr-hero animated fadeInUp delay col-sm-12 no-padding-col-edu" style="padding-top: 25px;">
                                            <div class="mbr-social-icons mbr-social-icons--style-1 col-sm-6 no-padding-col-edu">
                                                <a class="mbr-social-icons__icon social-icon-edu" title="Facebook" target="_blank" href="https://www.facebook.com/pages/Mobirise/1616226671953247"><i class="socicon socicon-facebook"></i></a>
                                                <a class="mbr-social-icons__icon social-icon-edu" title="Twitter" target="_blank" href="https://twitter.com/mobirise"><i class="socicon socicon-twitter"></i></a>
                                                <a class="mbr-social-icons__icon social-icon-edu" title="Instagram" target="_blank" href="https://instagram.com/mobirise/"><i class="socicon socicon-instagram"></i></a>
                                            </div>

                                            <div class="col-sm-6 no-padding-col-edu">
                                                <button type="submit" class="mbr-buttons__btn mbr-buttons--right btn btn-lg btn-default animated fadeInUp delay btn-edu-about-me" style="margin: 0" href="contact.html">SEND</button>
                                            </div>
                                        </div>

                                        <!-- <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-danger">SEND</button></div> -->
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>

        </div>
    </section>
@endsection
