@extends('layouts.admin')

@section('title', __('app.config_logo'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>


                <div class="card">
                    <div class="card-header">{{ __('app.config_logo') }}</div>

                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data"
                              action="{{route("config.logo", [App::getLocale()])}}">
                            @csrf

                            <div class="form-group row">
                                <label for="logo_personal"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.logo_personal') }}</label>

                                <div class="col-md-9">
                                    <input id="logo_personal" type="file"
                                           class="form-control{{ $errors->has('logo_personal') ? ' is-invalid' : '' }}"
                                           name="logo_personal" value="{{ old('logo_personal') }}">

                                    @if ($errors->has('logo_personal'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo_personal') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3 offset-3">
                                    <img class="img-thumbnail" style="width: 100%; background-color: #cd3939"
                                         src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/personal.png')  }}?{{time()}}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo_company"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.logo_company') }}</label>

                                <div class="col-md-9">
                                    <input id="logo_company" type="file"
                                           class="form-control{{ $errors->has('logo_company') ? ' is-invalid' : '' }}"
                                           name="logo_company" value="{{ old('logo_company') }}">

                                    @if ($errors->has('logo_company'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo_company') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3 offset-3">
                                    <img class="img-thumbnail" style="width: 100%; background-color: #cd3939"
                                         src="{{ \Illuminate\Support\Facades\Storage::url('public/logo/company.png')  }}?{{time()}}"/>
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