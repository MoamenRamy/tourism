@extends('theme.default')

@section('heading')
Add Transportation
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add Transportation
        </div>
        <div class="card-body">
            <form action="{{ route('transportations.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="destination_id" class="col-md-4 col-form-label">Destination</label>

                    <div class="col-md-6">
                        <select id="destination_id" class="form-control" name="destination_id">
                            <option value="" disabled>
                                -- Please select a destination --
                            </option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('destination_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="from_{{ $locale }}" class="col-md-4 col-form-label ">From ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="from_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.from') is-invalid @enderror"
                                name="translations[{{ $locale }}][from]"
                                value="{{ old('translations.' . $locale . '.from') }}" autocomplete="from">

                            @error("translations.{{ $locale }}.from")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="to_{{ $locale }}" class="col-md-4 col-form-label ">To ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="to_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.to') is-invalid @enderror"
                                name="translations[{{ $locale }}][to]"
                                value="{{ old('translations.' . $locale . '.to') }}" autocomplete="to">

                            @error("translations.{{ $locale }}.to")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                {{-- <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label ">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                {{-- <div class="form-group row">
                    <label for="vehicle_id" class="col-md-4 col-form-label">Vehicle</label>

                    <div class="col-md-6">
                        <select id="vehicle_id" class="form-control" name="vehicle_id">
                            <option value="" disabled>
                                -- Please select a vehicle --
                            </option>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}"
                                    {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                    {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="available" class="col-md-4 col-form-label">Available</label>

                    <div class="col-md-6">
                        <input type="hidden" name="available" value="0">
                        <input id="available" type="checkbox"
                               class="@error('available') is-invalid @enderror"
                               name="available"
                               value="1"
                               {{ old('available', '1') == '1' ? 'checked' : '' }}>
                        @error('available')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- vehicles Section -->
                <hr>
                <h4>Vehicles</h4>
                <div id="vehicles-container">
                    <!-- Details will be added here dynamically -->
                </div>
                <button class="btn btn-success" type="button" id="add-vehicle-btn"><i class="fas fa-plus"></i> Add Vehicle</button>
                <br><br>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        let detailIndex = 0;

        $('#add-vehicle-btn').click(function () {
            // console.log("Add Vehicle clicked"); // Debug
            $.ajax({
                url: '{{ route("vehicleInputs.create") }}',
                method: 'GET',
                data: { index: detailIndex },
                success: function (html) {
                    $('#vehicles-container').append(html);
                    detailIndex++;
                },
                // error: function (xhr) {
                //     console.error("Error: ", xhr.responseText); // Debug error
                // }
            });
        });

        $(document).on('click', '.remove-vehicle-btn', function() {
            var index = $(this).data('index');
            $('#vehicle-' + index).remove();
        });
    });
</script>

@endsection
