@extends("layouts.admin")

@section("title", __("auth.ChangePassword"))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('auth.ChangePassword') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route("password.set", [App::getLocale()])}}">
                            @csrf
                            <div class="form-group row">
                                <label for="old_password"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.old_password') }}</label>

                                <div class="col-md-9">
                                    <input id="old_password" type="password"
                                           class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                           name="old_password"  value="{{ old('old_password') }}">

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.new_password') }}</label>

                                <div class="col-md-9">
                                    <input id="new_password" type="password"
                                           class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                           name="new_password"  value="{{ old('new_password') }}">

                                    @if ($errors->has('new_password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password_confirmation"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.new_password_confirmation') }}</label>

                                <div class="col-md-9">
                                    <input id="new_password_confirmation" type="password"
                                           class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}"
                                           name="new_password_confirmation" value="{{ old('new_password_confirmation') }}">

                                    @if ($errors->has('new_password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-4">
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