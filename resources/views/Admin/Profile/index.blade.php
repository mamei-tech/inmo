@extends("layouts.admin")

@section("title", __('app.profile'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div style="margin-bottom: 20px;">
                    <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('app.profile') }}</div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{route("profile.update", [App::getLocale(), $profile->id])}}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="bio_es"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.bio_es') }}</label>

                                <div class="col-md-9">
                                    <textarea id="bio_es" type="text"
                                              class="form-control{{ $errors->has('bio_es') ? ' is-invalid' : '' }}"
                                              name="bio_es"  rows="5" required>{{ $profile->bio_es }}</textarea>
                                    @if ($errors->has('bio_es'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio_es') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bio_en"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.bio_en') }}</label>

                                <div class="col-md-9">
                                    <textarea id="bio_en" type="text"
                                              class="form-control{{ $errors->has('bio_en') ? ' is-invalid' : '' }}"
                                              name="bio_en"  rows="5" required>{{ $profile->bio_en }}</textarea>
                                    @if ($errors->has('bio_en'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio_en') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $profile->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site_web"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.site_web') }}</label>

                                <div class="col-md-9">
                                    <input id="site_web" type="text"
                                           class="form-control{{ $errors->has('site_web') ? ' is-invalid' : '' }}"
                                           name="site_web" value="{{ $profile->site_web }}" required>

                                    @if ($errors->has('site_web'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('site_web') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.phone') }}</label>

                                <div class="col-md-9">
                                    <input id="phone" type="text"
                                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           name="phone" value="{{ $profile->phone }}" required >

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.address') }}</label>

                                <div class="col-md-9">
                                    <input id="address" type="text"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{ $profile->address }}" required >

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link_facebook"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.link_facebook') }}</label>

                                <div class="col-md-9">
                                    <input id="link_facebook" type="url"
                                           class="form-control{{ $errors->has('link_facebook') ? ' is-invalid' : '' }}"
                                           name="link_facebook" value="{{ $profile->link_facebook }}" required >

                                    @if ($errors->has('link_facebook'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link_facebook') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link_instagram"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.link_instagram') }}</label>

                                <div class="col-md-9">
                                    <input id="link_instagram" type="url"
                                           class="form-control{{ $errors->has('link_instagram') ? ' is-invalid' : '' }}"
                                           name="link_instagram" value="{{ $profile->link_instagram }}" required >

                                    @if ($errors->has('link_instagram'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link_instagram') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link_in"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.link_in') }}</label>

                                <div class="col-md-9">
                                    <input id="link_in" type="url"
                                           class="form-control{{ $errors->has('link_in') ? ' is-invalid' : '' }}"
                                           name="link_in" value="{{ $profile->link_in }}" required >

                                    @if ($errors->has('link_in'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link_in') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link_youtube"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.link_youtube') }}</label>

                                <div class="col-md-9">
                                    <input id="link_youtube" type="url"
                                           class="form-control{{ $errors->has('link_youtube') ? ' is-invalid' : '' }}"
                                           name="link_youtube" value="{{ $profile->link_youtube }}" required >

                                    @if ($errors->has('link_youtube'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link_youtube') }}</strong>
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