@extends('admin.layouts.admin.app')
@section('content')
    {{-- main content --}}
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
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
            <h2 class="h4">Data Produk</h2>
            <p class="mb-0">List Semua Produk.</p>
        </div>

        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-success text-white d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> Tambah Data
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <form method="GET" action="{{ route('produk.list') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <select name="jenis" onchange="this.form.submit()" class="form-select">
                                <option value="">Jenis Produk</option>
                                <option value="Makanan" {{ request('jenis') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="Minuman" {{ request('jenis') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="Kerajinan" {{ request('jenis') == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="tgl_expired" onchange="this.form.submit()">
                                <option value="">Tanggal Expired</option>
                                @for ($i = 2024; $i >= 1900; $i--)
                                    <option value="{{ $i }}" {{ request('tgl_expired') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search">
                                <button type="submit" class="input-group-text">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                @if (request('search'))
                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                        class="btn btn-outline-secondary ml-3">Clear</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="page" value="{{ $dataProduk->currentPage() }}">
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Nama Produk</th>
                            <th class="border-0">Deskripsi</th>
                            <th class="border-0">Harga</th>
                            <th class="border-0">Stok</th>
                            <th class="border-0">Jenis</th>
                            <th class="border-0">Tanggal Expired</th>
                            <th class="border-0">Gambar</th>
                            <th class="border-0 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataProduk as $row)
                            <tr>
                                <td>{{ ($dataProduk->currentPage() - 1) * $dataProduk->perPage() + $loop->iteration }}</td>
                                <td>{{ $row->nama_produk }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ $row->harga }}</td>
                                <td>{{ $row->stok }}</td>
                                <td>{{ $row->jenis }}</td>
                                <td>{{ $row->tgl_expired }}</td>
                                <td>
                                    @if ($row->gambar)
                                        <img src="{{ asset('storage/' . $row->gambar) }}" alt="Gambar Produk" width="50">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('produk.edit', $row->produk_id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('produk.destroy', $row->produk_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $dataProduk->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
@endsection
