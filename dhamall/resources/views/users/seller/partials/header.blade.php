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
            @auth
            <ul class="navbar-nav ms-auto">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-white" href="{{ route('seller.dashboard') }}">Dashboard</a>
                </li>

                <!-- My Profile Link -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-white" href="{{ route('seller.profile') }}">My Profile</a>
                </li>

                <!-- Orders Link -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-white" href="{{ route('seller.orders') }}">Orders</a>
                </li>

                <!-- Reviews Link -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-white" href="{{ route('seller.reviews') }}">Reviews</a>
                </li>

                <!-- My Products Link -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-white" href="{{ route('seller.products') }}">My Products</a>
                </li>
            </ul>
                <div class="d-flex align-items-center ms-lg-3">
                    <!-- Show Logout Button if User is Logged In -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </div>

            @else
                <ul class="navbar-nav me-auto">
                    <!-- Empty ul to push buttons to the end -->
                </ul>
                <div class="d-flex align-items-center ms-lg-3">
                    <!-- Show Sign In and Sign Up Buttons if User is Not Logged In -->
                    <a href="{{ route('signin') }}" class="btn btn-outline-light me-2">Sign In</a>
                    <a href="{{ route('signup') }}" class="btn btn-signup">Sign Up</a>
                </div>
            @endauth

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
.nav-link{
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
