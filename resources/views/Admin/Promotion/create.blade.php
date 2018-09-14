@extends("layouts.admin")

@section("content")
    <div class="container">
        <h2>Crear promocion {{$type}} </h2>
        <div> <a href="{{route("promotion.index", [App::getLocale()])}}">Volver a la lista</a> </div>
        <form action="{{route("promotion.store", [App::getLocale()])}}" method="post">
            @csrf
            <input name="title_es"/>
            <input name="title_en"/>
            <input name="text_es"/>
            <input name="text_en"/>
            <input name="link"/>
            @if($type=="main")
                <input name="image"/>
            @endif
            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection