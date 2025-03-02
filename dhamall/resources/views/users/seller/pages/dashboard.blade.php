@extends('users.seller.layouts.app')

@section('content')
<div class="container text-warning">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
            Seller Statistics
        </h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4 text-center text-warning" style="background: #1a1a2e;">
                <h4>Total Products</h4>
                <p class="display-6 fw-bold">{{ $totalProducts }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4 text-center text-warning" style="background: #1a1a2e;">
                <h4>Total Orders</h4>
                <p class="display-6 fw-bold">{{ $totalOrders }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4 text-center text-warning" style="background: #1a1a2e;">
                <h4>Total Earnings</h4>
                <p class="display-6 fw-bold">Rs. {{ number_format($totalEarnings, 2) }}</p>
            </div>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="card shadow-sm border-0 mt-4 p-4 text-warning" style="background: #1a1a2e;">
        <h4>Recent Orders</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>Rs. {{ number_format($order->total, 2) }}</td>
                    <td><span class="badge bg-{{ $order->status == 'Completed' ? 'success' : ($order->status == 'Pending' ? 'warning' : 'danger') }}">{{ $order->status }}</span></td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Graph Containers --}}
    <div class="row mt-4" style="background: #1a1a2e;">
        @php
            $charts = [
                'monthlySalesChart' => 'Monthly Sales Trend',
                'categorySalesChart' => 'Sales by Category',
                'bestSellingChart' => 'Best-Selling Products',
                'paymentMethodsChart' => 'Payment Methods',
                'reviewsChart' => 'Customer Reviews',
                'customerTypeChart' => 'Returning vs. New Customers',
                'orderStatusChart' => 'Order Status Overview',
                'regionSalesChart' => 'Sales by Region',
                'customerCountriesChart' => 'Top Customer Countries',
                'aovChart' => 'Average Order Value'
            ];

            $sellerStats = [
                'monthly_sales' => ['Jan' => 10, 'Feb' => 20, 'Mar' => 30, 'Apr' => 40],
                'category_sales' => ['Electronics' => 50, 'Clothing' => 30, 'Home Decor' => 20],
                'best_selling_products' => ['Product A' => 100, 'Product B' => 80, 'Product C' => 60],
                'payment_methods' => ['Credit Card' => 60, 'PayPal' => 30, 'Cash' => 10],
                'reviews_distribution' => ['1 Star' => 5, '2 Stars' => 10, '3 Stars' => 20, '4 Stars' => 40, '5 Stars' => 25],
                'returning_customers' => 70,
                'new_customers' => 30,
                'order_status' => ['Pending' => 10, 'Shipped' => 20, 'Delivered' => 50, 'Cancelled' => 5],
                'sales_by_region' => ['North' => 50, 'South' => 30, 'East' => 20],
                'customer_countries' => ['USA' => 40, 'UK' => 30, 'Canada' => 30],
                'aov' => ['Jan' => 100, 'Feb' => 120, 'Mar' => 140]
            ];
        @endphp

        @foreach ($charts as $chartId => $chartTitle)
            <div class="col-md-4 chart-container">
                <h5>{{ $chartTitle }}</h5>
                <canvas id="{{ $chartId }}"></canvas>
            </div>
        @endforeach
    </div>
</div>

{{-- CSS for Zoom Effect --}}
<style>
    .chart-container {
        position: relative;
        transition: transform 0.3s ease-in-out;
        transform: scale(0.9);
        height: 250px;
    }
    .chart-container:hover {
        transform: scale(1.05);
        z-index: 10;
    }
    canvas {
        width: 100% !important;
        height: 200px !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function createChart(chartId, type, labels, data, backgroundColors, borderColors) {
        var ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: chartId,
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Charts Data
    createChart('monthlySalesChart', 'line', 
        @json(array_keys($sellerStats['monthly_sales'])), 
        @json(array_values($sellerStats['monthly_sales'])), 
        ['rgba(75, 192, 192, 0.2)'], ['rgba(75, 192, 192, 1)']
    );

    createChart('categorySalesChart', 'bar', 
        @json(array_keys($sellerStats['category_sales'])), 
        @json(array_values($sellerStats['category_sales'])), 
        ['rgba(255, 99, 132, 0.2)'], ['rgba(255, 99, 132, 1)']
    );

    createChart('bestSellingChart', 'bar', 
        @json(array_keys($sellerStats['best_selling_products'])), 
        @json(array_values($sellerStats['best_selling_products'])), 
        ['rgba(54, 162, 235, 0.2)'], ['rgba(54, 162, 235, 1)']
    );

    createChart('paymentMethodsChart', 'doughnut', 
        @json(array_keys($sellerStats['payment_methods'])), 
        @json(array_values($sellerStats['payment_methods'])), 
        ['rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'], 
        ['rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)']
    );

    createChart('reviewsChart', 'pie', 
        @json(array_keys($sellerStats['reviews_distribution'])), 
        @json(array_values($sellerStats['reviews_distribution'])), 
        ['rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)'], 
        ['rgba(255, 99, 132, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)']
    );

    // Returning vs. New Customers Chart
createChart('customerTypeChart', 'pie', 
    ['Returning Customers', 'New Customers'], 
    [{{ $sellerStats['returning_customers'] }}, {{ $sellerStats['new_customers'] }}], 
    ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'], 
    ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)']
);

// Order Status Overview Chart
createChart('orderStatusChart', 'bar', 
    @json(array_keys($sellerStats['order_status'])), 
    @json(array_values($sellerStats['order_status'])), 
    ['rgba(255, 206, 86, 0.2)'], ['rgba(255, 206, 86, 1)']
);

// Sales by Region Chart
createChart('regionSalesChart', 'bar', 
    @json(array_keys($sellerStats['sales_by_region'])), 
    @json(array_values($sellerStats['sales_by_region'])), 
    ['rgba(75, 192, 192, 0.2)'], ['rgba(75, 192, 192, 1)']
);


    createChart('customerCountriesChart', 'bar', 
        @json(array_keys($sellerStats['customer_countries'])), 
        @json(array_values($sellerStats['customer_countries'])), 
        ['rgba(153, 102, 255, 0.2)'], ['rgba(153, 102, 255, 1)']
    );

    createChart('aovChart', 'line', 
        @json(array_keys($sellerStats['aov'])), 
        @json(array_values($sellerStats['aov'])), 
        ['rgba(255, 159, 64, 0.2)'], ['rgba(255, 159, 64, 1)']
    );
</script>
@endsection