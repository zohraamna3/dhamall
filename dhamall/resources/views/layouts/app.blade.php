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
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .btn-signup { border: 1px solid #6f42c1; color: #6f42c1; }
        .btn-login { background-color: #6f42c1; color: white; }
        .btn-signin { border: 1px solid #6f42c1; color: white; background-color: #6f42c1; }
        .btn-outline-dark:hover { background-color: #6f42c1; border: 1px solid #6f42c1; }
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
        /* body {
            background-blend-mode: overlay;
            background-color: black;
        } */


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
    </style>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">


</head>
<body>
    @include('layouts.header')  <!-- Include the navbar -->

    <!-- Breadcrumb Section -->
    
    <div class="container-fluid px-0">
        @yield('hero')  <!-- Page content will be inserted here -->
    </div>
    
    <div class="container mt-3">
        @yield('breadcrumb')
    </div>

    <div class="container mt-4">
        @yield('content')  <!-- Page content will be inserted here -->
    </div>

    @include('layouts.footer')  <!-- Include the footer -->

</body>
</html>
