<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dhamall')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .btn-signup { border: 1px solid #6f42c1; color: #6f42c1; }
        .btn-login { background-color: #6f42c1; color: white; }
        .btn-signin { border: 1px solid #6f42c1; color: white; background-color: #6f42c1; }
        .btn-outline-dark:hover { background-color: #6f42c1; border: 1px solid #6f42c1; }
    </style>
</head>
<body>
    @include('layouts.header')  <!-- Include the navbar -->

    <div class="container mt-4">
        @yield('content')  <!-- Page content will be inserted here -->
    </div>

    @include('layouts.footer')  <!-- Include the footer -->

</body>
</html>
