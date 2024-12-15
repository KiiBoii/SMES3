@extends('admin.layouts.admin.app')
@section('content')

    {{-- BREADCRUMB --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{ route('User.list') }}">User </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Tambah User</li>
                </ol>
            </nav>
            <h2 class="h4">Tambah User</h2>
            <p class="mb-0">Form tambah User.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('User.list') }}"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <Kembali class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" <path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                    Kembali
            </a>
            <div class="btn-group ms-2 ms-lg-3"><button type="button"
                    class="btn btn-sm btn-outline-gray-600">Share</button> <button type="button"
                    class="btn btn-sm btn-outline-gray-600">Export</button></div>
        </div>
    </div>
    {{-- END BREADCRUMB --}}

    {{-- FORM --}}
    <div class="card card-body border-0 shadow mb-4">
        <form action="{{ route('User.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div><label for="name">First Name</label> <input class="form-control" id="name"
                            name="name" type="text" placeholder="Masukkan Nama User" required=""></div>
                </div>
                <div class="col-md-6 mb-3">
                    <div><label for="email">email</label> <input class="form-control" id="email" name="email"
                            type="email" placeholder=". . . .d@gmaiil.com" required=""></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password anda" required="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="role">Role User</label>
                    <select class="form-select mb-0" id="role" name="role" aria-label="Role user">
                        <option selected="selected">Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Pelanggan">Pelanggan</option>
                        <option value="Mitra">Mitra</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gambar">Gambar Produk</label>
                    <input class="form-control" id="gambar" name="gambar" type="file" accept="image/*" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="profile_cover">Profile Cover</label>
                    <input class="form-control" id="profile_cover" name="profile_cover" type="file" accept="image/*" required>
                </div>

            </div>
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
        </form>
    </div>
    {{-- END FORM --}}

@endsection
