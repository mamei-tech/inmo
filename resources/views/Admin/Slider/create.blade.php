@extends("layouts.admin")

@section("title", __('app.create_slider'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('app.create_slider') }}</div>

                    <div class="card-body">

                        <div style="margin-bottom: 20px;">
                            <a href="{{route("slider.index", [App::getLocale()])}}">{{ __('app.back_to_list') }}</a>
                        </div>

                        <form method="POST" enctype="multipart/form-data" action="{{route("slider.store", [App::getLocale()])}}">
                            @csrf

                            <div class="form-group row">
                                <label for="title_en" class="col-md-3 col-form-label text-md-right">{{ __('app.title_en') }}</label>

                                <div class="col-md-9">
                                    <input id="title_en" type="text" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en" value="{{ old('title_en') }}" required autofocus>

                                    @if ($errors->has('title_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title_es" class="col-md-3 col-form-label text-md-right">{{ __('app.title_es') }}</label>

                                <div class="col-md-9">
                                    <input id="title_es" type="text" class="form-control{{ $errors->has('title_es') ? ' is-invalid' : '' }}" name="title_es" value="{{ old('title_es') }}" required>

                                    @if ($errors->has('title_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle_en" class="col-md-3 col-form-label text-md-right">{{ __('app.subtitle_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="subtitle_en" type="text" class="form-control{{ $errors->has('subtitle_en') ? ' is-invalid' : '' }}" name="subtitle_en" value="{{ old('subtitle_en') }}" rows="5" required></textarea>
                                    @if ($errors->has('subtitle_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subtitle_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle_es" class="col-md-3 col-form-label text-md-right">{{ __('app.subtitle_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="subtitle_es" type="text" class="form-control{{ $errors->has('subtitle_es') ? ' is-invalid' : '' }}" name="subtitle_es" value="{{ old('subtitle_es') }}" rows="5" required></textarea>
                                    @if ($errors->has('subtitle_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subtitle_es') }}</strong>
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
            </div>
        </div>
    </div>
@endsection