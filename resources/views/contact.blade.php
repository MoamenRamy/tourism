@extends('layouts.main')

@section('title', 'Contact')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact Us</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('home') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
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

    <!-- Contact Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Get In Touch</h6>
                    <h1 class="mb-4">Contact Us For Any Queries</h1>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control p-4" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control p-4" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light p-5 rounded shadow">
                        <h4 class="text-primary mb-4">Contact Information</h4>
                        <p><i class="fa fa-map-marker-alt text-primary mr-3"></i> 123 Street, City, Country</p>
                        <p><i class="fa fa-phone text-primary mr-3"></i> +123 456 7890</p>
                        <p><i class="fa fa-envelope text-primary mr-3"></i> info@example.com</p>
                        <iframe class="w-100 rounded" height="250" src="https://www.google.com/maps/embed?..." allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
