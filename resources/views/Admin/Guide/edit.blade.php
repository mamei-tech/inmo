@extends("layouts.admin")

@section("title", __('app.edit_guide'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{route("guide.index_admin", [App::getLocale()])}}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('app.edit_guide') }}</div>

                    <div class="card-body">

                        <form method="post" enctype="multipart/form-data"
                              action="{{route("guide.update", [App::getLocale(), $guide->id])}}">
                            @method('PUT')
                            @csrf  

                            <div class="form-group row">
                                <label for="text_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.text_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="text_en" type="text"
                                              class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}"
                                              name="text_en" rows="5" required>{{ $guide->text_en }}</textarea>
                                    @if ($errors->has('text_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.text_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="text_es" type="text"
                                              class="form-control{{ $errors->has('text_es') ? ' is-invalid' : '' }}"
                                              name="text_es"  rows="5" required>{{ $guide->text_es }}</textarea>
                                    @if ($errors->has('text_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.description_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="description_en" type="text"
                                              class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}"
                                              name="description_en"  rows="5" required>{{ $guide->description_en }}</textarea>
                                    @if ($errors->has('description_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.description_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="description_es" type="text"
                                              class="form-control{{ $errors->has('description_es') ? ' is-invalid' : '' }}"
                                              name="description_es"  rows="5" required>{{ $guide->description_es }}</textarea>
                                    @if ($errors->has('description_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="guide_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.guide_es') }}</label>

                                <div class="col-md-9">
                                    <input id="guide_es" type="file"
                                           class="form-control{{ $errors->has('guide_es') ? ' is-invalid' : '' }}"
                                           name="guide_es" value="{{ old('guide_es') }}">

                                    @if ($errors->has('guide_es'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guide_es') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div  class="form-group row">
                                <div class="offset-3 col-md-9">
                                    <a href="{{ $guide->GuideEsPath  }}" style="width: 100%">{{ __('app.show_guide_es') }}</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guide_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.guide_en') }}</label>

                                <div class="col-md-9">
                                    <input id="guide_en" type="file"
                                           class="form-control{{ $errors->has('guide_en') ? ' is-invalid' : '' }}"
                                           name="guide_en" value="{{ old('guide_en') }}">

                                    @if ($errors->has('guide_en'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guide_en') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>


                            <div  class="form-group row">
                                <div class="offset-3 col-md-9">
                                    <a href="{{ $guide->GuideEnPath  }}" style="width: 100%">{{ __('app.show_guide_en') }}</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.image') }}</label>

                                <div class="col-md-9">
                                    <input id="image" type="file"
                                           class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           name="image" value="{{ old('image') }}">

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div  class="form-group row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail" style="width: 100%" src="{{$guide->imagePath  }}"/>
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

                <div style="margin-top: 20px;">
                    <a class="btn btn-light btn-sm" href="{{route("guide.index_admin", [App::getLocale()])}}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection