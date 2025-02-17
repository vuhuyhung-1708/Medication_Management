@extends('medicines.master')
@section('title','medicines management')
@section('content')
    @if($message=Session::get('success'))

        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Medication Management</b></h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('medicines.create')}}" class="btn btn-success btn-sm float-end"><i class="bi bi-plus-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name </th>
                    <th>Brand</th>
                    <th>Dosage</th>
                    <th>Form</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th colspan="3">Option</th>
                </tr>
                @foreach($medicines as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->brand}}</td>
                        <td>{{$row->dosage}}</td>
                        <td>{{$row->form}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->stock}}</td>
                        <td>
                            <div class="d-flex align-items-center">

                                <a href="{{ route('medicines.edit', $row->medicine_id) }}" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-fill"></i></a>
                                <form action="{{ route('medicines.destroy', $row->medicine_id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Do you want to delete the rooms with number: {{ $row->RoomNumber }}?')" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!!$medicines->links('pagination::simple-bootstrap-4')!!}
        </div>
    </div>

@endsection
