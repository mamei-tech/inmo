@extends('layout.base')

<title> Inmobiliaria / House Info </title>

@section('headLinks')
    @parent
@endsection

@section('navBar')
    @parent
@endsection

@section('content')
    <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="section-1" style="background-color: white;">

        <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 20px;">
            <div class="mbr-section__row row">
                <div class="mbr-section__col col-xs-12 col-sm-12" style="padding-bottom: 25px;">
                    <div style="float: right;">
                        <h3 style="letter-spacing: 1px;margin-bottom: 0" class="active-edu">PENTHOUSE 31 PLACE BOCA</h3>
                        <h3 style="float: right;" class="h4-edu">BRICKELL</h3>
                    </div>
                </div>
            </div>

            <div class="mbr-section__row row">
                <div class="mbr-section__col col-xs-12 col-sm-12">
                    <div>
                        <p>aki va el paginado</p>
                    </div>
                </div>
            </div>

            <div class="mbr-section__row row" style="padding-bottom: 35px;">
                <div class="mbr-section__col col-xs-12 col-sm-7">
                    <div style="height: 250px; width: 100%;background-image: url('images/slide1.jpg')" class="img-edu"></div>
                    <div>
                        <h3 class="h4-edu" style="padding-top: 25px;">MAP LOCATION</h3>
                    </div>
                    <div style="height: 250px; width: 100%">
                        <figure class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--no-bg mbr-figure--caption-outside-bottom">
                            <div class="mbr-figure__map mbr-google-map">
                                <p class="mbr-google-map__marker" data-coordinates="40.748384,-73.9854792">Empire State Building</p>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="mbr-section__col col-xs-12 col-sm-4 col-sm-offset-1">

                    <h3 class="h4-edu" style="display: initial;">LOCATION</h3>

                    <p class="p-edu" style="padding-top: 10px;">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website.</p>

                    <h3 class="h4-edu" style="padding-top: 10px;">PROPERTY</h3>

                    <div class="col-xs-6 col-sm-5" style="padding-left: 0">
                        <p class="p-edu">Ownership:</p>
                        <p class="p-edu">Type:</p>
                        <p class="p-edu">Rooms:</p>
                        <p class="p-edu">Bathrooms:</p>
                        <p class="p-edu">Pets:</p>
                        <p class="p-edu">Area:</p>
                        <p class="p-edu">Esterior area:</p>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-sm-offset-1">
                        <p class="p-edu">Condo</p>
                        <p class="p-edu">Condo</p>
                        <p class="p-edu">4</p>
                        <p class="p-edu">3.5</p>
                        <p class="p-edu">Allowed</p>
                        <p class="p-edu">2150 ft</p>
                        <p class="p-edu">400 ft</p>
                    </div>

                    <div class="clearfix"></div>

                    <h3 class="h4-edu" style="padding-top: 10px;">FINANCIALS</h3>

                    <div class="col-xs-6 col-sm-5" style="padding-left: 0">
                        <p class="p-edu">Price:</p>
                        <p class="p-edu">Anual Taxes:</p>
                        <p class="p-edu">Common charges:</p>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-sm-offset-1">
                        <p class="p-edu">$950.00</p>
                        <p class="p-edu">$11.23</p>
                        <p class="p-edu">$1.81</p>
                    </div>

                    <div class="clearfix"></div>

                    <h3 class="h4-edu" style="padding-top: 10px;">DESCRIPTION</h3>

                    <p class="p-edu">Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website Make your own website in a few clicks! Mobirise.</p>


                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/houseInfo.js') }} " defer></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
@endsection