@extends('users.master')
@section('title', 'User Management')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>User Management</b></h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end"><i
                            class="bi bi-plus-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Branch Address</th>
                    <th colspan="3">Options</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->date_of_birth}}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->branch_address }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2"><i
                                        class="bi bi-pencil-fill"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Do you want to delete this user?')"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $users->links('pagination::simple-bootstrap-4') !!}
        </div>
    </div>
@endsection
