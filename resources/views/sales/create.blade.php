@extends('sales.master')
@section('title', 'Add New Sale')
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
        <div class="card-header text-center text-primary">
            <h3>Add New Sale</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sales.store') }}" method="post">
                @csrf
                <div class="container">
                    <!-- Medicine field -->
                    <div class="row mb-3">
                        <label for="medicine_id" class="col-sm-2 col-form-label">Medicine</label>
                        <div class="col-sm-10">
                            <select name="medicine_id" class="form-control" id="medicine_id">
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->medicine_id }}">{{ $medicine->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Quantity field -->
                    <div class="row mb-3">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" name="quantity" class="form-control" id="quantity" />
                        </div>
                    </div>
                    <!-- Sale Date field -->
                    <div class="row mb-3">
                        <label for="sale_date" class="col-sm-2 col-form-label">Sale Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="sale_date" class="form-control" id="sale_date" />
                        </div>
                    </div>
                    <!-- Customer Phone field -->
                    <div class="row mb-3">
                        <label for="customer_phone" class="col-sm-2 col-form-label">Customer Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="customer_phone" class="form-control" id="customer_phone" />
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
@endsection
