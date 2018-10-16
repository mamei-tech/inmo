
<h3>@Descargar guias</h3>
@foreach($guides as $guide)
    <h4><a href="{{$guide->GuidePath}}">{{App::getLocale()=="es"? $guide->text_es : $guide->text_en}} </a></h4>
@endforeach