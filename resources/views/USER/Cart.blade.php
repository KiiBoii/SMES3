@extends('USER.LAYOUT.app')

@section('content')

    <!-- PreLoader -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!-- PreLoader Ends -->

    <!-- Cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        @if ($cartItems->count() > 0)
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cartItems as $item)
                                        @php
                                            $total += $item->quantity * $item->produk->harga;
                                        @endphp
                                        <tr class="table-body-row">
                                            <td class="product-remove">
                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="remove-btn">
                                                        <i class="far fa-window-close"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="product-image">
                                                <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                                    alt="{{ $item->produk->nama_produk }}">
                                            </td>
                                            <td class="product-name">{{ $item->produk->nama_produk }}</td>
                                            <td class="product-price">Rp
                                                {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                                            <td class="product-quantity">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                        min="1" onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td class="product-total">Rp
                                                {{ number_format($item->quantity * $item->produk->harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>Rp {{ number_format(50000, 0, ',', '.') }}</td>
                                    <!-- You can set dynamic shipping -->
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>Rp {{ number_format($subtotal + 50000, 0, ',', '.') }}</td>
                                    <!-- Subtotal + shipping -->
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

    <!-- Logo Carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Logo Carousel -->

@endsection
