<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dhamall')</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Seller-specific CSS -->
    <link rel="stylesheet" href="{{ asset('css/seller-admin.css') }}">

    <style>

        .btn-signup {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }

        .btn-login {
            background-color: #6f42c1;
            color: white;
        }

        .btn-signin {
            border: 1px solid #6f42c1;
            color: white;
            background-color: #6f42c1;
        }

        .btn-outline-dark:hover {
            background-color: #6f42c1;
            border: 1px solid #6f42c1;
        }

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

        /* Breadcrumb Links */
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

        @media (max-width: 575px) {
            .container {
                padding-left: calc(var(--bs-gutter-x) * 1);
                padding-right: calc(var(--bs-gutter-x) * 1);
            }
        }

        /* Grid Layout for Sidebar and Main Content */
        .grid-container {
            display: grid;
            grid-template-columns: 250px 1fr; /* Sidebar width: 250px, Main content takes the rest */
            gap: 20px; /* Space between sidebar and main content */
            min-height: 100vh; /* Full height */
        }

        .main-content {
            padding: 20px;
        }
        @media (max-width: 1400px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
@include('users.buyer.partials.header')  <!-- Include the navbar -->

<!-- Breadcrumb Section -->


<!-- Grid Layout for Sidebar and Main Content -->
<div class="grid-container">
    @include('users.buyer.profile.partials.sidebar')  <!-- Include the sidebar -->

    <!-- Main Content -->
    <div class="main-content">
        @yield('breadcrumb')
        @yield('content')  <!-- Page content will be inserted here -->
    </div>
</div>

@include('users.buyer.partials.footer')  <!-- Include the footer -->

<!-- Bootstrap JS (required for navbar toggle functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
