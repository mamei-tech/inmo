<h3>{{__("app.download_guides")}}</h3>
@foreach($guides as $guide)
    <h4>
        <a href="{{ url(App::getLocale()=="es"? $guide->GuideEsPath : $guide->GuideEnPath)}}">
            {{App::getLocale()=="es"? $guide->text_es : $guide->text_en}}
        </a>
    </h4>
@endforeach