@extends('theme.default')

@section('heading')
Add Transportation Reservation
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Add Transportation Reservation
        </div>
        <div class="card-body">
            <form action="{{ route('transportation_reservations.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="transportation_id" class="col-md-4 col-form-label">Transportation</label>

                    <div class="col-md-6">
                        <select id="transportation_id" class="form-control" name="transportation_id">
                            <option value="" disabled>
                                -- Please select a Transportation --
                            </option>
                            @foreach($transportations as $transportation)
                                <option value="{{ $transportation->id }}">
                                    {{ $transportation->from }} -> {{ $transportation->to }}
                                </option>
                            @endforeach
                        </select>
                        @error('transportation_id')  <!-- Fixed incorrect error key -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">User</label>

                    <div class="col-md-6">
                        <select id="user_id" class="form-control" name="user_id">
                            <option value="" disabled>
                                -- Please select a user --
                            </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')  <!-- Fixed incorrect error key -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="currency_id" class="col-md-4 col-form-label">Currency</label>

                    <div class="col-md-6">
                        <select id="currency_id" class="form-control" name="currency_id">
                            <option value="" disabled>
                                -- Please select a currency --
                            </option>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">
                                    {{ $currency->code }}
                                </option>
                            @endforeach
                        </select>
                        @error('currency_id')  <!-- Fixed incorrect error key -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label ">First Name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" autocomplete="first_name">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label ">Last Name</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" autocomplete="last_name">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label ">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hotel" class="col-md-4 col-form-label ">Hotel</label>

                    <div class="col-md-6">
                        <input id="hotel" type="text" class="form-control @error('hotel') is-invalid @enderror" name="hotel" autocomplete="hotel">

                        @error('hotel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="flight_number" class="col-md-4 col-form-label ">Flight Number</label>

                    <div class="col-md-6">
                        <input id="flight_number" type="text" class="form-control @error('flight_number') is-invalid @enderror" name="flight_number" autocomplete="flight_number">

                        @error('flight_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="guest" class="col-md-4 col-form-label ">Guest</label>

                    <div class="col-md-6">
                        <input id="guest" type="number" class="form-control @error('guest') is-invalid @enderror" name="guest" autocomplete="guest">

                        @error('guest')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reservation_dateTime" class="col-md-4 col-form-label ">Reservation DateTime</label>

                    <div class="col-md-6">
                        {{-- <input id="reservation_dateTime" type="datetime-local" class="form-control @error('reservation_dateTime') is-invalid @enderror" name="reservation_dateTime" value="{{ $transportation_reservation->reservation_dateTime }}" autocomplete="reservation_dateTime"> --}}
                        <input id="reservation_dateTime" type="datetime-local" class="form-control @error('reservation_dateTime') is-invalid @enderror" name="reservation_dateTime">

                        @error('reservation_dateTime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label ">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label ">Phone</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="whatsapp" class="col-md-4 col-form-label ">What's App</label>

                    <div class="col-md-6">
                        <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" autocomplete="whatsapp">

                        @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-md-4 col-form-label ">Note</label>

                    <div class="col-md-6">
                        <input id="note" type="text" class="form-control @error('note') is-invalid @enderror" name="note" autocomplete="note">

                        @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_status" class="col-md-4 col-form-label">Duration type</label>

                    <div class="col-md-6">
                        <select id="payment_status" class="form-control" name="payment_status">
                            <option value="" disabled>Choose duration type</option>
                            <option value="paid">Paid</op+tion>
                            <option value="unpaid">Unpaid</option>
                            <option value="deposit">Deposit</option>
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
