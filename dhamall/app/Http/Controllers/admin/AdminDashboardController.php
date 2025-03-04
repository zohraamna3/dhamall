<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [
            // Previously existing data
            'pending_sellers' => 5,
            'total_sellers' => 50,
            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            'monthly_sellers' => [10, 15, 12, 8, 20, 18, 22, 25, 30],

            // New dashboard data
            'total_sales' => '$20.4K',
            'total_revenue' => '$8.2K',
            'escrow_amount' => '$18.2K',
            'total_revenue_growth' => '$50.4K',
            'revenue_trend' => [
                'Jan' => 100000, 'Feb' => 75000, 'Mar' => 90000, 'Apr' => 95000,
                'May' => 50000, 'Jun' => 60000, 'Jul' => 55000, 'Aug' => 72000, 'Sep' => 88000
            ],
            'most_sold_items' => [
                ['name' => 'Jeans', 'percentage' => 70],
                ['name' => 'Shirts', 'percentage' => 40],
                ['name' => 'Belts', 'percentage' => 60],
                ['name' => 'Caps', 'percentage' => 80],
                ['name' => 'Others', 'percentage' => 20]
            ],
            'latest_orders' => [
                ['product' => 'iPhone 13 Pro', 'order_id' => '#11232', 'date' => 'Feb 27, 2025', 'customer' => 'Ali Khan', 'seller' => 'Tech Zone', 'status' => 'Delivered', 'amount' => '$400.00'],
                ['product' => 'MacBook Pro', 'order_id' => '#11233', 'date' => 'Feb 27, 2025', 'customer' => 'Sara Ahmed', 'seller' => 'Apple Store', 'status' => 'Pending', 'amount' => '$280.00'],
                ['product' => 'Apple Watch', 'order_id' => '#11234', 'date' => 'Feb 26, 2025', 'customer' => 'Zaid Malik', 'seller' => 'Tech Galaxy', 'status' => 'Cancelled', 'amount' => '$500.00'],
                ['product' => 'Microsoft Book', 'order_id' => '#11235', 'date' => 'Feb 26, 2025', 'customer' => 'Bilal Khan', 'seller' => 'Smart Devices', 'status' => 'Delivered', 'amount' => '$800.00'],
                ['product' => 'AirPods', 'order_id' => '#11236', 'date' => 'Feb 25, 2025', 'customer' => 'Noor Fatima', 'seller' => 'Tech Zone', 'status' => 'Delivered', 'amount' => '$80.00']
            ]
        ];

        return view('admin.pages.dashboard', compact('data'));
    }



        public function show($sellerId)
        {
            $sellerStats = [
                'name' => 'John Doe Electronics',
                'total_sales' => 150000,
                'completed_orders' => 120,
                'pending_orders' => 30,
                'cancelled_orders' => 10,

                // Monthly Sales Trend (Last 6 months)
                'monthly_sales' => [
                    'Sep' => 10000, 'Oct' => 15000, 'Nov' => 20000,
                    'Dec' => 25000, 'Jan' => 30000, 'Feb' => 40000
                ],

                // Sales Breakdown by Category
                'category_sales' => [
                    'Headphones' => 50000, 'Earbuds' => 40000,
                    'Speakers' => 30000, 'Accessories' => 20000
                ],

                // Best-Selling Products
                'best_selling_products' => [
                    'Sony WH-1000XM4' => 300, 'Apple AirPods Pro' => 250,
                    'JBL Flip 6' => 200, 'Samsung Buds 2' => 180
                ],

                // Revenue by Payment Method
                'payment_methods' => [
                    'Credit Card' => 60000, 'PayPal' => 30000, 'Cash on Delivery' => 20000
                ],

                // Average Order Value Over Time
                'aov' => [
                    'Sep' => 200, 'Oct' => 250, 'Nov' => 300,
                    'Dec' => 350, 'Jan' => 400, 'Feb' => 450
                ],

                // Customer Reviews Distribution
                'reviews_distribution' => [
                    '1 Star' => 5, '2 Stars' => 10, '3 Stars' => 15,
                    '4 Stars' => 30, '5 Stars' => 50
                ],

                // Returning vs. New Customers
                'returning_customers' => 60,
                'new_customers' => 40,

                // Order Status Overview
                'order_status' => [
                    'Completed' => 120, 'Pending' => 30, 'Cancelled' => 10
                ],

                // Sales by Region
                'sales_by_region' => [
                    'North' => 50000, 'South' => 40000,
                    'East' => 30000, 'West' => 20000
                ],

                // Top Customer Countries
                'customer_countries' => [
                    'USA' => 500, 'UK' => 400, 'Canada' => 300, 'Germany' => 200
                ],
            ];

            return view('admin.pages.seller_statistics', compact('sellerStats'));
        }


    public function allSellers()
{
    $sellers = [
        ['id' => 1, 'name' => 'Ali Khan', 'email' => 'ali@example.com', 'shop_name' => 'Ali’s Gadgets'],
        ['id' => 2, 'name' => 'Ayesha Ahmed', 'email' => 'ayesha@example.com', 'shop_name' => 'Ayesha’s Accessories'],
        ['id' => 3, 'name' => 'Zubair Iqbal', 'email' => 'zubair@example.com', 'shop_name' => 'Zubair Electronics'],
        ['id' => 4, 'name' => 'Sara Noor', 'email' => 'sara@example.com', 'shop_name' => 'Sara’s Home Decor'],
    ];

    return view('admin.pages.all_sellers', compact('sellers'));
}

}
