<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold me-0" href="/">
            <x-logo /> <!-- Include the logo component -->
        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Search Bar -->
            <div class="ms-auto d-flex align-items-center flex-column flex-lg-row">
                <div class="input-group w-100 search-container mb-3 mb-lg-0">
                    <input type="text" class="form-control bg-light text-dark search-input" placeholder="Search">
                    <button class="btn btn-outline-light search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <!-- Icons (Wishlist, Profile, Cart) -->
            <div class="ms-auto d-flex align-items-center flex-column flex-lg-row d-none d-lg-flex">
                <!-- Wishlist Icon -->
                <div class="position-relative me-lg-3 mb-3 mb-lg-0">
                    <a href="#" class="text-light icon" id="wishlistIcon">
                        <i class="bi bi-heart icon-hover"></i>
                    </a>
                    <!-- Wishlist Dropdown -->
                    <div class="wishlist-dropdown dropdown-menu">
                        <div class="p-3">
                            <h6 class="mb-3">Your Wishlist</h6>
                            <div class="wishlist-items">
                                <!-- Placeholder for wishlist items -->
                                <p class="text-muted">Your wishlist is empty.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Icon -->
                <div class="position-relative me-lg-3 mb-3 mb-lg-0">
                    <a href="#" class="text-light icon" id="profileIcon">
                        <i class="bi bi-person icon-hover"></i>
                    </a>
                    <!-- Profile Dropdown -->
                    <div class="profile-dropdown dropdown-menu">
                        <div class="p-3">
                            <h6 class="mb-3">Your Profile</h6>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-dark">My Account</a></li>
                                <li><a href="#" class="text-dark">Order History</a></li>
                                <li><a href="#" class="text-dark">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a href="#" class="text-dark">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cart Icon -->
                <div class="position-relative">
                    <a href="#" class="text-light icon" id="cartIcon">
                        <i class="bi bi-cart icon-hover"></i>
                    </a>
                    <!-- Cart Dropdown -->
                    <div class="cart-dropdown dropdown-menu">
                        <div class="p-3">
                            <h6 class="mb-3">Your Cart</h6>
                            <div class="cart-items">
                                <!-- Placeholder for cart items -->
                                <p class="text-muted">Your cart is empty.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    width: 100%; /* Full width on small screens */
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
.icon {
    font-size: 20px;
    transition: color 0.3s ease, transform 0.3s ease;
}
.icon-hover:hover {
    color: #b3a31c !important; /* Change color to match search button hover */
    transform: scale(1.2); /* Resize the icon */
}

/* Dropdown Styling */
.wishlist-dropdown, .cart-dropdown, .profile-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: calc(100% + 10px);
    width: 300px;
    max-width: calc(100vw - 20px);
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    overflow-y: auto;
    min-height: 200px;
    transform: translateX(-100%);
}
.wishlist-dropdown.show, .cart-dropdown.show, .profile-dropdown.show {
    display: block;
}

.profile-dropdown a {
    text-decoration: none; /* Removes underlining */
}
.profile-dropdown a:hover {
    text-decoration: none; /* Ensures it stays removed on hover */
}

/* Mobile-specific styles */
@media (max-width: 991.98px) {
    .navbar-collapse {
        padding-top: 10px;
    }
    .search-container {
        max-width: 100%; /* Full width on small screens */
    }
    .icon {
        margin-bottom: 10px; /* Add spacing between icons */
    }
}
</style>

<script>
// Show dropdown on hover (for desktop)
document.getElementById('wishlistIcon').addEventListener('mouseenter', () => {
    document.querySelector('.wishlist-dropdown').classList.add('show');
});
document.getElementById('wishlistIcon').addEventListener('mouseleave', () => {
    document.querySelector('.wishlist-dropdown').classList.remove('show');
});

document.getElementById('cartIcon').addEventListener('mouseenter', () => {
    document.querySelector('.cart-dropdown').classList.add('show');
});
document.getElementById('cartIcon').addEventListener('mouseleave', () => {
    document.querySelector('.cart-dropdown').classList.remove('show');
});

document.getElementById('profileIcon').addEventListener('mouseenter', () => {
    document.querySelector('.profile-dropdown').classList.add('show');
});
document.getElementById('profileIcon').addEventListener('mouseleave', () => {
    document.querySelector('.profile-dropdown').classList.remove('show');
});
</script>