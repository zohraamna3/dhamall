<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Dhamall')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 15px;
            position: fixed;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px;
            display: block;
        }
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Dhamall Admin</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.seller.requests') }}" class="nav-link">Seller Requests</a></li>
            <li class="nav-item"><a href="{{ route('admin.categories') }}" class="nav-link">Manage Categories</a></li>
            <li class="nav-item"><a href="{{ route('admin.sellers') }}" class="nav-link">Statistics</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Manage Sellers</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
