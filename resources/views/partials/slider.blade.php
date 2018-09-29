<div id="myCarousel" class="carousel slide" data-ride="carousel">
    @php
        $first = true;
        $count = 0;
    @endphp

    <ol class="carousel-indicators">
        @foreach ($sliders as $s)
            <li data-target="#myCarousel" data-slide-to="{{$count }}" class="{{$first ? "active" : ""}}"></li>
            @php
                $first = false;
                $count++;
            @endphp
        @endforeach
    </ol>

    @php $first = true;
    @endphp

    <div class="carousel-inner">
        @foreach ($sliders as $s)
            <div class="carousel-item {{$first ? "active" : ""}}">
                <div style="background-size: cover; background-position: center center;" data-image-lg="{{$s->ImageLgPath}}" data-image-md="{{$s->ImageMdPath}}" data-image-sm="{{$s->ImageSmPath}}"
                     class="slide-item img-parallax"></div>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>{{ App::getLocale()=="es"? $s->title_es : $s->title_en }}</h1>
                        <h2 style="padding-top: 25px;">{{ App::getLocale()=="es"? $s->subtitle_es : $s->subtitle_en }}</h2>
                    </div>
                </div>
            </div>
            @php $first = false;
            @endphp
        @endforeach
    </div>
</div>



