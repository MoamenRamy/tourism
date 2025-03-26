@extends('theme.default')

@section('heading')
Add Currency
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Add Currency
        </div>
        <div class="card-body">
            <form action="{{ route('currencies.store') }}" method="POST">
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label ">Name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="name_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]"
                                autocomplete="name">

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label ">Code</label>

                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" autocomplete="code">

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="symbol" class="col-md-4 col-form-label ">Symbol</label>

                    <div class="col-md-6">
                        <input id="symbol" type="text" class="form-control @error('symbol') is-invalid @enderror" name="symbol" autocomplete="symbol">

                        @error('symbol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exchange_rate" class="col-md-4 col-form-label ">Exchange Rate</label>

                    <div class="col-md-6">
                        <input id="exchange_rate" type="text" class="form-control @error('exchange_rate') is-invalid @enderror" name="exchange_rate" autocomplete="exchange_rate">

                        @error('exchange_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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
