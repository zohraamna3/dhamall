<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Dhamall Logo" height="40">
        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-4">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-light nav-hover" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-hover" href="#">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-hover" href="#">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-hover" href="#">Combos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light nav-hover" href="#">Joggers</a>
                </li>
            </ul>

            <!-- Search Bar -->
            <div class="ms-auto d-flex align-items-center">
                <div class="input-group w-100 me-3 search-container">
                    <input type="text" class="form-control bg-light text-dark search-input" placeholder="Search">
                    <button class="btn btn-outline-light search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Icons (Wishlist, Profile, Cart) -->
                <a href="#" class="text-light me-3 icon-hover"><i class="bi bi-heart"></i></a>
                <a href="#" class="text-light me-3 icon-hover"><i class="bi bi-person"></i></a>
                <a href="#" class="text-light icon-hover"><i class="bi bi-cart"></i></a>
            </div>
        </div>
    </div>
</nav>

<style>
/* Navbar Styling */
.navbar {
    background: linear-gradient(135deg, #1a1a2e, #0d0d1a);
    padding: 15px 20px;
}
.navbar-brand img {
    transition: transform 0.3s ease;
}
.navbar-brand:hover img {
    transform: scale(1.1);
}
.nav-hover {
    position: relative;
    transition: color 0.3s ease;
}
.nav-hover:hover {
    color: #f8d210 !important;
}
.nav-hover::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: #f8d210;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}
.nav-hover:hover::after {
    width: 100%;
}

/* Search Bar */
.search-container {
    max-width: 250px;
}
.search-input {
    border-radius: 20px 0 0 20px;
    padding: 8px 15px;
}
.search-btn {
    border-radius: 0 20px 20px 0;
    border: 1px solid #fff;
}
.search-btn:hover {
    background-color: #f8d210;
    color: #000;
}

/* Icon Styling */
.icon-hover {
    font-size: 20px;
    transition: color 0.3s ease, transform 0.3s ease;
}
.icon-hover:hover {
    color: #f8d210 !important;
    transform: scale(1.2);
}
</style>
