@extends('theme.default')

@section('heading')
Edit Transportation Sale
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Transportation Sale
        </div>
        <div class="card-body">
            <form action="{{ route('transportation_sales.update', $transportationSale) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="destination_id" class="col-md-4 col-form-label">Destination</label>

                    <div class="col-md-6">
                        <select id="destination_id" class="form-control" name="destination_id">
                            <option value="" disabled {{ $transportationSale->destination_id == null ? "selected" : "" }}>
                                -- Please select a destination --
                            </option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                        {{ $transportationSale->destination_id == $destination->id ? "selected" : "" }}>
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
                    <label for="discount_percentage" class="col-md-4 col-form-label ">Discount Percentage</label>

                    <div class="col-md-6">
                        <input id="discount_percentage" type="text" class="form-control @error('discount_percentage') is-invalid @enderror" name="discount_percentage" value="{{ $transportationSale->discount_percentage }}" autocomplete="discount_percentage">

                        @error('discount_percentage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="discount_amount" class="col-md-4 col-form-label ">Discount Amount</label>

                    <div class="col-md-6">
                        <input id="discount_amount" type="text" class="form-control @error('discount_amount') is-invalid @enderror" name="discount_amount" value="{{ $transportationSale->discount_amount }}" autocomplete="discount_amount">

                        @error('discount_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="discount_start_date" class="col-md-4 col-form-label ">Discount Start Date</label>

                    <div class="col-md-6">
                        <input id="discount_start_date" type="date" class="form-control @error('discount_start_date') is-invalid @enderror" name="discount_start_date" value="{{ $transportationSale->discount_start_date }}" autocomplete="discount_start_date">

                        @error('discount_start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="discount_end_date" class="col-md-4 col-form-label ">Discount End Date</label>

                    <div class="col-md-6">
                        <input id="discount_end_date" type="date" class="form-control @error('discount_end_date') is-invalid @enderror" name="discount_end_date" value="{{ $transportationSale->discount_end_date }}" autocomplete="discount_end_date">

                        @error('discount_end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="active" class="col-md-4 col-form-label">Active</label>

                    <div class="col-md-6">
                        <input type="hidden" name="active" value="0">
                        <input id="active" type="checkbox" class="@error('active') is-invalid @enderror" name="active" value="1" {{ $transportationSale->active ? 'checked' : '' }}>
                        @error('active')
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
