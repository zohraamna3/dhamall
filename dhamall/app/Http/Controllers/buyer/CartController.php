<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function index()
{
// Dummy data (Replace this with database query later)
$cartItems = [
[
'name' => 'Blue Flower Print Crop Top',
'image' => 'https://via.placeholder.com/50',
'price' => 29.00,
'quantity' => 1,
'shipping' => 'FREE',
'subtotal' => 29.00,
],
[
'name' => 'Lavender Hoodie',
'image' => 'https://via.placeholder.com/50',
'price' => 119.00,
'quantity' => 2,
'shipping' => 'FREE',
'subtotal' => 238.00,
],
[
'name' => 'Black Sweatshirt',
'image' => 'https://via.placeholder.com/50',
'price' => 125.00,
'quantity' => 1,
'shipping' => '$5.00',
'subtotal' => 130.00,
],
];

return view('users.buyer.cart', compact('cartItems'));
}
}
