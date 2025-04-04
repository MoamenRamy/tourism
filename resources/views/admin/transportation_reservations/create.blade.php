@extends('theme.default')

@section('heading')
Add Transportation Reservation
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add Transportation Reservation
        </div>
        <div class="card-body">
            <form action="{{ route('transportation_reservations.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="transportation_id" class="col-md-4 col-form-label">Transportation</label>

                    <div class="col-md-6">
                        <select id="transportation_id" class="form-control @error('transportation_id') is-invalid @enderror" name="transportation_id">
                            <option value="" disabled>-- Please select a Transportation --</option>
                            @foreach($transportations as $transportation)
                                <option value="{{ $transportation->id }}" {{ old('transportation_id') == $transportation->id ? 'selected' : '' }}>
                                    {{ $transportation->from }} -> {{ $transportation->to }}
                                </option>
                            @endforeach
                        </select>
                        @error('transportation_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">User</label>

                    <div class="col-md-6">
                        <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                            <option value="" disabled>-- Please select a user --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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

                @foreach(['first_name', 'last_name', 'address', 'hotel', 'flight_number', 'guest', 'price', 'phone', 'whatsapp', 'note'] as $field)
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

                <div class="form-group row">
                    <label for="reservation_dateTime" class="col-md-4 col-form-label">Reservation DateTime</label>
                    <div class="col-md-6">
                        <input id="reservation_dateTime" type="datetime-local" class="form-control @error('reservation_dateTime') is-invalid @enderror" name="reservation_dateTime" value="{{ old('reservation_dateTime') }}">

                        @error('reservation_dateTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_status" class="col-md-4 col-form-label">Duration type</label>
                    <div class="col-md-6">
                        <select id="payment_status" class="form-control @error('payment_status') is-invalid @enderror" name="payment_status">
                            <option value="" disabled>Choose duration type</option>
                            <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ old('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="deposit" {{ old('payment_status') == 'deposit' ? 'selected' : '' }}>Deposit</option>
                        </select>
                        @error('payment_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
