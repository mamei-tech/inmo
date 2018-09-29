@extends("layouts.admin")

@section("title", __('app.edit_slider'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('app.edit_slider') }}</div>

                    <div class="card-body">

                        <div style="margin-bottom: 20px;">
                            <a href="{{route("slider.index", [App::getLocale()])}}">{{ __('app.back_to_list') }}</a>
                        </div>

                        <form method="post" enctype="multipart/form-data"
                              action="{{route("slider.update", [App::getLocale(), $slider->id])}}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="title_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.title_en') }}</label>

                                <div class="col-md-9">
                                    <input id="title_en" type="text"
                                           class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}"
                                           name="title_en" value="{{ $slider->title_en }}" required autofocus>

                                    @if ($errors->has('title_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.title_es') }}</label>

                                <div class="col-md-9">
                                    <input id="title_es" type="text"
                                           class="form-control{{ $errors->has('title_es') ? ' is-invalid' : '' }}"
                                           name="title_es" value="{{ $slider->title_es }}" required>

                                    @if ($errors->has('title_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.subtitle_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="subtitle_en" type="text"
                                              class="form-control{{ $errors->has('subtitle_en') ? ' is-invalid' : '' }}"
                                              name="subtitle_en" rows="5" required>{{ $slider->subtitle_en }}</textarea>
                                    @if ($errors->has('subtitle_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subtitle_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.subtitle_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="subtitle_es" type="text"
                                              class="form-control{{ $errors->has('subtitle_es') ? ' is-invalid' : '' }}"
                                              name="subtitle_es"  rows="5" required>{{ $slider->subtitle_es }}</textarea>
                                    @if ($errors->has('subtitle_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subtitle_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="image_lg"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.image_lg') }}</label>

                                <div class="col-md-9">
                                    <input id="image_lg" type="file"
                                           class="form-control{{ $errors->has('image_lg') ? ' is-invalid' : '' }}"
                                           name="image_lg" value="{{ old('image_lg') }}">

                                    @if ($errors->has('image_lg'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_lg') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div  class="form-group row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail" style="width: 100%" src="{{$slider->ImageLgPath  }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_md"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.image_md') }}</label>

                                <div class="col-md-9">
                                    <input id="image_md" type="file"
                                           class="form-control{{ $errors->has('image_md') ? ' is-invalid' : '' }}"
                                           name="image_md" value="{{ old('image_md') }}">

                                    @if ($errors->has('image_md'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_md') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div  class="form-group row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail" style="width: 100%" src="{{$slider->ImageMdPath  }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_sm"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.image_sm') }}</label>

                                <div class="col-md-9">
                                    <input id="image_sm" type="file"
                                           class="form-control{{ $errors->has('image_sm') ? ' is-invalid' : '' }}"
                                           name="image_sm" value="{{ old('image_sm') }}">

                                    @if ($errors->has('image_sm'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_sm') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div  class="form-group row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail" style="width: 100%" src="{{$slider->ImageSmPath  }}"/>
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('app.send') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection