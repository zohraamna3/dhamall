# Dhamall – E-Commerce Earpods Platform

Dhamall is a Laravel-based e-commerce project focused on browsing and purchasing earpods and related gadgets. The implemented code includes buyer, seller, and admin experiences, product detail pages, search, authentication, checkout flow, wishlist/cart/profile data, and support/legal pages.

## Implemented features

### Buyer features
- Sign up, sign in, and logout
- Browse the homepage and product detail pages
- Search products by name or description
- View related products on product pages
- Add items to a shopping cart and proceed to checkout
- Checkout with a saved default shipping address and payment method
- View and update profile information
- Manage wishlist, shopping cart, and payment details from the profile page
- Access support and information pages such as Contact Us, About Us, FAQs, Returns & Refunds, Privacy Policy, Shipping Policy, Terms & Conditions, Media, Collaboration, and Career

### Seller features
- Seller dashboard
- Seller profile page
- Seller orders page
- Seller reviews page
- Seller product listings page
- Seller support pages, including Help Center, Seller Guidelines, Contact Support, FAQs for Sellers, Terms of Service, Privacy Policy, and Seller Agreement

### Admin features
- Admin login page
- Admin dashboard
- Seller request review page
- Seller approval and rejection actions
- Manage sellers page
- Manage categories page
- Product review moderation page

### Product and data features
- Product model with images, reviews, and category relationships
- Category hierarchy with parent and subcategories
- Reviews linked to products
- Orders, order items, and payments tables
- Shipping addresses and user payment details
- Wishlist and shopping cart tables
- Coupon storage

## Tech stack

- **Backend:** Laravel 11 / PHP 8.2
- **Frontend:** Blade, JavaScript, CSS, Bootstrap, Tailwind CSS, Vite
- **Database:** Relational database via Laravel migrations
- **Media handling:** Cloudinary Laravel package

## Basic setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
npm run dev
```

> Note: the project also includes a Composer `dev` script for running the app, queue listener, logs, and Vite together.
