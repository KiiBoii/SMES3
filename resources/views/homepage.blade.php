<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung nenek</title>
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
</head>
<style>
    .product {
    position: relative;
    cursor: pointer;
}

.product form {
    display: inline-block;
}

.product .add-to-cart {
    position: relative;
    z-index: 10;
    cursor: pointer;
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
                </form>
                <a href="#" class="sign-in" style="margin-right: 20px;">Sign in / Register</a>
                <a href="#" class="cart" style="margin-left: auto;">
                    <span class="cart-count">0</span>
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

    <main>
        <div class="container">
            <div class="product-grid">
                <!-- Sample products -->
                <div class="product" onclick="document.getElementById('detail-form-1').submit();">
                    <!-- Form tersembunyi untuk detail produk -->
                    <form id="detail-form-1" action="/detailproduk" method="GET" style="display: none;">
                        <input type="hidden" name="product_id" value="1">
                    </form>

                    <!-- Konten produk -->
                    <img src="{{ asset('assets/images/ademsari.jpg') }}" alt="Product 1">
                    <h3>Adem sari</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> --sold</div>
                    <div class="product-price">Rp.3000</div>

                    <!-- Form untuk tombol Add to Cart -->
                    <form action="/cart" method="GET">
                        @csrf
                        <input type="hidden" name="product_id" value="1">
                        <button class="add-to-cart" type="submit">Add to Cart</button>
                    </form>
                </div>

                <div class="product">
                    <img src="{{ asset('assets/images/cokolatos.jpg') }}" alt="Product 2">
                    <h3>chocolatos</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">Rp.1500</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/download (2).jpg') }}" alt="Product 3">
                    <h3>Milku</h3>
                    <div class="product-rating">★★★★☆</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">4.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <!-- Add as many products as needed -->
                <div class="product">
                    <img src="{{ asset('assets/images/golda.jpg') }}" alt="Product 4">
                    <h3>Golda</h3>
                    <div class="product-rating">★★★★☆</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">5.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/gudanggaram.jpg') }}" alt="Product 5">
                    <h3>Gudang Garam</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/kariayam.jpg') }}" alt="Product 5">
                    <h3>Indomie Kari Ayam</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/miegoreng.jpg') }}" alt="Product 5">
                    <h3>Indomie Goreng</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/promag.jpg') }}" alt="Product 5">
                    <h3>Promag /pcs</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/thepucuk.jpg') }}" alt="Product 5">
                    <h3>Teh Pucuk</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="{{ asset('assets/images/lasegar.jpg') }}" alt="Product 5">
                    <h3>Lasegar</h3>
                    <div class="product-rating">★★★★★</div>
                    <div class="product-sold"> -- sold</div>
                    <div class="product-price">1.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </main>

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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.stopPropagation(); // Mencegah event dari container .product
        });
    });
});

    </script>

</body>

</html>
