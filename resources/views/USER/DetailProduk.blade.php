@extends('USER.LAYOUT.app')
@section('content')
    <!-- Single Product Section -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->nama_produk }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span>
                            Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                        <p>{{ $product->deskripsi }}</p>
                        <div class="single-product-form">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="quantity" min="1" value="1" required>
                                <button type="submit" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                            <p><strong>Categories: </strong>{{ $product->jenis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('DetailProduk', $relatedProduct->nama_produk) }}">
                                    <img src="{{ asset('storage/' . $relatedProduct->gambar) }}"
                                        alt="{{ $relatedProduct->nama_produk }}">
                                </a>
                            </div>
                            <h3>{{ $relatedProduct->nama_produk }}</h3>
                            <p class="product-price"><span>Per Kg</span>
                                Rp{{ number_format($relatedProduct->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('cart.store') }}?product_id={{ $relatedProduct->id }}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
