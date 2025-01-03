@extends('USER.LAYOUT.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Shop</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <style>
        .single-product-item {
            padding: 10px;
            /* Reduce the padding inside the card */
            border: 1px solid #ddd;
            /* Optional: Add a border for better definition */
            border-radius: 5px;
            /* Optional: Add rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional: Add a subtle shadow */
        }

        .product-image img {
            width: 100%;
            /* Ensure the images are responsive and scale down */
            height: auto;
            /* Maintain aspect ratio */
        }

        .product-price {
            font-size: 14px;
            /* Adjust the font size to fit more content */
        }

        h3 {
            font-size: 16px;
            /* Adjust product name size */
        }

        .cart-btn {
            font-size: 12px;
            /* Smaller cart button text */
            padding: 5px 10px;
            /* Reduce padding for the button */
        }
    </style>
</head>

<body>

    <!-- PreLoader -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!-- PreLoader Ends -->

    <!-- Search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <form method="GET" action="{{ route('showProducts') }}">
                                <input type="text" name="search" placeholder="Keywords" value="{{ request('search') }}">
                                <button type="submit">Search <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End search area -->

    <!-- Products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li><a href="{{ route('showProducts') }}">All</a></li>
                            <li><a href="{{ route('showProducts', ['jenis' => 'Makanan']) }}">Makanan</a></li>
                            <li><a href="{{ route('showProducts', ['jenis' => 'Minuman']) }}">Minuman</a></li>
                            <li><a href="{{ route('showProducts', ['jenis' => 'Obat Dll']) }}">Obat dll</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('DetailProduk', $product->nama_produk) }}">
                                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                                </a>
                            </div>
                            <h3>{{ $product->nama_produk }}</h3>
                            <p class="product-price">
                                <span>{{ $product->deskripsi }}</span> Rp
                                {{ $product->harga ? $product->harga : 'N/A' }}
                            </p>
                            <button class="cart-btn add-to-cart" data-id="{{ $product->id }}">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End products -->

</body>
@endsection
