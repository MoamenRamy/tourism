@extends('theme.default')

@section('heading')
Edit Transportation Additional Service
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Edit Transportation Additional Service
        </div>
        <div class="card-body">
            <form action="{{ route('transportation_additional.update' , $transportationAdditional->id) }}" method="POST">
                @method('patch')
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label ">Name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="name_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]"
                                value="{{ $transportationAdditional->translate($locale)->name ?? '' }}"
                                autocomplete="name">

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_{{ $locale }}" class="col-md-4 col-form-label ">Description ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="description_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.description') is-invalid @enderror"
                                name="translations[{{ $locale }}][description]">{{ $transportationAdditional->translate($locale)->description ?? '' }}</textarea>

                            @error("translations.{{ $locale }}.description")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach


                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label ">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $transportationAdditional->price }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
