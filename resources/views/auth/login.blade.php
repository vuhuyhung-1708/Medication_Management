@extends('auth.master') <!-- Hoặc layout của bạn -->

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg p-5 rounded" style="height: 100%; min-height: 400px;">
                    <div class="text-center mb-4">
                        <h2 class="text-primary">Đăng Nhập</h2>
                        <p class="text-muted">Vui lòng điền thông tin để đăng nhập vào hệ thống.</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="Nhập tên đăng nhập" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Đăng Nhập</button>
                    </form>

                    <div class="text-center mt-3">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
