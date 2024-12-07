<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Kedai Nenek</title>
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
</head>
<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
        overflow-x: hidden;
    }

    h1,
    h2,
    h3 {
        margin: 0;
        padding: 0;
        color: #222;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .product-detail-page {
        display: flex;
        padding: 20px;
        background: #fff;
        margin: 20px auto;
        max-width: 1200px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    /* Gallery Styling */
    .gallery {
        flex: 1;
        margin-right: 20px;
    }

    .gallery .main-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .gallery .main-image img:hover {
        transform: scale(1.05);
    }

    .gallery .thumbnails {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .gallery .thumbnails img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .gallery .thumbnails img:hover {
        transform: scale(1.1);
    }

    /* Product Info Styling */
    .product-info {
        flex: 2;
        padding: 20px;
    }

    .product-info h1 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .rating {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .price-section {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .price-section .current-price {
        font-size: 24px;
        color: #d0011b;
        font-weight: bold;
    }

    .price-section .original-price {
        font-size: 16px;
        color: #aaa;
        text-decoration: line-through;
    }

    .price-section .discount {
        font-size: 16px;
        color: #007bff;
    }

    .variants h3 {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .variants .variant-options button {
        padding: 10px 20px;
        margin-right: 10px;
        border: 1px solid #ddd;
        background: #f4f4f9;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .variants .variant-options button:hover {
        background: #e0e0e0;
    }

    .purchase-section {
        display: flex;
        align-items: center;
        margin-top: 20px;
    }

    .purchase-section .quantity {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-right: 20px;
    }

    .purchase-section .quantity input {
        width: 50px;
        padding: 5px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .purchase-section .buttons button {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .purchase-section .buttons .buy-now {
        background: #007bff;
    }

    .purchase-section .buttons .buy-now:hover {
        background: #0056b3;
    }

    .purchase-section .buttons .add-to-cart {
        background: #ff9900;
    }

    .purchase-section .buttons .add-to-cart:hover {
        background: #cc7a00;
    }

    /* Product Details Section */
    .product-details {
        padding: 20px;
        background: #fff;
        margin: 20px auto;
        max-width: 1200px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    /* Recommended Items */
    .recommended-items {
        padding: 20px;
        background: #fff;
        margin: 20px auto;
        max-width: 1200px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .recommended-items h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .recommendation-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .item {
        text-align: center;
        border: 1px solid #ddd;
        padding: 10px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .item:hover {
        transform: scale(1.05);
    }

    .item p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .item span {
        font-size: 14px;
        color: #d0011b;
        font-weight: bold;
    }

    /* Fade-In Animation */
    .fade-in {
        opacity: 1 !important;
        transform: translateY(0) !important;
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
    <div class="product-detail-page">
        <!-- Bagian Galeri Gambar -->
        <div class="gallery">
            <div class="main-image">
                <img id="mainImage" src="{{ asset('assets/images/ademsari.jpg') }}" alt="Product">
            </div>
            <div class="thumbnails">
                <img src="{{ asset('assets/images/ademsari.jpg') }}" alt="Thumbnail" class="thumbnail"
                    data-image="{{ asset('assets/images/ademsari.jpg') }}">
                <img src="{{ asset('assets/images/cokolatos.jpg') }}" alt="Thumbnail" class="thumbnail"
                    data-image="{{ asset('assets/images/cokolatos.jpg') }}">
                <img src="{{ asset('assets/images/lasegar.jpg') }}" alt="Thumbnail" class="thumbnail"
                    data-image="{{ asset('assets/images/lasegar.jpg') }}">
                <img src="{{ asset('assets/images/miegoreng.jpg') }}" alt="Thumbnail" class="thumbnail"
                    data-image="{{ asset('assets/images/miegoreng.jpg') }}">
            </div>
        </div>


        <!-- Bagian Informasi Produk -->
        <div class="product-info">
            <h1>Adem Sari</h1>
            <div class="rating">
                <span>4.8 ★</span>
                <span class="reviews">795 Penilaian | 1,6RB Terjual</span>
            </div>

            <div class="price-section">
                <span class="current-price">Rp1.500</span>
                <span class="original-price">Rp3.000</span>
                <span class="discount">-50%</span>
            </div>

            <div class="details">
                <div class="detail-item">
                    <span>Pengembalian:</span> <span>Bebas Pengembalian</span>
                </div>
                <div class="detail-item">
                    <span>Proteksi:</span> <span>Proteksi Kerusakan</span>
                </div>
                <div class="detail-item">
                    <span>Pengiriman ke:</span> <span>KOTA PEKANBARU</span>
                </div>
            </div>

            <div class="variants">
                <h3>Warna</h3>
                <div class="variant-options">
                    <button>Hijau</button>
                    <button>Merah</button>
                    <button>Biru</button>
                    <button>Hitam</button>
                </div>
            </div>

            <div class="purchase-section">
                <div class="quantity">
                    <label for="quantity">Jumlah:</label>
                    <input type="number" id="quantity" value="1" min="1">
                </div>
                <div class="buttons">
                    <button class="buy-now">Beli Sekarang</button>
                    <button class="add-to-cart">Tambah ke Keranjang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Detail Produk -->
    <div class="product-details">
        <h2>Detail Produk</h2>
        <p>
            Adem Sari adalah minuman herbal tradisional yang membantu meredakan panas dalam dan menyegarkan tubuh.
            Produk ini terbuat dari bahan alami yang cocok dikonsumsi kapan saja.
        </p>
        <h3>Sisa Stok: 150</h3>
    </div>

    <!-- Bagian Item Rekomendasi -->
    <div class="recommended-items">
        <h2>Rekomendasi untuk Anda</h2>
        <div class="recommendation-grid">
            <div class="item">
                <img src="{{ asset('assets/images/cokolatos.jpg') }}" alt="Cokolatos">
                <p>Cokolatos Stick</p>
                <span>Rp10.000</span>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/lasegar.jpg') }}" alt="Lasegar">
                <p>Lasegar</p>
                <span>Rp15.000</span>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/miegoreng.jpg') }}" alt="Mie Goreng">
                <p>Mie Goreng</p>
                <span>Rp5.000</span>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Observer untuk animasi fade-in yang berulang
            const sections = document.querySelectorAll('.product-details, .recommended-items');
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('fade-in');
                        } else {
                            entry.target.classList.remove('fade-in');
                        }
                    });
                },
                {
                    threshold: 0.1 // Menentukan seberapa banyak elemen harus terlihat agar animasi terjadi
                }
            );
            sections.forEach((section) => observer.observe(section));

            // Interaktivitas untuk mengganti gambar produk
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('mainImage');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', () => {
                    mainImage.src = thumbnail.dataset.image; // Ganti gambar utama dengan data dari thumbnail
                });
            });
        });
    </script>

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
