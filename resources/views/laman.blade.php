<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand img {
            height: 40px;
        }
        .search-bar {
            width: 100%;
            max-width: 400px;
        }
        .promo-text {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Top Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://example.com/aliexpress-logo.png" alt="AliExpress">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex mx-auto">
                    <input class="form-control me-2 search-bar" type="search" placeholder="bluetooth earphone" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Download the app</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AliExpress Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign in / Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-cart"></i> Cart
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Subheader with Categories, Promotion -->
    <div class="bg-light py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    All Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="#">Electronics</a></li>
                    <li><a class="dropdown-item" href="#">Clothing</a></li>
                    <li><a class="dropdown-item" href="#">Shoes</a></li>
                    <!-- Add more categories as needed -->
                </ul>
            </div>
            <div class="promo-text">
                3 days starting from US $2.99
            </div>
            <div>
                <a href="#" class="btn btn-outline-primary">Super Deals</a>
                <a href="#" class="btn btn-outline-primary">Plus</a>
                <a href="#" class="btn btn-outline-primary">New Arrivals</a>
            </div>
        </div>
    </div>

    <!-- Main content (Product Grid) -->
    <div class="container my-5">
        <div class="row">
            <!-- The product grid from previous example will go here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
