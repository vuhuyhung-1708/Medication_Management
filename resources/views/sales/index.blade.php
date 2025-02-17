 
@extends('sales.master')

@section('title', 'Sales Management')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Sales Management</b></h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{ route('sales.create') }}" class="btn btn-success btn-sm float-end"><i class="bi bi-plus-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Sale Date</th>
                    <th>Customer Phone</th>
                    <th colspan="3">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->medicine->name ?? 'N/A' }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}</td>
                        <td>{{ $sale->customer_phone }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('sales.edit', $sale->sale_id) }}" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-fill"></i></a>
                                <form action="{{ route('sales.destroy', $sale->sale_id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Do you want to delete this sale?')" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $sales->links('pagination::simple-bootstrap-4') !!}
        </div>
    </div>
@endsection
