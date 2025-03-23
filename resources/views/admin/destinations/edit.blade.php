@extends('theme.default')

@section('heading')
Edit Destination
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Edit Destination
        </div>
        <div class="card-body">
            <form action="{{ route('destinations.update' , $destination->slug) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $destination->name }}" autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="description_{{ $locale }}" class="col-md-4 col-form-label text-md-right">Description ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="description_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.description') is-invalid @enderror"
                                name="translations[{{ $locale }}][description]">{{ $destination->translate($locale)->description ?? '' }}</textarea>

                            @error("translations.{{ $locale }}.description")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach


                <div class="form-group row">
                    <label for="photo" class="col-md-4 col-form-label text-md-right">Destination image</label>

                    <div class="col-md-6">
                        <input id="photo" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" autocomplete="photo">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="photo-thumb" class="img-fluid img-thumbnail" src="{{asset('storage/' . $destination->photo)}}">
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
