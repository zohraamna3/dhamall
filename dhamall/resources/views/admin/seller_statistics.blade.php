@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mt-4">Seller Statistics - {{ $sellerStats['name'] }}</h2>

    {{-- Graph Containers --}}
    <div class="row mt-4">
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
        @endphp

        @foreach ($charts as $chartId => $chartTitle)
            <div class="col-md-4 chart-container">
                <h5>{{ $chartTitle }}</h5>
                <canvas id="{{ $chartId }}"></canvas>
                @if($chartId === 'reviewsChart')
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.product.reviews', ['id' => $product['id'] ?? '2']) }} " class="btn btn-primary">View All Reviews</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>



{{-- CSS for Zoom Effect --}}
<style>
    .chart-container {
        position: relative;
        transition: transform 0.3s ease-in-out;
        transform: scale(0.8);
        height: 250px;
    }

    .chart-container:hover {
        transform: scale(1);
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

    createChart('customerTypeChart', 'pie', 
        ['Returning Customers', 'New Customers'], 
        [{{ $sellerStats['returning_customers'] }}, {{ $sellerStats['new_customers'] }}], 
        ['rgba(255, 206, 86, 0.2)', 'rgba(54, 162, 235, 0.2)'], 
        ['rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)']
    );

    createChart('orderStatusChart', 'bar', 
        @json(array_keys($sellerStats['order_status'])), 
        @json(array_values($sellerStats['order_status'])), 
        ['rgba(75, 192, 192, 0.2)'], ['rgba(75, 192, 192, 1)']
    );
    // Sales by Region
createChart('regionSalesChart', 'bar', 
    @json(array_keys($sellerStats['sales_by_region'])), 
    @json(array_values($sellerStats['sales_by_region'])), 
    ['rgba(153, 102, 255, 0.2)'], 
    ['rgba(153, 102, 255, 1)']
);

// Top Customer Countries
createChart('customerCountriesChart', 'bar', 
    @json(array_keys($sellerStats['customer_countries'])), 
    @json(array_values($sellerStats['customer_countries'])), 
    ['rgba(255, 159, 64, 0.2)'], 
    ['rgba(255, 159, 64, 1)']
);

// Average Order Value Over Time
createChart('aovChart', 'line', 
    @json(array_keys($sellerStats['aov'])), 
    @json(array_values($sellerStats['aov'])), 
    ['rgba(75, 192, 192, 0.2)'], 
    ['rgba(75, 192, 192, 1)']
);


</script>
@endsection
