{{--TODO OK 1. Demorar más el tiempo en que cambia el slyder del banner principal.--}}
{{--TODO 2.	(Yo no veo nada) Revisar los textos que salen en el “neighborhood”, pues en varios lugares se fueron códigos HTML. Revisar esto.--}}
{{--TODO OK 3.	En el footer el código de animación cambia con respecto al navbar--}}
{{--a.	OK En efecto OVER poner amarillo, sin raya.’--}}
{{--b.	OK El ACTIVE se mantiene con el amarillo del OVER--}}

{{--TODO OK 4.	En el efecto “on focus” de bootstrap que pone el borde azul en los inputs, cambiarlo para la tonalidad de amarillo que tiene los botones (por ejemplo).--}}

{{--TODO 5.	Utilizar todas las imágenes correspondientes a los tamaños de los dispositivos. Las últimas que el diseño entregó, enlace enviado por email. Si no pueden acceder avísame y las subo porque el enlace es de ellos.--}}
{{--TODO OK 6.	Los enlaces (botones) de traducción de cambio de lenguaje no llevan el código de animación, ni la línea de abajo ni el cuadrado.--}}
{{--TODO OK 7.	Noté que las promociones segundarias no están traducidas. Me pregunto si es que como no tenían traducción no están puestas, pero se puede traducir.--}}
{{--TODO 8. (Falta bajar la linea del hover) En el navbar, tratar de que la línea del efecto OVER se represente al mismo nivel y/o que abra (se extienda) más menos solo hasta donde llega el texto.--}}
{{--TODO OK 9.	En vista móvil, la imagen “colfax” debe verse algo más grande. Lo mismo ocurre en el footer con la misma imagen.--}}
{{--TODO OK 10. Hay que revisar la pauta del espaciado en la vista móvil que es en la vista que realmente se nota el problema. Por ejemplo, en la vista del home que se muestra debajo, ellos dicen que la pauta es de 50px entre los bordes superior inferior de cada sección, y 30px entre los contenidos de la sección. Por sección ellos entienden cada cuadrado (Hoy es tu día, Sabes que). Me explican que solo se nota en la vista móvil.--}}
{{--TODO 11. (Ver que vamos a hacer aki) Pregunto. ¿La animación que baja el menú alternativo se pude cambiar?--}}

{{--TODO Boton de ir arriba en la vista de movil--}}
{{--TODO Incluir las etiquetas SEO q se entregaron en los metas del sitio asi como los clasicos de title, autor u otros--}}

{{--TODO OK Gestionar el contenido de testimonials editar y eliminar. Se mostraran los 10 ultimos--}}
{{--TODO OK Terminar de adicionar visualmente los testimonios--}}

{{--TODO (Falta ver como vamos a gestionar los nuevos mensajes visualmente... yo tengo la idea de la campanita clasica mas menos algo parecido a eso) En la vista de contacts hacer el backend del contact me--}}

{{--TODO OK Terminar la parte de guides visual--}}
{{--TODO Terminar la parte de guides lo de mandar el correo--}}

{{--TODO OK Poder visualizar todos los correos usados tanto en guides como en contact me--}}

{{--TODO Buscar los iconos del admin.index para los nuevos y revisar los viejos--}}

{{--TODO Revisar todo el proyecto principalmente las imagenes y el paralax en los 3 modos--}}
{{--TODO Revisar todos los TODOs--}}

@extends('layouts.app')

@section('title', __('app.home'))

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @php
        $inHome = true;
    @endphp

    @include('partials.slider')

    {{--Section 0--}}
    <div class="home-section-menu hiden-pc">

        <div class="lang-{{App::getLocale()}}">
            <a class="lang-en"
               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
               href="{{route(Route::currentRouteName(),["en"])}}">ENG</a>
            /
            <a class="lang-es"
               style="font-size: 9px; font-family: 'SinkinSans-500Medium';"
               href="{{route(Route::currentRouteName(),["es"])}}">ESP</a>
        </div>

        <div>
            <a class="hvr-underline-from-center" href="{{Route("neighborhoods")}}">@lang('app.neighborhoods')</a>
        </div>
        <div>
            <a class="hvr-underline-from-center" href="{{Route("guides")}}">@lang('app.guides')</a>
        </div>
        <div>
            <a class="hvr-underline-from-center" href="{{Route("about")}}">@lang('app.aboutMe')</a>
        </div>
        <div>
            <a class="hvr-underline-from-center" href="{{Route("contacts")}}">@lang('app.contact')</a>
        </div>

    </div>
    @php $even = false;
    @endphp

    @foreach ($promotions as $p)
        @php $even = !$even;
        @endphp
        <div class="promotion">
            <div class="promotion-background" style="width: 100%; height: 100%; background-size: cover; background-position: center center;" data-image-lg="{{$p->ImageLgPath}}" data-image-md="{{$p->ImageMdPath}}" data-image-sm="{{$p->ImageSmPath}}"></div>
            <div class="promotion-text {{$even?"light":"dark"}}-gray-block">
                <h1 class="" style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>
                <p class="color-white">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>
                <div class="">
                    <a href="{{$p->link}}" class="btn btn-white">{{__('app.learn_more')}}</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    @endforeach

    {{--Section 3--}}
    <div class="home-section-3 row" style="margin: 0">
        @foreach ($promotionsSecond as $p)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <h1 style="margin-bottom: 15px;">{{ App::getLocale()=="es"? $p->title_es : $p->title_en }}</h1>
                <p class="color-gray">{{ App::getLocale()=="es"? $p->text_es : $p->text_en }}</p>
                <a href="{{$p->link}}" class="btn btn-gray">{{__('app.learn_more')}}</a>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/views/home.js') }} " defer></script>
@endpush

