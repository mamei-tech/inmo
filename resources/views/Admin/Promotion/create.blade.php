@extends("layouts.admin")

@section("title","@Crear promo")

@section("content")
    <div class="container">
        <h2>@Crear promocion </h2>
        <div> <a href="{{route("promotion.index", [App::getLocale()])}}">Volver a la lista</a> </div>
        <form action="{{route("promotion.store", [App::getLocale()])}}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="type" type="hidden" value="{{$type}}"/>
            <input name="title_es"/>
            <input name="title_en"/>
            <input name="text_es"/>
            <input name="text_en"/>
            <input name="link"/>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="" required="">

                </div>
            </div>
            @if($type=="main")
                <input type="file" name="image"/>
            @endif
            <button type="submit">@Enviar</button>
        </form>
    </div>
@endsection