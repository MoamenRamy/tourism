@extends('layouts.main')

@section('title', 'Tours In'. $destination->name)

@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Tours In {{$destination->name}}</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Tours In {{$destination->name}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    <div class="container-fluid booking mt-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Destination</option>
                                        <option value="1">Destination 1</option>
                                        <option value="2">Destination 1</option>
                                        <option value="3">Destination 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Depart Date" data-target="#date1" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Duration</option>
                                        <option value="1">Duration 1</option>
                                        <option value="2">Duration 1</option>
                                        <option value="3">Duration 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tours</h6>
                <h1>Perfect Tour In {{$destination->name}}</h1>
            </div>
            <div class="row">
                @foreach ($tours as $tour)
                <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{route('tours.show', $tour->slug)}}">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="{{asset('img/package-1.jpg')}}" alt="" loading="lazy">
                            {{-- add main photo to tour --}}
                            {{-- <img class="img-fluid" src="{{asset('tours/'.$tour->photo)}}" alt="" loading="lazy"> --}}
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$tour->destination->name}}</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{$tour->duration}} {{$tour->duration_type}}</small>
                                    {{-- <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small> --}}
                                </div>
                                <a class="h5 text-decoration-none" href="{{route('tours.show', $tour->slug)}}">{{ Str::limit($tour->name, 50) }}</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        {{-- add dynamic reviews --}}
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                        <h5 class="m-0">${{$tour->price}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="pagination-container d-flex flex-wrap">
                {{ $tours->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Packages End -->



@endsection



