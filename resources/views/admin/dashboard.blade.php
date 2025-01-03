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
            <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2"
                href="{route{{ route('User.update') }}}">
                <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                    </path>
                </svg>
                Connect
            </a>
        </div>
    </div>


    <div class="row">
        <div class="row1">
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
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">

            </div>
            </div>
        </div>
    </div>
@endsection
