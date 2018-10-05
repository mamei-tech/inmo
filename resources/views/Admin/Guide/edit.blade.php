@extends("layouts.admin")

@section("title", __('app.edit_guide'))

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('app.edit_guide') }}</div>

                    <div class="card-body">

                        <div style="margin-bottom: 20px;">
                            <a href="{{route("guide.index_admin", [App::getLocale()])}}">{{ __('app.back_to_list') }}</a>
                        </div>

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
                                <label for="guide"
                                       class="col-md-3 col-form-label text-md-right">{{ __('app.guide') }}</label>

                                <div class="col-md-9">
                                    <input id="guide" type="file"
                                           class="form-control{{ $errors->has('guide') ? ' is-invalid' : '' }}"
                                           name="guide" value="{{ old('guide') }}">

                                    @if ($errors->has('guide'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guide') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div  class="form-group row">
                                <div class="offset-3 col-md-9">
                                    <a href="{{ $guide->GuidePath  }}" style="width: 100%">{{ __('app.show_guide') }}</a>
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