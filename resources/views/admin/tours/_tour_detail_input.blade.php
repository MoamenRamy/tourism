<div id="detail-block">
    <div class="form-group row">
        <label for="duration" class="col-md-4 col-form-label">Duration</label>

        <div class="col-md-6">
            <input class="form-control" name="details[{{ $index }}][duration]" value="{{ old("details.{$index}.duration") }}" >

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
            <select class="form-control" name="details[{{ $index }}][duration_type]">
                <option value="" disabled>Choose duration type</option>
                <option value="hours" {{ old("details.{$index}.duration_type") == 'hours' ? 'selected' : '' }}>Hours</option>
                <option value="days" {{ old("details.{$index}.duration_type") == 'days' ? 'selected' : '' }}>Days</option>
            </select>
            @error('duration_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

        @foreach(config('app.available_locales') as $locale)

        <!-- Description Translations -->
        <div class="form-group row">
            <label for="description_{{ $locale }}" class="col-md-4 col-form-label ">Description ({{ strtoupper($locale) }})</label>
            <div class="col-md-6">
                <textarea id="description_{{ $locale }}"
                    class="form-control @error('details.{{ $locale }}.translations.description') is-invalid @enderror"
                    name="details[{{ $index }}][translations][{{ $locale }}][description]">{{ old("details.{$index}.translations.{$locale}.description") }}</textarea>

                @error("details.{{ $locale }}.translations.description")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Address Translations -->
        <div class="form-group row">
            <label for="address_{{ $locale }}" class="col-md-4 col-form-label ">Address ({{ strtoupper($locale) }})</label>
            <div class="col-md-6">
                <input id="address_{{ $locale }}" type="text"
                    class="form-control @error('details.{{ $locale }}.translations.address') is-invalid @enderror"
                    name="details[{{ $index }}][translations][{{ $locale }}][address]"
                    value="{{ old("details.{$index}.translations.{$locale}.address") }}" autocomplete="address">

                @error("details.{{ $locale }}.translations.address")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        @endforeach
        <!-- Remove Button -->
    <button type="button" class="btn btn-danger remove-detail-btn" data-index="{{ $index }}">Remove</button>
    <hr>
</div>
