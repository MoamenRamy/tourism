<div id="vehicle-{{ $index }}">

    <div class="form-group row">
        <label for="vehicle_id" class="col-md-4 col-form-label">Vehicle</label>
        <div class="col-md-6">
            <select id="vehicle_id" class="form-control" name="vehicles[{{ $index }}][id]">
                <option value="" disabled>-- Please select a vehicle --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}"
                        {{ old("vehicles.{$index}.id") == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->model }}
                    </option>
                @endforeach
            </select>
            @error("vehicles.$index.price")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label">Price</label>
        <div class="col-md-6">
            <input class="form-control" name="vehicles[{{ $index }}][price]"
                   value="{{ old("vehicles.{$index}.price") }}">
            @error("vehicles.{$index}.price")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Remove Button -->
    <button type="button" class="btn btn-danger remove-vehicle-btn" data-index="{{ $index }}">Remove</button>
    <hr>
</div>
