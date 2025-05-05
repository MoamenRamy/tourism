@extends('layouts.main')

@section('title', $tour->name)

@section('head')
<style>
    .fixed-booking-button {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: transparent;
        /* padding: 10px 20px; */
        /* box-shadow: 0 -2px 8px rgba(0,0,0,0.1); */
        z-index: 999;
    }

    /* footer {
        margin-bottom: 80px;
    } */
    #backToTop {
        margin-bottom: 30px;
    }
</style>

@endsection


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="fw-bold">{{ $tour->name }}</h1>
            <h3 class="text-muted">{{ $tour->defination }}</h3>
        </div>
    </div>

    <div class="row my-4 align-items-center">
        <div class="col-md-6">
            <p class="fw-bold">Reviews:</p>
            <div>
                <span class="badge bg-warning text-dark">⭐ 4.5</span>
                <span class="text-muted">(99+ reviews)</span>
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <h4 class="fw-bold">From: <span class="text-primary">${{ $tour->price }}</span></h4>
        </div>
    </div>


    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($tour->photos as $key => $image)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image->photo) }}" class="d-block w-100 rounded-1" alt="Tour Image">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row">
        <div class="col-12">
            <h4 class="fw-bold">About</h4>
            <p class="text-muted">{{ $tour->description }}</p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            {{-- <h5><i class="fa-solid fa-user-group"></i> Ages: {{ $tour->age_range }}</h5> --}}
            <p><i class="fa-solid fa-clock"></i> <span class="text-uppercase">Duration:</span> {{ $tour->duration }} {{ $tour->duration_type }}</p>
            <p><i class="fa-solid fa-users"></i> <span class="text-uppercase">Max Tickets Per Group:</span> {{ $tour->max_tickets_per_day }}</p>
            <p><i class="fa-regular fa-clock"></i> <span class="text-uppercase">Start time: Check availability</span></p>
            {{--
                Start time: Check availability
                Mobile ticket
                Live guide: Arabic, English
            --}}
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md mb-3">
            <h4>What's Included</h4>
            <ul class="list-group">
                @foreach ($tour->include_services as $item)
                    <li class="list-group-item"><i class="fa-solid fa-check text-success"></i> {{ $item->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col mb-3">
            <h4>What's Not Included</h4>
            <ul class="list-group">
                @foreach ($tour->not_include_services as $item)
                    <li class="list-group-item"><i class="fa-solid fa-xmark text-danger"></i> {{ $item->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h4>Addition Information</h4>
            <p>{{ $tour->additional_info }}</p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h4>What to Expect</h4>
            <p>Itinerary details will be available upon booking.</p>
        </div>
        <div class="col-12">
            @if($tour->details->isNotEmpty())
                    <ul class="list-group mb-4">
                        @foreach($tour->details as $detail)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p class="">
                                        <span class="fw-bold">Address : </span>{{$detail->address}}
                                    </p>

                                    <p>
                                        <span class="fw-bold">duration : </span>{{ $detail->duration }} {{$detail->duration_type}}
                                    </p>

                                    <p class="">
                                        <span class="fw-bold">Description : </span>{{$detail->description}}
                                    </p>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">Cancellation Policy</h4>
            {{-- <p>Details available upon request.</p> --}}
            <p>
                You can cancel up to 24 hours in advance of the experience for a full refund.
            </p>
            <ul>
                <li class="m-3">
                    For a full refund, you must cancel at least 24 hours before the experience’s start time.
                </li>
                <li class="m-3">
                    If you cancel less than 24 hours before the experience’s start time, the amount you paid will not be refunded.
                </li>
                <li class="m-3">
                    Any changes made less than 24 hours before the experience’s start time will not be accepted.
                </li>
                <li class="m-3">
                    Cut-off times are based on the experience’s local time.
                </li>
            </ul>
        </div>
    </div>

    <div class="fixed-booking-button">
        <a href="{{ route('tour-reservations.createBooking', $tour->slug) }}" class="btn btn-warning w-100 py-3 fw-bold">
            Book Now
        </a>
    </div>

</div>
@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
