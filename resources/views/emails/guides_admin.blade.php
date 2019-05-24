<p> {{ $email }} {{ __('app.new_download_body') }}</p>
@foreach($guides as $guide)
    <h4>
        <a href="{{ url(App::getLocale()=="es"? $guide->GuideEsPath : $guide->GuideEnPath)}}">
            {{App::getLocale()=="es"? $guide->text_es : $guide->text_en}}
            <br>
        </a>
    </h4>
@endforeach