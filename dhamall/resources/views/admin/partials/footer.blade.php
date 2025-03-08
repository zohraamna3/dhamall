<footer class="footer bg-gradient text-white">
    <div class="container py-5">
        <div class="row">
            <!-- Admin Support -->
            <div class="col-md-4">
                <h5 class="fw-bold">Admin Support</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.dashboard') }}" class="footer-link">Dashboard</a></li>
                    <li><a href="{{ route('admin.seller.requests') }}" class="footer-link">Seller Requests</a></li>
                    <li><a href="{{ route('admin.categories') }}" class="footer-link">Manage Categories</a></li>
                    <li><a href="{{ route('admin.sellers') }}" class="footer-link">Manage Sellers</a></li>
                </ul>
            </div>

            <!-- Admin Resources -->
            <div class="col-md-4">
                <h5 class="fw-bold">Admin Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('admin.sellers')}}" class="footer-link">Seller Management</a></li>
                    <li><a href="{{route('admin.categories')}}" class="footer-link">Product Management</a></li>
                </ul>
            </div>


        </div>

        <!-- Social Media -->
        <div class="text-center mt-4">
            <h5 class="fw-bold">Follow Us</h5>
            <div class="social-icons">
                <a href="https://www.facebook.com" class="social-icon" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.instagram.com" class="social-icon" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://twitter.com" class="social-icon" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/" class="social-icon" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
        </div>

        <!-- Software Company Name -->
        <div class="text-center mt-4">
            <p class="mb-0">Powered by <strong>TechNova Solutions</strong></p>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <hr class="border-light">
            <p class="mb-0">&copy; 2025 Dhamall Admin Panel. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
    /* Footer Styling */
    .footer {
        background: black;
        color: white;
        padding: 50px 0;
    }
    .footer-link {
        color: #aaa;
        text-decoration: none;
        transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
    }
    .footer-link:hover {
        color: #fff;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
    }
    .social-icon {
        font-size: 24px;
        color: #888;
        transition: transform 0.3s ease, color 0.3s ease;
    }
    .social-icon:hover {
        color: #fff;
        transform: scale(1.2);
    }
    hr.border-light {
        border-top: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>
