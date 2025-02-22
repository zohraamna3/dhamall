@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4">Shopping Cart</h2>

        @if(count($cartItems) > 0)
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Product Details</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Shipping</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <img src="{{ $item['image'] }}" alt="Product" width="50">
                            <span>{{ $item['name'] }}</span>
                        </td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <input type="number" value="{{ $item['quantity'] }}" class="form-control" style="width: 60px;">
                        </td>
                        <td>{{ $item['shipping'] }}</td>
                        <td>${{ number_format($item['subtotal'], 2) }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary">Continue Shopping</button>
                <button class="btn btn-primary">Proceed to Checkout</button>
            </div>

        @else
            <p class="text-center">Your cart is empty.</p>
        @endif
    </div>
@endsection
