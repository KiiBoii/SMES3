@extends('admin.layouts.admin.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ol>
            </nav>
            <h2 class="h4">Dashboard</h2>
            <p class="mb-0">Selamat Datang Di Dashboard Admin</p>
        </div>
    </div>

    {{-- Ringkasan Statistik --}}

    <div class="card shadow border-0 text-center p-0">
        <div class="profile-cover rounded-top"
            style="background: url('{{ asset('storage/' . (Auth::user()->profile_cover ?? 'default-cover.jpg')) }}');
            background-size: cover;
            background-position: center;">
        </div>
        <div class="card-body pb-5">
            <img src="" alt="">
            <!-- Display user profile picture -->
            <img src="{{ asset('storage/' . (Auth::user()->gambar ?? 'default-avatar.jpg')) }}"
                class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="{{ Auth::user()->name }}">
            <h4 class="h3">{{ Auth::user()->name }}</h4>
            <h5 class="fw-normal">{{ Auth::user()->role }}</h5>
            <p class="text-gray mb-4">{{ Auth::user()->location ?? 'Location not set' }}</p>
            <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#">
                <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                    </path>
                </svg>
                Connect
            </a>
            <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Top 3 Pelanggan Baru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($topPelangganBaru as $pelanggan)
                            <li class="list-group-item">
                                <strong>{{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</strong><br>
                                <small class="text-muted">Mendaftar pada
                                    {{ $pelanggan->created_at->format('d M Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-3">
                        <a href="{{ route('pelanggan.list') }}" class="btn btn-primary">Lihat Semua Pelanggan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">ProdukBaru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($topProdukBaru as $produk)
                            <li class="list-group-item">
                                <strong class="text-dark" style="font-size: 1.1em;">{{ $produk->nama_produk }}</strong>
                                <span style="color: #3ea3e2; font-weight: normal;">{{ $produk->class }}</span><br>
                                <small class="text-muted">
                                    Mendaftar pada {{ $produk->created_at->format('d M Y') }}
                                </small>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-3">
                        <a href="{{ route('produk.list') }}" class="btn btn-primary">Lihat Semua Member</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Navigasi Data --}}
    {{-- <div class="card border-0 shadow">
        <div class="card-header d-flex justify-content-between">
            <h5>Manajemen Data</h5>
            <div>
                <a href="{{ route('pelanggan.list') }}" class="btn btn-sm btn-primary">Pelanggan</a>
                <a href="{{ route('mitra.list') }}" class="btn btn-sm btn-success">Mitra</a>
                <a href="{{ route('user.list') }}" class="btn btn-sm btn-info">User</a>
            </div>
        </div>
        <div class="card-body">
            <p>Pilih kategori data untuk melihat detail atau mengelola informasi terkait.</p>
        </div>
    </div> --}}


    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="row d-flex flex-row">
                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Pelanggan</h5>
                                <h2>{{ $totalPelanggan }}<p class="text-success">Pelanggan</p>
                                </h2>
                                <a href="{{ route('pelanggan.list') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Mitra</h5>
                                <h2>{{ $totalMitra }}<p class="text-warning">Mitra</p>
                                </h2>
                                <a href="{{ route('mitra.index') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <h2>{{ $totalUser }}<p class="text-danger">User</p>
                                </h2>
                                <a href="{{ route('User.list') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Member</h5>
                                <h2>{{ $totalProduk }}<p class="text-danger">Member</p>
                                </h2>
                                <a href="{{ route('produk.list') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Income</h5>
                                <h2>{{ $totalProduk }}<p class="text-danger">Income</p>
                                </h2>
                                <a href="{{ route('produk.list') }}" class="btn btn-primary mt-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Team members</h2>
                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush list my--3">
                                @foreach ($topUserBaru as $user)
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar">
                                                    <!-- Check if user has a profile image -->
                                                    @if ($user->gambar)
                                                        <img class="rounded" alt="Image placeholder"
                                                            src="{{ asset('storage/' . $user->gambar) }}" width="50">
                                                    @else
                                                        <!-- Use a default avatar if no image is found -->
                                                        <img class="rounded" alt="Image placeholder"
                                                            src="{{ asset('assets/images/default-avatar.jpg') }}"
                                                            width="50">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-auto ms--2">
                                                <h4 class="h6 mb-0">
                                                    <a href="#">{{ $user->name }}</a>
                                                </h4>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success dot rounded-circle me-1"></div>
                                                    <small>{{ $user->status ?? 'Offline' }}</small>
                                                </div>
                                            </div>
                                            <div class="col text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                    <svg class="icon icon-xxs me-2" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Message
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Progress track</h2>
                            <a href="#" class="btn btn-sm btn-primary">See tasks</a>
                        </div>
                        <div class="card-body">
                            <!-- Project 1 -->
                            <div class="row mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Rocket - SaaS Template</div>
                                            <div class="small fw-bold text-gray-500"><span>75 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 2 -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Themesberg - Design System</div>
                                            <div class="small fw-bold text-gray-500"><span>60 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 3 -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Homepage Design in Figma</div>
                                            <div class="small fw-bold text-gray-500"><span>45 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="45"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project 4 -->
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Backend for Themesberg v2</div>
                                            <div class="small fw-bold text-gray-500"><span>34 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="34"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">

            </div>
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Global Rank
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #755
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Country Rank
                                </div>
                                <div class="small card-stats">
                                    United States
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #32
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <div>
                                <div class="h6 mb-0 d-flex align-items-center">
                                    <svg class="icon icon-xs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                            clip-rule="evenodd"></path>
                                        <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z">
                                        </path>
                                    </svg>
                                    Category Rank
                                </div>
                                <div class="small card-stats">
                                    Computers Electronics > Technology
                                    <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="d-flex align-items-center fw-bold">
                                    #11
                                    <svg class="icon icon-xs text-gray-500 ms-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="fs-5 fw-bold mb-1">Acquisition</h2>
                        <p>Tells you where your visitors originated from, such as search engines, social networks or
                            website
                            referrals.</p>
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-sm icon-shape-danger rounded me-3">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Bounce Rate</label>
                                    <h4 class="mb-0">33.50%</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="icon-shape icon-sm icon-shape-purple rounded me-3">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Sessions</label>
                                    <h4 class="mb-0">9,567</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
