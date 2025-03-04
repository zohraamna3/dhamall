<!-- Toggle Button -->
<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-chevron-right"></i> <!-- Bootstrap Icons "chevron-right" icon -->
</button>

<!-- Profile Menu -->
<div class="sidebar" id="profile-menu" style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); padding: 30px;">
    <h4 class="text-warning p-0 mb-3">Profile Menu</h4>
    <div class="list-group shadow-sm rounded">
        <a href="#" class="list-group-item list-group-item-action active" data-section="personal-details"
           data-title="Personal Information">
            <i class="bi bi-person-circle me-2"></i> Personal Information
        </a>
        <a href="#" class="list-group-item list-group-item-action" data-section="my-orders"
           data-title="My Orders">
            <i class="bi bi-bag-check me-2"></i> My Orders
        </a>
        <a href="#" class="list-group-item list-group-item-action" data-section="wishlist"
           data-title="My Wishlist">
            <i class="bi bi-heart me-2"></i> My WishList
        </a>
        <a href="#" class="list-group-item list-group-item-action" data-section="cart" data-title="My Cart">
            <i class="bi bi-cart me-2"></i> My Cart
        </a>
        <a href="#" class="list-group-item list-group-item-action" data-section="payment"
           data-title="Payment Details">
            <i class="bi bi-credit-card me-2"></i> Payment Details
        </a>
        <a href="#" class="list-group-item list-group-item-action" data-section="notifications"
           data-title="Notifications">
            <i class="bi bi-bell me-2"></i> Notifications
        </a>
    </div>
</div>

<!-- Toggle Script -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('profile-menu');
        sidebar.classList.toggle('active'); // Add a CSS class for collapsed state
    }
</script>
