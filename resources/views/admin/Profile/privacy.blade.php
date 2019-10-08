@extends("layouts.admin")

@section("title", __('app.privacy'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('app.privacy') }}</div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{route("privacy.update", [App::getLocale(), $profile->id])}}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="privacy_es"
                                       class="col-md-4 col-form-label text-md-right">{{ __('app.privacy_es') }}</label>

                                <div class="col-md-8">
                                    <textarea id="privacy_es" type="text"
                                              class="form-control{{ $errors->has('privacy_es') ? ' is-invalid' : '' }}"
                                              name="privacy_es"  rows="5" required>{{ $profile->privacy_es }}</textarea>
                                    @if ($errors->has('privacy_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('privacy_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="privacy_en"
                                       class="col-md-4 col-form-label text-md-right">{{ __('app.privacy_en') }}</label>

                                <div class="col-md-8">
                                    <textarea id="privacy_en" type="text"
                                              class="form-control{{ $errors->has('privacy_en') ? ' is-invalid' : '' }}"
                                              name="privacy_en"  rows="5" required>{{ $profile->privacy_en }}</textarea>
                                    @if ($errors->has('privacy_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('privacy_en') }}</strong>
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
                    <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection