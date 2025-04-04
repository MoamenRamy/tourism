{{-- @extends('theme.default')

@section('heading')
Add Rates
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Add Rates
        </div>
        <div class="card-body">
            <form action="{{ route('rates.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">User Name</label>

                    <div class="col-md-6">
                        <input id="user_id" type="text" class="form-control @error('name') is-invalid @enderror" name="user_id" value="{{ $rate->user->name }}" autocomplete="user_id" disabled>

                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tour_id" class="col-md-4 col-form-label">Tour</label>

                    <div class="col-md-6">
                        <input id="tour_id" type="text" class="form-control @error('name') is-invalid @enderror" name="tour_id" autocomplete="tour_id" disabled>

                        @error('tour_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rating" class="col-md-4 col-form-label">Rating</label>

                    <div class="col-md-6">
                        <input id="rating" type="text" class="form-control @error('name') is-invalid @enderror" name="rating" autocomplete="rating">

                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label">Comment</label>

                    <div class="col-md-6">
                        <input id="comment" type="text" class="form-control @error('name') is-invalid @enderror" name="comment" autocomplete="comment">

                        @error('comment')
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
@endsection --}}
