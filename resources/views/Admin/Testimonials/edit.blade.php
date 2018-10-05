@extends("layouts.admin")

@section("title", __('app.edit_testimonials'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('app.edit_testimonials') }}</div>

                    <div class="card-body">

                        <div style="margin-bottom: 20px;">
                            <a href="{{route("testimonials.index", [App::getLocale()])}}">{{ __('app.back_to_list') }}</a>
                        </div>

                        <form method="post" enctype="multipart/form-data"
                              action="{{route("testimonials.update", [App::getLocale(), $testimonials->id])}}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.name') }}</label>

                                <div class="col-md-9">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ $testimonials->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="testimonials"
                                       class="col-md-3 col-form-label text-md-right">{{ __('validation.attributes.testimonials') }}</label>

                                <div class="col-md-9">
                                    <textarea id="testimonials" type="text"
                                              class="form-control{{ $errors->has('testimonials') ? ' is-invalid' : '' }}"
                                              name="testimonials" rows="5" required>{{ $testimonials->testimonials }}</textarea>
                                    @if ($errors->has('testimonials'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('testimonials') }}</strong>
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