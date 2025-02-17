@extends('users.master')
@section('title', 'Edit User')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header text-center text-primary"><h3>Edit User</h3></div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <style>
                    .container {
                        display: flex;
                        flex-direction: column;
                    }

                    .row {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        margin-bottom: 1rem;
                    }
                </style>
                <div class="container">
                    <!-- Name field -->
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-label-form">Name</label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required/>
                        </div>
                    </div>
                    <!-- Date of Birth field -->
                    <div class="row mb-3">
                        <label for="date_of_birth" class="col-sm-2 col-label-form">Date of Birth</label>
                        <div class="col-sm-10">
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}" required/>
                        </div>
                    </div>
                    <!-- Phone Number field -->
                    <div class="row mb-3">
                        <label for="phone_number" class="col-sm-2 col-label-form">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $user->phone_number }}" required/>
                        </div>
                    </div>
                    <!-- Email field -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-label-form">Email</label>
                        <div class="col-sm-10">
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required/>
                        </div>
                    </div>
                    <!-- Branch Address field -->
                    <div class="row mb-3">
                        <label for="branch_address" class="col-sm-2 col-label-form">Branch Address</label>
                        <div class="col-sm-10">
                            <input type="text" id="branch_address" name="branch_address" class="form-control" value="{{ $user->branch_address }}" required/>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
@endsection
