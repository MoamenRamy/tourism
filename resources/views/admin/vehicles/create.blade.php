@extends('theme.default')

@section('heading')
Add Vehicle
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add Vehicle
        </div>
        <div class="card-body">
            <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="name_{{ $locale }}" class="col-md-4 col-form-label ">Name ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="name_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.name') is-invalid @enderror"
                                name="translations[{{ $locale }}][name]"
                                value="{{ old('translations.' . $locale . '.name') }}" autocomplete="name">

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="model_{{ $locale }}" class="col-md-4 col-form-label ">Model ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="model_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.model') is-invalid @enderror"
                                name="translations[{{ $locale }}][model]"
                                value="{{ old('translations.' . $locale . '.model') }}" autocomplete="model">

                            @error("translations.{{ $locale }}.model")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label ">Year</label>
                    <div class="col-md-6">
                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" autocomplete="year">

                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_load" class="col-md-4 col-form-label ">Car Load</label>
                    <div class="col-md-6">
                        <input id="car_load" type="text" class="form-control @error('car_load') is-invalid @enderror" name="car_load" value="{{ old('car_load') }}" autocomplete="car_load">

                        @error('car_load')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo" class="col-md-4 col-form-label ">Vehicle Image</label>
                    <div class="col-md-6">
                        <input id="photo" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" autocomplete="photo">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="photo-thumb" class="img-fluid img-thumbnail" src="{{ old('photo') ? asset('storage/' . old('photo')) : '' }}">
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

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#photo-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
