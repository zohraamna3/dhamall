@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Order Successful</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg position-relative mb-2"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h2 class="text-center text-warning">Order Successful</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <p class="text-center">
            Thank you for your purchase! Your order has been successfully placed and is being processed.
            You will receive an email confirmation shortly.
        </p>

        <div class="order-summary">
            <h4 class="text-light">Order Summary</h4>
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="font-weight-bold">Item</th>
                        <th scope="col" class="font-weight-bold">Quantity</th>
                        <th scope="col" class="font-weight-bold">Price Per Unit</th>
                        <th scope="col" class="font-weight-bold">Total Price</th>
                        <th scope="col" class="font-weight-bold">Shipping Method</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->ProductName }}</td> <!-- Display Product Name -->
                            <td>{{ $item->Quantity }}</td>
                            <td>${{ number_format($item->PricePerUnit, 2) }}</td>
                            <td>${{ number_format($item->TotalPrice, 2) }}</td>
                            <td>{{ optional($item->product->shipping)->Method }}</td> <!-- Display Shipping Method -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="additional-details mt-4">
            <h4 class="text-light">Additional Details</h4>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Total Bill:</strong> ${{ number_format($order->TotalBill, 2) }}</p>
            <p><strong>Shipping Fee:</strong> ${{ number_format($shippingFeeAmount, 2) }}</p> <!-- Display shipping fee -->
            <p><strong>Order Date:</strong> {{ $order->OrderDate->format('M d, Y h:i A') }}</p>
            <p><strong>Shipping Address:</strong> {{ $checkoutDetail->address->Map }}</p>
            <p><strong>Payment Method:</strong> {{ optional($checkoutDetail->paymentDetail)->PaymentMethod }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-light">View My Orders</a>
        </div>
    </div>

    <style>
        #editBtn {
            position: absolute;
            top: 0;
            right: 0;
            margin: 12px;
        }

        /* Media query for screens 485px or smaller */
        @media (max-width: 485px) {
            #editBtn {
                position: static; /* Remove absolute positioning */
                width: 100%; /* Full width */
                margin: 10px 0; /* Add some margin for spacing */
                text-align: center; /* Center the text */
            }
        }

        @media (max-width: 350px) {
            h2 {
                font-size: 1.25rem;
            }
        }
    </style>
@endsection
