@extends('theme.default')

@section('heading')
Add Safety
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add Safety
        </div>
        <div class="card-body">
            <form action="{{ route('safeties.store') }}" method="POST">
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label">Name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="name_{{ $locale }}"
                                class="form-control @error('translations.'.$locale.'.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]">{{ old("translations.$locale.name") }}</textarea>

                            @error("translations.$locale.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
