@extends("layouts.admin")

@section("title", __('app.create_guide'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{route("guide.index_admin", [App::getLocale()])}}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('app.create_guide') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route("guide.store", [App::getLocale()])}}">
                            @csrf

                            <div class="form-group row">
                                <label for="text_en" class="col-md-3 col-form-label text-md-right">{{ __('app.text_en') }}</label>

                                <div class="col-md-9">
                                    <input id="text_en" type="text" class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}" name="text_en" value="{{ old('text_en') }}" required autofocus>

                                    @if ($errors->has('text_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_es" class="col-md-3 col-form-label text-md-right">{{ __('app.text_es') }}</label>

                                <div class="col-md-9">
                                    <input id="text_es" type="text" class="form-control{{ $errors->has('text_es') ? ' is-invalid' : '' }}" name="text_es" value="{{ old('text_es') }}" required>

                                    @if ($errors->has('text_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description_en" class="col-md-3 col-form-label text-md-right">{{ __('app.description_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="description_en" type="text" class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}" name="description_en" value="{{ old('description_en') }}" required autofocus></textarea>

                                    @if ($errors->has('description_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description_es" class="col-md-3 col-form-label text-md-right">{{ __('app.description_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="description_es" type="text" class="form-control{{ $errors->has('description_es') ? ' is-invalid' : '' }}" name="description_es" value="{{ old('description_es') }}" required autofocus></textarea>

                                    @if ($errors->has('description_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="guideEs" class="col-md-3 col-form-label text-md-right">{{ __('app.guide_es') }}</label>

                                <div class="col-md-9">
                                    <input id="guideEs" type="file" class="form-control{{ $errors->has('guideEs') ? ' is-invalid' : '' }}" name="guideEs" value="{{ old('guideEs') }}" required autofocus>

                                    @if ($errors->has('guideEs'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guideEs') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guideEn" class="col-md-3 col-form-label text-md-right">{{ __('app.guide_en') }}</label>

                                <div class="col-md-9">
                                    <input id="guideEn" type="file" class="form-control{{ $errors->has('guideEn') ? ' is-invalid' : '' }}" name="guideEn" value="{{ old('guideEn') }}" required autofocus>

                                    @if ($errors->has('guideEn'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guideEn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('app.image') }}</label>

                                <div class="col-md-9">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
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