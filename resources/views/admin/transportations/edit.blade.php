@extends('theme.default')

@section('heading')
Edit Transportation
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Transportation
        </div>
        <div class="card-body">
            <form action="{{ route('transportations.update', $transportation) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="destination_id" class="col-md-4 col-form-label">Destination</label>

                    <div class="col-md-6">
                        <select id="destination_id" class="form-control" name="destination_id">
                            <option value="" disabled {{ $transportation->destination_id == null ? "selected" : "" }}>
                                -- Please select a destination --
                            </option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                        {{ $transportation->destination_id == $destination->id ? "selected" : "" }}>
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

                @foreach(config('app.available_locales') as $locale)
                    <div class="form-group row">
                        <label for="from_{{ $locale }}" class="col-md-4 col-form-label ">From ({{ strtoupper($locale) }})</label>
                        <div class="col-md-6">
                            <input id="from_{{ $locale }}" type="text"
                                class="form-control @error('translations.{{ $locale }}.from') is-invalid @enderror"
                                name="translations[{{ $locale }}][from]"
                                value="{{ $transportation->translate($locale)->from ?? '' }}"
                                autocomplete="from">

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
                                value="{{ $transportation->translate($locale)->to ?? '' }}"
                                autocomplete="to">

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
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $transportation->price }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vehicle_id" class="col-md-4 col-form-label">Vehicle</label>

                    <div class="col-md-6">
                        <select id="vehicle_id" class="form-control" name="vehicle_id">
                            <option value="" disabled {{ $transportation->vehicle_id == null ? "selected" : "" }}>
                                -- Please select a vehicle --
                            </option>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}"
                                        {{ $transportation->vehicle_id == $vehicle->id ? "selected" : "" }}>
                                    {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')  <!-- Fixed incorrect error key -->
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

                @if($transportation->vehicles->isNotEmpty())
                    <h5 class="mt-4">Old Vehicles</h5>
                    <ul class="list-group mb-4">
                        @foreach($transportation->vehicles as $vehicle)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p>Name : {{ $vehicle->name }}</p>
                                    <p>Model : {{ $vehicle->model }}</p>
                                    <p>Year :{{ $vehicle->year }}</p>
                                    <p>Car Load : {{ $vehicle->car_load }}</p>
                                    <p>Price : {{ $vehicle->pivot->price }}</p>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger delete-vehicle-btn" data-id="{{ $vehicle->id }}">Delete</button>
                            </li>
                        @endforeach
                    </ul>
                @endif

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
                        <button type="submit" class="btn btn-primary">Edit</button>
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

<script>
    $(document).ready(function () {
        $('.delete-vehicle-btn').click(function () {
            let id = $(this).data('id'); // Get detail ID from button
            if (confirm('Are you sure you want to delete this vehicle?')) {
                $.ajax({
                    url: "{{ route('transportation_vehicle.destroy', ':id') }}".replace(':id', id),
                    type: 'POST',
                    data: {
                        _method: 'DELETE', // Laravel needs this to spoof DELETE
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        $('#vehicle-' + id).remove(); // Remove the detail from DOM
                        alert(response.message);
                    },
                    error: function () {
                        alert('There was an error while deleting the vehcile.');
                    }
                });
            }
        });
    });
</script>

@endsection
