<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
</head>
<style>
    /* General Reset */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
    }

    .container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    /* Header */
    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 24px;
        color: #4CAF50;
    }

    /* Cart Table */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .cart-table thead {
        background: #4CAF50;
        color: #fff;
    }

    .cart-table th,
    .cart-table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .cart-table td.product {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cart-table td.product img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .quantity {
        width: 50px;
        padding: 5px;
        border: 1px solid #ddd;
        text-align: center;
        border-radius: 5px;
    }

    /* Summary Section */
    .summary {
        text-align: right;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }

    .summary p {
        margin-bottom: 20px;
    }

    /* Buttons */
    .btn-delete {
        background: #4CAF50;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .btn-delete:hover {
        background: #e64a19;
    }

    .btn-checkout {
        background: #4caf50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .btn-checkout:hover {
        background: #388e3c;
    }
</style>

<body>
    <header>
        <div class="container">
            <div class="header-left">
                <a href="#" class="logo">KEDAI NENEK</a>
                <div class="welcome-text" style="text-align: center;">
                    <h3>Welcome, {{ session('username') }}</h3>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="bluetooth earphone">
                    <button>Search</button>
                </div>
            </div>
            <div class="header-right" style="display: flex; align-items: center; justify-content: flex-end;">
                <div class="language-dropdown" style="margin-right: 20px;">
                    <button>EN/IDR</button>
                    <ul>
                        <li><a href="#">EN/USD</a></li>
                        <li><a href="#">EN/EUR</a></li>
                        <li><a href="#">ID/IDR</a></li>
                    </ul>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin-right: 20px;">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
                <a href="#" class="sign-in" style="margin-right: 20px;">Sign in / Register</a>
                <a href="#" class="cart" style="margin-left: auto;">
                    <span class="cart-count">2</span>
                    <span class="cart-text">Cart</span>
                </a>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul class="nav-links">
                <li><a href="#">All Categories</a></li>
                <li><a href="#">3 mulai dari Rp.1000</a></li>
                <li><a href="#">Choice</a></li>
                <li><a href="#">Promo Super</a></li>
                <li><a href="#">Plus</a></li>
                <li><a href="#">Product Baru</a></li>
                <li><a href="#">Kiiboii Business</a></li>
                <li><a href="#">Lebih banyak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Keranjang Belanja -->
    <div class="container">
        <header class="header">
            <h1>Keranjang Belanja</h1>
        </header>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Produk Sample -->
                <tr>
                    <td class="product">
                        <img src="{{ asset('assets/images/ademsari.jpg') }}" alt="Adem Sari">
                        <span>Adem Sari</span>
                    </td>
                    <td>Rp3.000</td>
                    <td>
                        <input type="number" value="1" class="quantity" disabled>
                    </td>
                    <td>Rp3.000</td>
                    <td>
                        <form action="#" method="POST">
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="product">
                        <img src="{{ asset('assets/images/cokolatos.jpg') }}" alt="Cokolatos">
                        <span>Cokolatos</span>
                    </td>
                    <td>Rp1.500</td>
                    <td>
                        <input type="number" value="2" class="quantity" disabled>
                    </td>
                    <td>Rp3.000</td>
                    <td>
                        <form action="#" method="POST">
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                <!-- Tambahkan produk lain sesuai kebutuhan -->
            </tbody>
        </table>
        <div class="summary">
            <p>Total: Rp9.000</p>
            <button class="btn-checkout">Checkout</button>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">About KEDAI NENEK</a>
                <a href="#">Help Center</a>
                <a href="#">KEDAI NENEK Blog</a>
                <a href="#">KEDAI NENEK Mobile</a>
            </div>
            <div class="footer-copyright">
                &copy; 2021 KEDAI NENEK
            </div>
        </div>
    </footer>

</body>

</html>
