@extends('theme.default')

@section('heading')
Add Transportation Common Question
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Add Transportation Common Question
        </div>
        <div class="card-body">
            <form action="{{ route('transportation_questions.store') }}" method="POST">
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="question_{{ $locale }}" class="col-md-4 col-form-label text-md-right">Question ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="question_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.question') is-invalid @enderror"
                                name="translations[{{ $locale }}][question]"></textarea>

                            @error("translations.{{ $locale }}.question")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="answer_{{ $locale }}" class="col-md-4 col-form-label text-md-right">Answer ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="answer_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.answer') is-invalid @enderror"
                                name="translations[{{ $locale }}][answer]"></textarea>

                            @error("translations.{{ $locale }}.answer")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                @endforeach

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
