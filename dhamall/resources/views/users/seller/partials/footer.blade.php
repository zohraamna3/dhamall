<footer class="footer bg-gradient text-white">
    <div class="container py-5">
        <div class="row">
            <!-- Seller Support -->
            <div class="col-md-4">
                <h5 class="fw-bold">Seller Support</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('help-center')}}" class="footer-link">Help Center</a></li>
                    <li><a href="{{route('seller-guidelines')}}" class="footer-link">Seller Guidelines</a></li>
                    <li><a href="{{route('contact-support')}}" class="footer-link">Contact Support</a></li>
                    <li><a href="{{route('faqs-seller')}}" class="footer-link">FAQs for Sellers</a></li>
                </ul>
            </div>

            <!-- Seller Resources -->
            <div class="col-md-4">
                <h5 class="fw-bold">Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('seller.dashboard')}}" class="footer-link">Seller Dashboard</a></li>
                    <li><a href="{{route('seller.products')}}" class="footer-link">Product Management</a></li>
                    <li><a href="{{route('seller.orders')}}" class="footer-link">Order Management</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="col-md-4">
                <h5 class="fw-bold">Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('terms-of-service')}}" class="footer-link">Terms of Service</a></li>
                    <li><a href="{{route('privacy-policy-seller')}}" class="footer-link">Privacy Policy</a></li>
                    <li><a href="{{route('seller-agreement')}}" class="footer-link">Seller Agreement</a></li>
                </ul>
            </div>
        </div>

        <!-- Social Media -->
        <div class="text-center mt-4">
            <h5 class="fw-bold">Follow Us</h5>
            <div class="social-icons">
                <a href="https://www.facebook.com/" class="social-icon"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/" class="social-icon"><i class="bi bi-instagram"></i></a>
                <a href="https://www.twitter.com/" class="social-icon"><i class="bi bi-twitter"></i></a>
                <a href="https://www.linkedin.com/" class="social-icon"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <hr class="border-light">
            <p class="mb-0">&copy; 2025 Dhamall Seller Panel. All rights reserved.</p>
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
