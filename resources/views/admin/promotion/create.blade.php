@extends("layouts.admin")

@section("title", __('app.create_promo'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{route("promotion.index", [App::getLocale()])}}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('app.create_promo') }}</div>

                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data" action="{{route("promotion.store", [App::getLocale()])}}" aria-label="{{ __('auth.create_promo') }}">
                            @csrf
                            <input name="type" type="hidden" value="{{$type}}"/>
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
                                <label for="text_en" class="col-md-3 col-form-label text-md-right">{{ __('app.text_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="text_en" type="text" class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}" name="text_en" value="{{ old('text_en') }}" rows="5" required></textarea>
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
                                    <textarea id="text_es" type="text" class="form-control{{ $errors->has('text_es') ? ' is-invalid' : '' }}" name="text_es" value="{{ old('text_es') }}" rows="5" required></textarea>
                                    @if ($errors->has('text_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="link" class="col-md-3 col-form-label text-md-right">{{ __('app.link') }}</label>

                                <div class="col-md-9">
                                    <input id="link" type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if($type=="main")
                                <div class="form-group row">
                                    <label for="image_lg" class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.image_lg') }}</label>
    
                                    <div class="col-md-9">
                                        <input id="image_lg" type="file" class="form-control{{ $errors->has('image_lg') ? ' is-invalid' : '' }}" name="image_lg" value="{{ old('image_lg') }}" required autofocus>
    
                                        @if ($errors->has('image_lg'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_lg') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image_md" class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.image_md') }}</label>

                                    <div class="col-md-9">
                                        <input id="image_md" type="file" class="form-control{{ $errors->has('image_md') ? ' is-invalid' : '' }}" name="image_md" value="{{ old('image_md') }}" required autofocus>

                                        @if ($errors->has('image_md'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_md') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image_sm" class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.image_sm') }}</label>

                                    <div class="col-md-9">
                                        <input id="image_sm" type="file" class="form-control{{ $errors->has('image_sm') ? ' is-invalid' : '' }}" name="image_sm" value="{{ old('image_sm') }}" required autofocus>

                                        @if ($errors->has('image_sm'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_sm') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            @endif


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
                    <a class="btn btn-light btn-sm" href="{{route("promotion.index", [App::getLocale()])}}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection