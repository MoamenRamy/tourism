@extends('theme.default')

@section('heading')
Edit Safety
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Edit Safety
        </div>
        <div class="card-body">
            <form action="{{ route('safeties.update' , $safety->id) }}" method="POST">
                @method('patch')
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label text-md-right">name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="name_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]">{{ $safety->translate($locale)->name ?? '' }}</textarea>

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

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
