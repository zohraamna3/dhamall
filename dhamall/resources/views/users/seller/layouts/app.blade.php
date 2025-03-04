<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seller Dashboard - Dhamall')</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Seller-specific CSS -->
    <link rel="stylesheet" href="{{ asset('css/seller-admin.css') }}">

    @stack('styles') <!-- Optional: For additional styles -->

    <style>


        /* Breadcrumb Background */
        .custom-breadcrumb {
            background-color: #1a1a2e;
            border-radius: 8px;
            padding: 12px 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
        }
        .breadcrumb a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
            font-weight: bold;
        }

        .breadcrumb a:hover {
            color: #1565c0;
        }

        /* Active Item */
        .breadcrumb-item.active {
            font-weight: bold;
            color: #b3a31c;
        }

        /* Change the "/" Separator to White */
        .breadcrumb-item + .breadcrumb-item::before {
            color: white !important;
        }

    </style>
</head>
<body>
    <!-- Include Seller Header -->
    @include('users.seller.partials.header')

    <!-- Grid Layout for Sidebar and Main Content -->
    <div class="grid-container">
        @include('users.seller.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('breadcrumb')
            @yield('content')  <!-- Page content will be inserted here -->
        </div>
    </div>


    <!-- Include Seller Footer -->
    @include('users.seller.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/seller/seller.css') }}"></script>

    @stack('scripts') <!-- Optional: For additional scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.querySelector('.toggle-btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });
    });
</script>
</body>
</html>
