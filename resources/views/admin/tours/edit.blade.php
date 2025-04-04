@extends('theme.default')

@section('heading')
Edit Tour
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Tour
        </div>
        <div class="card-body">
            <form action="{{ route('tours.update' , $tour->slug) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label ">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $tour->title }}" autocomplete="title">

                        @error('title')
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
                                value="{{ $tour->translate($locale)->name ?? '' }}"
                                autocomplete="name">

                            @error("translations.{{ $locale }}.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="defination_{{ $locale }}" class="col-md-4 col-form-label ">Defination ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <textarea id="defination_{{ $locale }}"
                                class="form-control @error('translations.{{ $locale }}.defination') is-invalid @enderror"
                                name="translations[{{ $locale }}][defination]">{{ $tour->translate($locale)->defination ?? '' }}</textarea>

                            @error("translations.{{ $locale }}.defination")
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
                                name="translations[{{ $locale }}][description]">{{ $tour->translate($locale)->description ?? '' }}</textarea>

                            @error("translations.{{ $locale }}.description")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach
{{--
                <div class="form-group row">
                    <label for="destination_id" class="col-md-4 col-form-label">Destination</label>

                    <div class="col-md-6">
                        <select id="destination_id" class="form-control" name="destination_id">
                            <option disabled {{$tour->destination_id == null ? "selected" : ""}}>choose destination</option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}" {{$tour->destination_id == $destination->id ? "selected" : ""}}>{{ $destination->name }}</option>
                            @endforeach
                        </select>
                        @error('destination')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label">Category</label>

                    <div class="col-md-6">
                        <select id="category_id" class="form-control" name="category_id">
                            <option disabled {{$tour->category_id == null ? "selected" : ""}}>choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{$tour->category_id == $category->id ? "selected" : ""}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="destination_id" class="col-md-4 col-form-label">Destination</label>

                    <div class="col-md-6">
                        <select id="destination_id" class="form-control" name="destination_id">
                            <option value="" disabled {{ $tour->destination_id == null ? "selected" : "" }}>
                                -- Please select a destination --
                            </option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                        {{ $tour->destination_id == $destination->id ? "selected" : "" }}>
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('destination_id')  <!-- Fixed incorrect error key -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label">Category</label>

                    <div class="col-md-6">
                        <select id="category_id" class="form-control" name="category_id">
                            <option value="" disabled {{ $tour->category_id == null ? "selected" : "" }}>
                                -- Please select a category --
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ $tour->category_id == $category->id ? "selected" : "" }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')  <!-- Fixed incorrect error key -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $tour->price }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duration" class="col-md-4 col-form-label">Duration</label>

                    <div class="col-md-6">
                        <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ $tour->duration }}" autocomplete="duration">

                        @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="duration_type" class="col-md-4 col-form-label">Duration type</label>

                    <div class="col-md-6">
                        <select id="duration_type" class="form-control" name="duration_type">
                            <option value="" disabled>Choose duration type</option>
                            <option value="hours" {{ old('duration_type', $tour->duration_type ?? '') == 'hours' ? 'selected' : '' }}>Hours</op+tion>
                            <option value="days" {{ old('duration_type', $tour->duration_type ?? '') == 'days' ? 'selected' : '' }}>Days</option>
                        </select>
                        @error('duration_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rating" class="col-md-4 col-form-label">Rating</label>

                    <div class="col-md-6">
                        <input id="rating" type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ $tour->rating }}" autocomplete="rating">

                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="available" class="col-md-4 col-form-label">Available</label>

                    <div class="col-md-6">
                        <input type="hidden" name="available" value="0">
                        <input id="available" type="checkbox" class="@error('available') is-invalid @enderror" name="available" value="1" {{ $tour->available ? 'checked' : '' }}>
                        @error('available')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="additional_info" class="col-md-4 col-form-label ">Additional info</label>
                    <div class="col-md-6">
                        <textarea id="additional_info"
                            class="form-control @error('additional_info') is-invalid @enderror"
                            name="additional_info">{{ $tour->additional_info ?? '' }}</textarea>

                        @error("additional_info")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="max_tickets_per_day" class="col-md-4 col-form-label">Max tickets per day</label>

                    <div class="col-md-6">
                        <input id="max_tickets_per_day" type="number" class="form-control @error('max_tickets_per_day') is-invalid @enderror" name="max_tickets_per_day" value="{{ $tour->max_tickets_per_day }}" autocomplete="max_tickets_per_day">

                        @error('max_tickets_per_day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longitude" class="col-md-4 col-form-label">Longitude</label>

                    <div class="col-md-6">
                        <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ $tour->longitude }}" autocomplete="longitude">

                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="latitude" class="col-md-4 col-form-label">Latitude</label>

                    <div class="col-md-6">
                        <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ $tour->latitude }}" autocomplete="latitude">

                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="count" class="col-md-4 col-form-label">Count</label>

                    <div class="col-md-6">
                        <input id="count" type="number" class="form-control @error('count') is-invalid @enderror" name="count" value="{{ $tour->count }}" autocomplete="count">

                        @error('count')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pin" class="col-md-4 col-form-label">Pin</label>

                    <div class="col-md-6">
                        <input type="hidden" name="pin" value="0">
                        <input id="pin" type="checkbox" class="@error('pin') is-invalid @enderror" name="pin" value="1" {{ $tour->pin ? 'checked' : '' }}>
                        @error('pin')
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
