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
            <ul class="navbar-nav ms-auto">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-hover nav-link text-white">Dashboard</a>
                </li>

                <!-- Seller Requests Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.seller.requests') }}" class="nav-hover nav-link text-white">Seller Requests</a>
                </li>

                <!-- Manage Categories Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.categories') }}" class="nav-hover nav-link text-white">Manage Categories</a>
                </li>

                <!-- Manage Sellers Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.sellers') }}" class="nav-hover nav-link text-white">Manage Sellers</a>
                </li>
            </ul>

            <!-- Authentication Buttons -->
            <div class="d-flex align-items-center ms-lg-3">
                @auth
                    <!-- Show Logout Button if User is Logged In -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
<style>

    /* Button Styling */
    .btn-outline-light {
        border-color: #fff;
        color: #fff;
        transition: all 0.3s ease;
    }
    .btn-outline-light:hover {
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
.nav-hover nav-link text-white{
    color: white;
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

/* Mobile-specific styles */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            padding-top: 10px;
        }
        .nav-item {
            margin-bottom: 10px; /* Add spacing between nav items on mobile */
        }
        .d-flex.align-items-center.ms-lg-3 {
            flex-direction: column; /* Stack buttons vertically on mobile */
            margin-top: 10px;
        }
        .btn-outline-light, .btn-signup {
            width: 100%; /* Full width buttons on mobile */
            margin-bottom: 10px;
        }
    }
</style>
