@extends('theme.default')

@section('heading')
Edit Transportation Reservation
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Edit Transportation Reservation
        </div>
        <div class="card-body">
            <form action="{{ route('users.update' , $user->id) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label">Duration type</label>

                    <div class="col-md-6">
                        <select id="role" class="form-control" name="role">
                            <option value="" disabled>Choose duration type</option>
                            <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User</op+tion>
                            <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ old('role', $user->role ?? '') == 'manager' ? 'selected' : '' }}>Manager</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
