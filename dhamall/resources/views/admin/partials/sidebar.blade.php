<!-- Sidebar -->
<!-- Sidebar -->
<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-chevron-right"></i> <!-- Bootstrap Icons "chevron-right" icon -->
</button>
<div class="sidebar" id="sidebar">
    <h4 class="text-warning">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('admin.seller.requests') }}" class="nav-link">Seller Requests</a></li>
        <li class="nav-item"><a href="{{ route('admin.categories') }}" class="nav-link">Manage Categories</a></li>
        <li class="nav-item"><a href="{{ route('admin.sellers') }}" class="nav-link">Statistics</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Manage Sellers</a></li>
    </ul>
</div>

<script>
    
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>
