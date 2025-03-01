<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seller Dashboard - Dhamall')</title>
    
    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/seller-styles.css') }}">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 15px;
            position: fixed;
            transition: all 0.3s ease-in-out;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px;
            display: block;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover,
        .sidebar .active-link {
            background: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: all 0.3s ease-in-out;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -250px;
                width: 250px;
                height: 100%;
                z-index: 1000;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .toggle-btn {
                display: block !important;
                position: absolute;
                left: 15px;
                top: 15px;
                z-index: 1100;
                background: #343a40;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
            }
        }

        .toggle-btn {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
    <div class="sidebar" id="sidebar">
        <h4>Seller Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('seller.dashboard') }}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('seller.products') }}" class="nav-link">My Products</a></li>
            <li class="nav-item"><a href="{{ route('seller.orders') }}" class="nav-link">Orders</a></li>
            <li class="nav-item"><a href="{{ route('seller.reviews') }}" class="nav-link">Reviews</a></li>
            <li class="nav-item"><a href="{{ route('seller.profile') }}" class="nav-link">My Profile</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>

</body>
</html>
