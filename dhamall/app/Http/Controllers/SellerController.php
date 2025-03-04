<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SellerController extends Controller
{
    private $sellers = [
        [
            'id' => 1,
            'name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'shop_name' => 'Ali’s Gadgets',
            'status' => 'pending'
        ],
        [
            'id' => 2,
            'name' => 'Ayesha Ahmed',
            'email' => 'ayesha@example.com',
            'shop_name' => 'Ayesha’s Accessories',
            'status' => 'pending'
        ],
        [
            'id' => 3,
            'name' => 'Zubair Iqbal',
            'email' => 'zubair@example.com',
            'shop_name' => 'Zubair Electronics',
            'status' => 'pending'
        ],
        [
            'id' => 4,
            'name' => 'Sara Noor',
            'email' => 'sara@example.com',
            'shop_name' => 'Sara’s Home Decor',
            'status' => 'pending'
        ]
    ];

    public function index() {
        return view('admin.pages.sellerrequests', ['sellerRequests' => $this->sellers]);
    }

    public function approve($id) {
        return redirect()->back()->with('success', "Seller with ID $id approved!");
    }

    public function reject($id) {
        return redirect()->back()->with('error', "Seller with ID $id rejected!");
    }

    public function dashboard()
    {
        // Mock data
        $totalProducts = 15;
        $totalOrders = 28;
        $totalEarnings = 5500; // Assuming currency is in Rs.
        $salesData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'values' => [5000, 7000, 8000, 6500, 9000]
        ];

        $recentOrders = [

            (object)[
                'id' => 101,
                'customer' => (object)['name' => 'Ali Khan'],
                'total' => 1200,
                'status' => 'Completed',
                'created_at' => now()->subDays(1),
            ],
            (object)[
                'id' => 102,
                'customer' => (object)['name' => 'Ayesha Ahmed'],
                'total' => 800,
                'status' => 'Pending',
                'created_at' => now()->subDays(2),
            ],
            (object)[
                'id' => 103,
                'customer' => (object)['name' => 'Usman Raza'],
                'total' => 1500,
                'status' => 'Cancelled',
                'created_at' => now()->subDays(3),
            ],
        ];

        return view('users.seller.pages.dashboard', compact('totalProducts', 'totalOrders', 'totalEarnings', 'recentOrders','salesData'));
    }


        public function products()
        {
            $products = [
                ['id' => 1, 'name' => 'Wireless Earbuds', 'status' => 'Active', 'price' => 120],
                ['id' => 2, 'name' => 'Gaming Headphones', 'status' => 'Out of Stock', 'price' => 89],
                ['id' => 3, 'name' => 'Noise Cancelling Headphones', 'status' => 'Active', 'price' => 150],
            ];

            return view('users.seller.pages.products', compact('products'));
        }

        public function profile()
        {
            // Mock seller data
            $seller = (object) [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+92 3456789032',
                'address' => '123 Main Street, New York, USA'
            ];

            return view('users.seller.pages.profile', compact('seller'));
        }

        public function orders()
        {
            // Temporary empty array to prevent errors
            $orders = [];

            return view('users.seller.pages.orders', compact('orders'));
        }



        public function updateProfile(Request $request)
        {
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }
        public function reviews()
        {
            // Fetch reviews along with product and user relationships (Remove this for now)
            // $reviews = Review::with(['product', 'user'])->whereHas('product', function ($query) {
            //     $query->where('seller_id', auth()->id());
            // })->get();

            // Use an empty array for frontend development
            $reviews = [];

            return view('users.seller.pages.reviews', compact('reviews'));
        }

        public function productListings()
    {
        // Mock product data as a collection instead of an array
        $products = collect([
            (object) [
                'id' => 1,
                'name' => 'Wireless Earpods Pro',
                'price' => 199.99,
                'status' => 'active',
            ],
            (object) [
                'id' => 2,
                'name' => 'Gaming Headset X200',
                'price' => 149.99,
                'status' => 'inactive',
            ],
            (object) [
                'id' => 3,
                'name' => 'Noise Cancelling Headphones',
                'price' => 299.99,
                'status' => 'active',
            ],
        ]);

        return view('users.seller.pages.product_listings', compact('products'));
    }
}
