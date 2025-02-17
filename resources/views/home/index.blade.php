@extends('home.master')

@section('title', 'Home Page')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="display-4 text-primary">Pharmacy Management</h1>
            <p class="lead text-muted">Choose an option below to manage your data efficiently</p>
        </div>

        <div class="row">
            <!-- Left Side: Manage Sections -->
            <div class="col-md-8">
                <div class="row">
                    <!-- Manage Medicines -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-info">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">Manage Medicines</h5>
                                <p class="card-text text-muted">Track and manage your medicines with ease. Add, edit, or delete medicine details.</p>
                                <a href="{{ route('medicines.index') }}" class="btn btn-success btn-lg">View Medicine Information</a>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Sales -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title text-warning">Manage Sales</h5>
                                <p class="card-text text-muted">Monitor and control your sales transactions. Generate reports and track your performance.</p>
                                <a href="{{ route('sales.index') }}" class="btn btn-warning btn-lg">View Sales Information</a>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Employee -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title text-info">Manage Employee</h5>
                                <p class="card-text text-muted">Keep track of your employee details. Update their records and manage roles.</p>
                                <a href="{{ route('users.index') }}" class="btn btn-info btn-lg">View Employee Information</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner Carousel -->
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100 banner-img" alt="Banner 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100 banner-img" alt="Banner 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100 banner-img" alt="Banner 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Right Side: Articles about Medicines -->
            <div class="col-md-4 position-relative">
                <div class="card shadow-lg border-info position-absolute top-0 end-0" style="width: 300px;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Recent Articles on Medicines</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h6><a href="https://tuoitre.vn/dung-thuoc-phai-dung-lieu-20180117091010656.htm">Dùng thuốc phải đúng liều</a></h6>
                                <p class="text-muted">TTO - Trong sử dụng thuốc luôn luôn có lời khuyên "phải dùng thuốc đúng liều, đủ thời gian".</p>
                            </li>
                            <li class="list-group-item">
                                <h6><a href="https://dantri.com.vn/tam-diem/nghien-cuu-thuoc-moi-o-viet-nam-chang-duong-gian-nan-20241125074730163.htm">Nghiên cứu thuốc mới ở Việt Nam</a></h6>
                                <p class="text-muted">Nghiên cứu thuốc mới ở Việt Nam: Chặng đường gian nan.</p>
                            </li>
                            <li class="list-group-item">
                                <h6><a href="https://baobacninh.com.vn/web/en/news/-/details/20182/hoi-nghi-khoa-hoc-nganh-y-te-lan-thu-xi-nam-2025">Hội nghị khoa học ngành Y tế lần thứ XI năm 2025</a></h6>
                                <p class="text-muted">Ngày 11-2, tại Bệnh viện Đa khoa tỉnh, Sở Y tế tổ chức hội nghị khoa học lần thứ XI năm 2025. Đồng chí Lê Xuân Lợi, Ủy viên Ban Thường vụ Tỉnh ủy, Phó Chủ tịch UBND tỉnh đến dự và chúc mừng hội nghị.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Log Out Button -->
        <div class="text-center mt-5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg px-4">Log Out</button>
            </form>
        </div>
    </div>

    <!-- Custom Styling (Optional) -->
    <style>
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body {
            background-color: #f9f9f9;
        }
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease-in-out;
        }
        .btn-lg {
            font-size: 1.1rem;
            padding: 12px 24px;
        }

        /* Ensure all banners are the same size */
        .carousel-inner img {
            width: 100%; /* Full width */
            height: 400px; /* Fixed height */
            object-fit: cover; /* Ensure images cover the area */
        }

        /* Style for Articles section */
        .list-group-item a {
            text-decoration: none;
            color: #007bff;
        }
        .list-group-item a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
