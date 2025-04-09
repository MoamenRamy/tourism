@extends('theme.default')

@section('heading')
Dashboard
@endsection

@section('content')

<h3 class="mb-5">Tours</h3>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Destinations</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$destination}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-location-dot fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Categories</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$category}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tours</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tour}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-plane fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Additional Services</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$additionService}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Common Questions</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$commonQuestion}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-question fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Safety</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$safety}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-shield fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Rates</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$rate}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-star fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Reservation</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tourReservation}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sale}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-percent fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr>

<h3 class="mb-5">Transportations</h3>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Vehicles</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$vehicle}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-van-shuttle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Transportations</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transportation}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-car-side fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Additional Services</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transportationAdditional}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Common Questions</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transportationCommon}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-question fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Reservations</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transportationReservation}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transportationSale}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-percent fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<h3 class="mb-5">Options</h3>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            currencies</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$currency}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
