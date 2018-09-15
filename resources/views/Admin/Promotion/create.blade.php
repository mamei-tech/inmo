@extends("layouts.admin")

@section("title", __('app.create_promo'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('app.create_promo') }}</div>

                    <div class="card-body">

                        <div>
                            <a href="{{route("promotion.index", [App::getLocale()])}}">{{ __('app.back_to_list') }}</a>
                        </div>

                        <form method="POST" enctype="multipart/form-data" action="{{route("promotion.store", [App::getLocale()])}}" aria-label="{{ __('auth.create_promo') }}">
                            @csrf
                            <input name="type" type="hidden" value="{{$type}}"/>
                            <div class="form-group row">
                                <label for="title_en" class="col-md-4 col-form-label text-md-right">{{ __('app.title_en') }}</label>

                                <div class="col-md-6">
                                    <input id="title_es" type="text" class="form-control{{ $errors->has('title_es') ? ' is-invalid' : '' }}" name="title_en" value="{{ old('title_es') }}" required autofocus>

                                    @if ($errors->has('title_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title_es" class="col-md-4 col-form-label text-md-right">{{ __('app.title_es') }}</label>

                                <div class="col-md-6">
                                    <input id="title_es" type="text" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_es" value="{{ old('title_en') }}" required autofocus>

                                    @if ($errors->has('title_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_es" class="col-md-4 col-form-label text-md-right">{{ __('app.text_es') }}</label>

                                <div class="col-md-6">
                                    <input id="text_es" type="text" class="form-control{{ $errors->has('text_es') ? ' is-invalid' : '' }}" name="text_es" value="{{ old('text_es') }}" required autofocus>

                                    @if ($errors->has('text_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_en" class="col-md-4 col-form-label text-md-right">{{ __('app.text_en') }}</label>

                                <div class="col-md-6">
                                    <input id="text_en" type="text" class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}" name="text_en" value="{{ old('text_en') }}" required autofocus>

                                    @if ($errors->has('text_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('app.link') }}</label>

                                <div class="col-md-6">
                                    <input id="link" type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required autofocus>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if($type=="main")
                                <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('app.image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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