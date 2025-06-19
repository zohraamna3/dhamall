# Dhamall – E-Commerce Earpods Platform

**Semester Project (6th Semester)**

Dhamall is a feature-rich e-commerce platform developed for buying and selling earpods and related gadgets. Built with Laravel (PHP), MySQL, HTML, CSS, JavaScript, and Bootstrap, it demonstrates a modern full-stack approach to e-commerce application development.

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Overview](#system-overview)
- [Database Schema](#database-schema)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contributing](#contributing)

---

## Features

- Responsive Front-end (32+ pages)
  - Product Listings
  - Product Details
  - Wishlist
  - Shopping Cart
  - Checkout and Payments
  - User Authentication (Login/Register)
  - Profile Management
- Role-based Back-end
  - Buyer, Seller, and Admin modules
  - Seller Dashboard (Product Management, Orders)
  - Admin Dashboard (User & Product Moderation)
- Relational Database Schema (MySQL)
  - Product Listings
  - User Data
  - Transaction Records
- Efficient Data Handling
- Version Control with Git for team collaboration

---

## Tech Stack

- **Back-end:** Laravel (PHP)
- **Database:** MySQL
- **Front-end:** HTML, CSS, JavaScript, Bootstrap
- **Version Control:** Git

---

## System Overview

Dhamall enables users to browse and purchase earpods as buyers, manage products as sellers, and oversee the platform as admins. The platform is designed for scalability, modularity, and maintainability, with clear separation between user roles and strict access controls.

---

## Database Schema

The relational database is designed with the following core tables (though it contains further tables):

- **Users:** Stores buyer, seller, and admin profiles.
- **Products:** Manages product listings, stock, and pricing.
- **Orders:** Tracks purchase transactions.
- **Order_Items:** Details of individual items in each order.
- **Wishlists:** For user product preferences.
- **Reviews:** User feedback on products.

> **Note:** The schema ensures referential integrity and efficient queries for all major user flows.

---

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/zohraamna3/dhamall.git
   ```
2. **Navigate to the Project Directory**
   ```bash
   cd dhamall/dhamall
   ```
3. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```
4. **Set Up Environment Variables**
   - Copy `.env.example` to `.env` and update database credentials.
   ```bash
   cp .env.example .env
   ```
5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```
6. **Run Migrations**
   ```bash
   php artisan migrate
   ```
7. **Serve the Application**
   ```bash
   php artisan serve
   ```

---

## Usage

- Access the application at `http://localhost:8000`
- Register as a buyer or seller to explore relevant features.
- Admin users can be set directly through the database or seeder.

---

## Project Structure

```
dhamall/
├── app/                # Laravel application logic
├── bootstrap/          # Laravel bootstrap files
├── config/             # Configuration files
├── database/           # Migrations and seeds
├── public/             # Public assets and entry point
├── resources/          # Blade templates and resources
├── routes/             # Route definitions
├── storage/            # File storage
├── tests/              # Unit and feature tests
├── .env.example        # Sample environment file
├── composer.json       # PHP dependencies
└── package.json        # Node dependencies
```

---

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

---


---

## Credits

Developed for the 6th Semester PWE Project.

---

> For more details, see the [Laravel documentation](https://laravel.com/docs/) and [project source code](https://github.com/zohraamna3/dhamall/).
