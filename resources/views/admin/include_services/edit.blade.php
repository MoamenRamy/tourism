@extends('theme.default')

@section('heading')
Edit Include Service
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Include Service
        </div>
        <div class="card-body">
            <form action="{{ route('include-services.update', $includeService->id) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="include" class="col-md-4 col-form-label">Include</label>

                    <div class="col-md-6">
                        <input type="hidden" name="include" value="0">
                        <input id="include" type="checkbox" class="@error('include') is-invalid @enderror" name="include" value="1" {{ $includeService->include ? 'checked' : '' }}>

                        @error('include')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label ">Name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="name_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]"
                                value="{{ $includeService->translate($locale)->name ?? '' }}" autocomplete="name">

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
