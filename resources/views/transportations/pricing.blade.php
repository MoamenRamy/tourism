@extends('layouts.main')

@section('title', 'Pricing')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white fs-1">transfer from {{$from}}, Egypt to {{$to}}, Egypt</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">pricing</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <h4 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Available Vehicles</h4>

        @foreach($transportation_vehicle as $vehicle)
            <form method="POST" action="{{ route('transportation_reservations.booking') }}" class="mb-4">
                @csrf
                <!-- Hidden inputs to send necessary data -->
                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                <input type="hidden" name="price" value="{{ $vehicle->pivot->price }}">
                <input type="hidden" name="from" value="{{ $from }}">
                <input type="hidden" name="to" value="{{ $to }}">
                <input type="hidden" name="reservation_dateTime" value="{{ $reservation_dateTime }}">
                <input type="hidden" name="transportation_id" value="{{ $transportation->id }}">

                <div class="card shadow-sm p-5">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 px-2">
                            <h5 class="card-title fs-4 fw-bold">{{ $vehicle->name }}</h5>
                            <img src="{{ asset('storage/' . $vehicle->photo) }}" class="img-fluid" alt="Vehicle Photo" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body border-start border-end">
                                <div class="card-text mb-3 mt-2 text-center flex justify-content-center">
                                    <p class="col-3">
                                        <i class="fa-solid fa-users text-primary"></i> {{ $vehicle->car_load ?? 'N/A' }}
                                    </p>
                                    <p class="col-3">
                                        <i class="fa-solid fa-briefcase text-primary"></i>
                                    </p>
                                </div>
                                <div class="">
                                    <ul>
                                        <li class="card-text"><i class="fa-solid fa-xmark text-primary"></i> Free Cancellation</li>
                                        <li class="card-text"><i class="fa-regular fa-clock text-primary"></i> 90 minutes of waiting included</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body text-center">
                                <p class="card-text m-2 fw-bold fs-4">
                                    <strong>price</strong> {{ $vehicle->pivot->price ?? 'N/A' }}
                                </p>
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-1 fw-bold m-2">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>

    <div class="container py-3">
        <!-- howItWork Start -->
        <div class="container-fluid py-3">
            <div class="container pt-4 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">How It Work</h6>
                    <h1>How It Work</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                        <div class="howItWork-item position-relative overflow-hidden mb-2">
                            <div class="howItWork-overlay">
                                <div class="flex justify-content-center align-items-center">
                                    <h1 class="text-primary pe-2">1</h1>
                                    <h5 class="">Select Your Route and Car</h5>
                                </div>
                                <div class="text-center">
                                    <span>Enter your pick-up and drop-off locations, choose your preferred car, and select the date of your ride.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                        <div class="howItWork-item position-relative overflow-hidden mb-2">
                            <div class="howItWork-overlay">
                                <div class="flex justify-content-center align-items-center">
                                    <h1 class="text-primary pe-2">2</h1>
                                    <h5 class="">Provide Booking Details</h5>
                                </div>
                                <div class="text-center">
                                    <span>Fill in some basic information and select any extra services you might need. Then, choose your preferred payment method.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                        <div class="howItWork-item position-relative overflow-hidden mb-2">
                            <div class="howItWork-overlay">
                                <div class="flex justify-content-center align-items-center">
                                    <h1 class="text-primary pe-2">3</h1>
                                    <h5 class="">Enjoy the Ride</h5>
                                </div>
                                <div class="text-center">
                                    <span>Our driver will arrive at your pick-up location on time and you’ll be ready to embark on your one-of-a-kind journey.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- howItWork Start -->

        <!-- common question Start -->
        <div class="container-fluid py-3">
            <div class="container pt-4 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Frequently Asked Questions</h6>
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="row">
                    <div class="accordion" id="faqAccordion">
                        @foreach($questions as $index => $question)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                        {{ $question['question'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}"
                                        data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $question['answer'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- common question Start -->
    </div>


@endsection



