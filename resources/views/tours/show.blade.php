@extends('layouts.main')

@section('title', $tour->name)

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

    <div id="tourCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($tour->photos as $key => $image)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('tours/' . $image) }}" class="d-block w-100 rounded" alt="Tour Image">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#tourCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#tourCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
            <h5><i class="fa-solid fa-user-group"></i> Ages: {{ $tour->age_range }}</h5>
            <h5><i class="fa-solid fa-clock"></i> Duration: {{ $tour->duration }} hours</h5>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h4>What's Included</h4>
            <ul class="list-group">
                @foreach ($tour->include_services() as $item)
                    <li class="list-group-item">✅ {{ $item }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h4>What's Not Included</h4>
            <ul class="list-group">
                @foreach ($tour->not_include_services() as $item)
                    <li class="list-group-item">❌ {{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h4>What to Expect</h4>
            <p>Itinerary details will be available upon booking.</p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <h4>Cancellation Policy</h4>
            <p>Details available upon request.</p>
        </div>
    </div>
</div>
@endsection
