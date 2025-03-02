<!-- Sidebar -->
<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-chevron-right"></i> <!-- Bootstrap Icons "chevron-right" icon -->
</button>
<div class="sidebar" id="sidebar" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px;">
    <h4 class="text-warning p-0 mb-3">Seller Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('seller.dashboard') }}" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('seller.products') }}" class="nav-link">My Products</a></li>
        <li class="nav-item"><a href="{{ route('seller.orders') }}" class="nav-link">Orders</a></li>
        <li class="nav-item"><a href="{{ route('seller.reviews') }}" class="nav-link">Reviews</a></li>
        <li class="nav-item"><a href="{{ route('seller.profile') }}" class="nav-link">My Profile</a></li>
    </ul>
</div>