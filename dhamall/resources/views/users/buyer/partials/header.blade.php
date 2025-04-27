<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold me-0" href="/">
            <x-logo /> <!-- Include the logo component -->
        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- Search bar --}}
            <div class="ms-auto d-flex align-items-center flex-column flex-lg-row">
                <form action="{{ route('search') }}" method="get" class="input-group w-100 mb-3 mb-lg-0">
                    <input name="query" type="text" class="form-control bg-light text-dark search-input" placeholder="Search" aria-label="Search">
                    <button type="submit" class="btn btn-outline-light search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <!-- Icons (Wishlist, Profile, Cart) -->
            @auth
                <div class="ms-auto d-flex align-items-center flex-column flex-lg-row">
                    <!-- Wishlist Icon -->
                    <div class="position-relative me-lg-3 mb-3 mb-lg-0">
                        <a href="#" class="text-light icon d-flex text-decoration-none" id="wishlistIcon">
                            <i class="bi bi-heart icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Wishlist</span>
                        </a>
                        <!-- Wishlist Dropdown -->
                        <div class="wishlist-dropdown dropdown-menu">
                            <div class="p-3">
                                <h6 class="mb-3">Your Wishlist</h6>
                                <div class="wishlist-items">
                                    @php
                                        $wishlistItems = \App\Http\Controllers\Buyer\WishlistController::getWishlistDetails();
                                    @endphp
                                    @if ($wishlistItems->isEmpty())
                                        <p class="text-muted">Your wishlist is empty.</p>
                                    @else
                                        <div class="wishlist-item-list">
                                            @foreach ($wishlistItems as $item)
                                                <div class="wishlist-item d-flex justify-content-between align-items-center" data-id="{{ $item->id }}">
                                                    <span class="product-name">{{ $item->product->ProductName }}</span>
                                                    <i class="bi bi-x-circle remove-icon" onclick="removeFromWishlist({{ $item->id }})" title="Remove item"></i>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Icon -->
                    <div class="position-relative me-lg-3 mb-3 mb-lg-0">
                        <a href="{{ route('profile.edit') }}" class="text-light icon d-flex text-decoration-none" id="profileIcon">
                            <i class="bi bi-person icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Your Profile</span>
                        </a>
                        <!-- Profile Dropdown -->
                        <div class="profile-dropdown dropdown-menu">
                            <div class="p-3">
                                @if (Auth::check())
                                    <h6 class="mb-3">
                                        Welcome, <strong>{{ Auth::user()->Name }}</strong>
                                    </h6>
                                @else
                                    <h6 class="mb-3">
                                        Welcome, <strong>Guest</strong>
                                    </h6>
                                @endif
                                <a href="/profile" class="dropdown-item">
                                    <i class="bi bi-person me-2"></i> My Profile
                                </a>
                                <a href="/profile" class="dropdown-item">
                                    <i class="bi bi-cart me-2"></i> My Orders
                                </a>
                                <a href="/logout" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Icon -->
                    <div class="position-relative">
                        <a href="{{ route('profile.edit') }}" class="text-light icon d-flex text-decoration-none" id="cartIcon">
                            <i class="bi bi-cart icon-hover"></i>
                            <span class="d-block d-lg-none ps-3 ps-lg-0"> Cart</span>
                        </a>
                        <!-- Cart Dropdown -->
                        <div class="cart-dropdown dropdown-menu">
                            <div class="p-3">
                                <h6 class="mb-3">Your Cart</h6>
                                <div class="cart-items">
                                    @php
                                        $cartItems = \App\Http\Controllers\Buyer\CartController::getCartDetails();
                                    @endphp
                                    @if ($cartItems->isEmpty())
                                        <p class="empty-cart">Your cart is empty.</p>
                                    @else
                                        <div class="cart-item-list">
                                            @foreach ($cartItems as $item)
                                                <div class="cart-item">
                                                    <span class="product-name">{{ $item->product->ProductName }}</span>
                                                    <span class="product-quantity">{{ $item->Quantity }} x ${{ number_format($item->PricePerUnit, 2) }}</span>
                                                    <i class="bi bi-x-circle remove-icon" onclick="removeFromCart({{ $item->id }})" title="Remove item"></i>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="total">Total: ${{ number_format($cartItems->sum('TotalPrice'), 2) }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            <!-- Authentication Buttons -->
            <div class="d-flex align-items-center ms-lg-3">
                @auth
                    <!-- Show Logout Button if User is Logged In -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline">Logout</button>
                    </form>
                @else
                    <!-- Show Sign In and Sign Up Buttons if User is Not Logged In -->
                    <a href="{{ route('signin') }}" class="btn btn-outline me-2">Sign In</a>
                    <a href="{{ route('signup') }}" class="btn btn-signup">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* Navbar Styling */

    /* Button Styling */
    .btn-outline {
        border-color: #fff;
        color: #fff;
        transition: all 0.3s ease;
    }
    .btn-outline:hover {
        background-color: #f8d210;
        border-color: #f8d210;
        color: #000;
    }
    .btn-signup {
        background-color: #f8d210;
        border-color: #f8d210;
        color: #000;
        transition: all 0.3s ease;
    }
    .btn-signup:hover {
        background-color: #b3a31c;
        border-color: #b3a31c;
    }
    .navbar {
        background: linear-gradient(135deg, #1a1a2e, #0d0d1a);
        padding: 15px 20px;
    }
    .navbar-brand img {
        transition: transform 0.3s ease;
    }
    .navbar-brand:hover img {
        transform: scale(1.1);
    }
    .nav-hover {
        position: relative;
        transition: color 0.3s ease;
    }
    .nav-hover:hover {
        color: #f8d210 !important;
    }
    .nav-hover::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #f8d210;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    .nav-hover:hover::after {
        width: 100%;
    }

    /* Search Bar */
    .search-container {
        max-width: 250px;
        width: 100%; /* Full width on small screens */
    }
    .search-input {
        border-radius: 20px 0 0 20px;
        padding: 8px 15px;
    }
    .search-btn {
        border-radius: 0 20px 20px 0;
        border: 1px solid #fff;
    }
    .search-btn:hover {
        background-color: #f8d210;
        color: #000;
    }

    /* Icon Styling */
    .icon {
        font-size: 20px;
        transition: color 0.3s ease, transform 0.3s ease;
    }
    .icon-hover:hover {
        color: #b3a31c !important; /* Change color to match search button hover */
        transform: scale(1.2); /* Resize the icon */
    }

    /* Wishlist & Cart Dropdown Styling */
    .wishlist-dropdown, .cart-dropdown {
        display: none;
        position: absolute;
        right: 0;
        top: calc(100% + 10px);
        width: 300px;
        max-width: calc(100vw - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        overflow-y: auto;
        min-height: 200px;
        transform: translateX(-100%);
    }
    .wishlist-dropdown.show, .cart-dropdown.show {
        display: block;
    }

    /* Remove icon styling */
    .remove-icon {
        font-size: 20px; /* Increase icon size for better visibility */
        color: #dc3545; /* Red color for delete icon */
        cursor: pointer; /* Pointer cursor on hover */
        transition: color 0.3s; /* Smooth color transition */
    }
    .remove-icon:hover {
        color: #c82333; /* Darker red on hover */
    }

    /* Item styling */
    .wishlist-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 15px; /* More padding for a spacious look */
        border-bottom: 1px solid #f1f1f1; /* Separator between items */
    }
    .wishlist-item:last-child {
        border-bottom: none; /* Remove last item border */
    }
    .wishlist-item:hover {
        background-color: #f8f9fa; /* Subtle hover effect */
    }

    .empty-cart, .empty-wishlist {
        text-align: center;
        color: #6c757d;
        padding: 20px;
    }
</style>

<script>
    function setupDropdownHover() {
        if (window.innerWidth > 991) {
            const dropdowns = [
                {
                    icon: document.getElementById('wishlistIcon'),
                    dropdown: document.querySelector('.wishlist-dropdown')
                },
                {
                    icon: document.getElementById('cartIcon'),
                    dropdown: document.querySelector('.cart-dropdown')
                },
                {
                    icon: document.getElementById('profileIcon'),
                    dropdown: document.querySelector('.profile-dropdown')
                }
            ];

            dropdowns.forEach(({ icon, dropdown }) => {
                if (icon && dropdown) {
                    // Show dropdown on icon hover
                    icon.addEventListener('mouseenter', () => {
                        // First close all dropdowns before opening the hovered one
                        dropdowns.forEach(({ dropdown: otherDropdown }) => {
                            if (otherDropdown !== dropdown) {
                                otherDropdown.classList.remove('show');
                            }
                        });
                        dropdown.classList.add('show');
                    });

                    // Click event to close dropdowns
                    document.addEventListener('click', (event) => {
                        const target = event.target;

                        // If the click is outside the icon and dropdown, close the dropdown
                        if (!icon.contains(target) && !dropdown.contains(target)) {
                            dropdown.classList.remove('show');
                        }
                    });

                    // Maintain dropdown visibility when hovering over the dropdown
                    dropdown.addEventListener('mouseenter', () => {
                        dropdown.classList.add('show');
                    });

                    dropdown.addEventListener('mouseleave', () => {
                        dropdown.classList.remove('show'); // Optional - remove if you don't want it to close on mouse leave
                    });
                }
            });
        }
    }

    // Run the function on page load
    setupDropdownHover();

    // Re-run the function if the window is resized
    window.addEventListener('resize', setupDropdownHover);

    // Remove From Cart Function
    function removeFromCart(itemId) {
        fetch(`/cart/remove/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // This will refresh the page to show updated cart
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Remove From Wishlist Function
    function removeFromWishlist(itemId) {
        fetch(`/wishlist/remove/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Optional: Remove the item from the DOM without reloading.
                    // You can find the specific item element and remove it.
                    const itemElement = document.querySelector(`.wishlist-item[data-id="${itemId}"]`);
                    if (itemElement) {
                        itemElement.remove();
                    }

                    // Optionally, you can also show a success message or handle updates here.
                    console.log(data.message);
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
