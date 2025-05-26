@extends('layouts.main')

@section('title', 'Confirm')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white fs-1">Confirm</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Confirm</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    {{-- {{$from}} --}}
    {{-- {{$to}} --}}
    {{-- {{$transportation_vehicle_id}} --}}
    {{-- {{$transportation_id}} --}}
    {{-- {{$to}} --}}
    {{-- {{$vehicle_id}} --}}

    <div class="row justify-content-center pt-5">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Transportation Reservation
            </div>
            <div class="card-body">
                <form action="{{ route('transportation_reservations.confirm') }}" method="POST">
                    @csrf

                    <input type="hidden" name="vehicle_id" value="{{ $transportation_vehicle_id }}">
                    <input type="hidden" name="price" value="{{ $price }}">
                    <input type="hidden" name="from" value="{{ $from }}">
                    <input type="hidden" name="to" value="{{ $to }}">
                    <input type="hidden" name="reservation_dateTime" value="{{ $reservation_dateTime }}">
                    <input type="hidden" name="transportation_id" value="{{ $transportation_id }}">

                    <div class="form-group row">
                        <label for="currency_id" class="col-md-4 col-form-label">Currency</label>

                        <div class="col-md-6">
                            <select id="currency_id" class="form-control @error('currency_id') is-invalid @enderror" name="currency_id">
                                <option value="" disabled>-- Please select a currency --</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
                                        {{ $currency->code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @foreach(['first_name', 'last_name', 'address', 'hotel', 'flight_number', 'guest', 'phone', 'whatsapp', 'note'] as $field)
                        <div class="form-group row">
                            <label for="{{ $field }}" class="col-md-4 col-form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <div class="col-md-6">
                                <input id="{{ $field }}" type="text" class="form-control @error($field) is-invalid @enderror" name="{{ $field }}" value="{{ old($field) }}" autocomplete="{{ $field }}">

                                @error($field)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endforeach




                    {{-- show from, to, dateTime and etc --}}
                    {{-- addition service on reservation in user sys and admin sys --}}





                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-warning rounded-1 mt-2">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



