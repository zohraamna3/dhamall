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
            {{-- Search bar --}}
            <div class="ms-auto d-flex align-items-center flex-column flex-lg-row">
                <div class="input-group w-100 search-container mb-3 mb-lg-0">
                    <input type="text" class="form-control bg-light text-dark search-input" placeholder="Search">
                    <button class="btn btn-outline-light search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <!-- Icons (Wishlist, Profile, Cart) -->
            @auth
                <div class="ms-auto d-flex align-items-center flex-column flex-lg-row">
                    <!-- Wishlist Icon -->
                    <div class="position-relative me-lg-3 mb-3 mb-lg-0">
                        <a href="{{ route('profile.edit', ['section' => 'wishlist']) }}" class="text-light icon d-flex text-decoration-none" id="wishlistIcon">
                            <i class="bi bi-heart icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Wishlist</span>
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
                        <a href="{{ route('profile.edit', ['section' => 'profile']) }}" class="text-light icon d-flex text-decoration-none" id="profileIcon">
                            <i class="bi bi-person icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Your Profile</span>
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
                        <a href="{{ route('profile.edit', ['section' => 'cart']) }}" class="text-light icon d-flex text-decoration-none" id="cartIcon">
                            <i class="bi bi-cart icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Cart</span>
                        </a>
                        <!-- Cart Dropdown -->
                        <div class="cart-dropdown dropdown-menu ">
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
            @endauth

            <!-- Authentication Buttons -->
            <div class="d-flex align-items-center ms-lg-3">
                @auth
                    <!-- Show Logout Button if User is Logged In -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline">Logout</button>
                    </form>
                @else
                    <!-- Show Sign In and Sign Up Buttons if User is Not Logged In -->
                    <a href="{{ route('signin') }}" class="btn btn-outline me-2">Sign In</a>
                    <a href="{{ route('signup') }}" class="btn btn-signup">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<style>
/* Navbar Styling */

/* Button Styling */
.btn-outline {
    border-color: #fff;
    color: #fff;
    transition: all 0.3s ease;
}
.btn-outline:hover {
    background-color: #f8d210;
    border-color: #f8d210;
    color: #000;
}
.btn-signup {
    background-color: #f8d210;
    border-color: #f8d210;
    color: #000;
    transition: all 0.3s ease;
}
.btn-signup:hover {
    background-color: #b3a31c;
    border-color: #b3a31c;
}
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

    .d-flex.align-items-center.ms-lg-3 {
        flex-direction: column; /* Stack buttons vertically on mobile */
        margin-top: 10px;
    }
    .btn-outline, .btn-signup {
        width: 100%; /* Full width buttons on mobile */
        margin-bottom: 10px;
    }
}
</style>
<script>
    function setupDropdownHover() {
        // Check if the screen width is greater than 991px
        if (window.innerWidth > 991) {
            // Show dropdown on hover (for desktop)
            const wishlistIcon = document.getElementById('wishlistIcon');
            const cartIcon = document.getElementById('cartIcon');
            const profileIcon = document.getElementById('profileIcon');

            if (wishlistIcon) {
                wishlistIcon.addEventListener('mouseenter', () => {
                    document.querySelector('.wishlist-dropdown').classList.add('show');
                });
                wishlistIcon.addEventListener('mouseleave', () => {
                    document.querySelector('.wishlist-dropdown').classList.remove('show');
                });
            }

            if (cartIcon) {
                cartIcon.addEventListener('mouseenter', () => {
                    document.querySelector('.cart-dropdown').classList.add('show');
                });
                cartIcon.addEventListener('mouseleave', () => {
                    document.querySelector('.cart-dropdown').classList.remove('show');
                });
            }

            if (profileIcon) {
                profileIcon.addEventListener('mouseenter', () => {
                    document.querySelector('.profile-dropdown').classList.add('show');
                });
                profileIcon.addEventListener('mouseleave', () => {
                    document.querySelector('.profile-dropdown').classList.remove('show');
                });
            }
        }
    }

    // Run the function on page load
    setupDropdownHover();

    // Re-run the function if the window is resized
    window.addEventListener('resize', setupDropdownHover);
</script>
