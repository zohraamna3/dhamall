<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
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
                    <a class="nav-link fw-bold text-dark" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Combos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Joggers</a>
                </li>
            </ul>

            <!-- Search Bar -->
            <div class="ms-auto d-flex align-items-center">
                <div class="input-group w-100 me-3" style="max-width: 200px;">
                    <span class="input-group-text bg-white border">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Search">
                </div>

                <!-- Icons (Wishlist, Profile, Cart) -->
                <a href="#" class="text-dark me-3"><i class="bi bi-heart"></i></a>
                <a href="#" class="text-dark me-3"><i class="bi bi-person"></i></a>
                <a href="#" class="text-dark"><i class="bi bi-cart"></i></a>
            </div>
        </div>
    </div>
</nav>
