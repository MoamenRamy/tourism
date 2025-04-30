@extends('theme.default')

@section('heading')
Edit Tour
@endsection

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .photo-wrapper {
        position: relative;
    }

    .photo-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
    }

    .delete-photo-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: rgba(255, 0, 0, 0.8);
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 18px;
        line-height: 30px;
        text-align: center;
        cursor: pointer;
        display: none;
        z-index: 10;
    }

    .photo-wrapper:hover .delete-photo-btn {
        display: block;
    }
</style>

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Tour
        </div>
        <div class="card-body">
            <form action="{{ route('tours.update' , $tour->slug) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label ">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $tour->title }}" autocomplete="title" disabled>

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

                <hr>

                <div class="form-group row">
                    <label for="photos" class="col-form-label">Tour Photo</label>
                    <input type="file" name="photos[]" id="photos" class="form-control" multiple>
                    @if($tour->photos->isNotEmpty())
                    <div class="gallery row">
                        @foreach($tour->photos as $photo)
                            <div class="col-md-3 mb-3">
                                <div class="photo-wrapper" data-id="{{ $photo->id }}">
                                    <button type="button" class="delete-photo-btn" data-id="{{ $photo->id }}"><i class="fa fa-trash"></i></button>
                                    <img src="{{ Storage::url($photo->photo) }}" alt="Tour Photo" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-md-12 col-form-label mb-2">Include And Not Include Services</label>

                    <div class="col-md-6">
                    <label class="col-md-12 col-form-label mb-2">Include Services</label>
                        @foreach($includes as $include)
                            <div class="form-check mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="includes[]" value="{{ $include->id }}"
                                        class="form-check-input"
                                        {{ (is_array(old('includes')) && in_array($include->id, old('includes')))
                                            || (!old('includes') && $tour->includeServiceTours->pluck('id')->contains($include->id)) ? 'checked' : '' }}>
                                    {{ $include->name }} <span class="ms-2">{{ $include->price }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-6">
                    <label class="col-md-12 col-form-label mb-2">Not Include Services</label>
                        @foreach($notIncludes as $include)
                            <div class="form-check mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="includes[]" value="{{ $include->id }}"
                                        class="form-check-input"
                                        {{ (is_array(old('includes')) && in_array($include->id, old('includes')))
                                            || (!old('includes') && $tour->includeServiceTours->pluck('id')->contains($include->id)) ? 'checked' : '' }}>
                                    {{ $include->name }} <span class="ms-2">{{ $include->price }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-md-12 col-form-label mb-2">Addition Services</label>

                    <div class="col-md-6">
                        @foreach($additionals->slice(0, ceil($additionals->count() / 2)) as $additional)
                            <div class="form-check mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="additionals[]" value="{{ $additional->id }}"
                                        class="form-check-input"
                                        {{ (is_array(old('additionals')) && in_array($additional->id, old('additionals')))
                                            || (!old('additionals') && $tour->additionalServiceTours->pluck('id')->contains($additional->id)) ? 'checked' : '' }}>
                                    {{ $additional->name }} <span class="ms-2">{{ $additional->price }} $</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-6">
                        @foreach($additionals->slice(ceil($additionals->count() / 2)) as $additional)
                            <div class="form-check mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="additionals[]" value="{{ $additional->id }}"
                                        class="form-check-input"
                                        {{ (is_array(old('additionals')) && in_array($additional->id, old('additionals')))
                                            || (!old('additionals') && $tour->additionalServiceTours->pluck('id')->contains($additional->id)) ? 'checked' : '' }}>
                                    {{ $additional->name }} <span class="ms-2">{{ $additional->price }} $</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <hr>

                @if($tour->details->isNotEmpty())
                    <h5 class="mt-4">Old Tour Details</h5>
                    <ul class="list-group mb-4">
                        @foreach($tour->details as $detail)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p>
                                        duration : {{ $detail->duration }} {{$detail->duration_type}}
                                    </p>
                                    @foreach(config('app.available_locales') as $locale)
                                        <div class="">
                                            <p for="address_{{ $locale }}" class="">
                                                Address ({{ strtoupper($locale) }}) : {{$detail->translate($locale)->address}}
                                            </p>
                                        </div>

                                        <div class="">
                                            <p for="description_{{ $locale }}" class="">
                                                Description ({{ strtoupper($locale) }}) : {{$detail->translate($locale)->description}}
                                            </p>
                                        </div>
                                    @endforeach

                                </div>
                                <button type="button" class="btn btn-sm btn-danger delete-detail-btn" data-id="{{ $detail->id }}">Delete</button>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Tour Details Section -->
                <h4>Tour Details</h4>
                <div id="tour-details-container">
                    <!-- Details will be added here dynamically -->
                </div>

                <button type="button" class="btn btn-success" id="add-detail-btn"><i class="fas fa-plus"></i> Add Tour Detail</button>

                <br><br>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        let detailIndex = 0;

        $('#add-detail-btn').click(function () {
        $.ajax({
            url: '{{ route("tour-details.create") }}',
            method: 'GET',
            data: { index: detailIndex },
            success: function (html) {
                $('#tour-details-container').append(html);
                detailIndex++;
            }
        });
    });

    $(document).on('click', '.remove-detail-btn', function() {
        var index = $(this).data('index'); // Get the index from data-index attribute
        $('#detail-' + index).remove(); // Remove the form group with the corresponding index
        $(this).closest('#detail-block').remove(); // Optionally remove the "Remove" button itself (if desired)
    });
    });
</script>

<script>
    $(document).ready(function () {
        $('.delete-detail-btn').click(function () {
            let id = $(this).data('id'); // Get detail ID from button
            if (confirm('Are you sure you want to delete this detail?')) {
                $.ajax({
                    url: "{{ route('tour-details.destroy', ':id') }}".replace(':id', id),
                    type: 'POST',
                    data: {
                        _method: 'DELETE', // Laravel needs this to spoof DELETE
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        $('#detail-' + id).remove(); // Remove the detail from DOM
                        alert(response.message);
                    },
                    error: function () {
                        alert('There was an error while deleting the detail.');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.delete-photo-btn').click(function () {
            let photoId = $(this).data('id'); // Get photo ID from button
            let wrapper = $(this).closest('.photo-wrapper'); // Get the photo wrapper

            if (confirm('Are you sure you want to delete this photo?')) {
                $.ajax({
                    url: "{{ route('tour-photos.destroy', ':id') }}".replace(':id', photoId),
                    type: 'POST',
                    data: {
                        _method: 'DELETE', // Spoof DELETE method
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        wrapper.remove(); // Remove the image from DOM
                        alert(response.message || 'Photo deleted successfully.');
                    },
                    error: function () {
                        alert('There was an error while deleting the photo.');
                    }
                });
            }
        });
    });
</script>



@endsection

