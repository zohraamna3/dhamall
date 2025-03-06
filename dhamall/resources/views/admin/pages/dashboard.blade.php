@extends('admin.layouts.app')


@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Dashboard</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Main Content -->
        <div class="col-md-10">
            <div class="row mt-3" >
                <!-- Seller Requests Card -->
                <div class="col-md-6">
                    <div class="card text-warning p-3 mb-3 mb-lg-0" style="background: #1a1a2e;">
                        <h5>Pending Seller Requests</h5>
                        <h3>{{ $data['pending_sellers'] }}</h3>
                        <p>Sellers waiting for approval</p>
                    </div>
                </div>

                <!-- Total Sellers Card -->
                <div class="col-md-6">
                    <div class="card p-3 bg-warning" style="color: #1a1a2e;">
                        <h5>Total Sellers</h5>
                        <h3>{{ $data['total_sellers'] }}</h3>
                        <p>Approved sellers on the platform</p>
                    </div>
                </div>

                <!-- Monthly Seller Registration Graph -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3" >
                        <h5 class="text-warning p-4 rounded" style="background: #1a1a2e;">Seller Registrations Trend</h5>
                        <canvas id="sellerChart"></canvas>
                    </div>
                </div>

                <!-- Revenue Graph -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3 text-warning">
                        <h4 style="background: #1a1a2e;" class="p-4 rounded">Total Revenue</h4>
                        <p>{{ $data['total_revenue_growth'] }} <span class="text-success">↑ $5K from last month</span></p>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Most Sold Items -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3">
                        <h4 style="background: #1a1a2e;" class="text-warning p-4 rounded">Most Sold Items</h4>
                        @foreach($data['most_sold_items'] as $item)
                            <p>{{ $item['name'] }} <span class="float-end">{{ $item['percentage'] }}%</span></p>
                            <div class="progress">
                                <div class="progress-bar" style="background: #1a1a2e;width: {{ $item['percentage'] }}%"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Latest Orders -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3 table-responsive" style="background: #1a1a2e;">
                        <h4 class="text-warning">Latest Orders</h4>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Seller</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['latest_orders'] as $order)
                                <tr>
                                    <td>{{ $order['product'] }}</td>
                                    <td>{{ $order['order_id'] }}</td>
                                    <td>{{ $order['date'] }}</td>
                                    <td>{{ $order['customer'] }}</td>
                                    <td>{{ $order['seller'] }}</td>
                                    <td>
                                        @if($order['status'] == 'Delivered')
                                            <span class="badge bg-success">{{ $order['status'] }}</span>
                                        @elseif($order['status'] == 'Pending')
                                            <span class="badge bg-warning">{{ $order['status'] }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $order['status'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order['amount'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Chart Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($data['revenue_trend'])) !!},
            datasets: [{
                label: 'Revenue',
                data: {!! json_encode(array_values($data['revenue_trend'])) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',

            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {

                    }
                }
            }
        }
    });

    var ctx = document.getElementById('sellerChart').getContext('2d');
    var sellerChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data['months']) !!},
            datasets: [{
                label: 'Sellers Registered',
                data: {!! json_encode($data['monthly_sellers']) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {

                    }
                }
            }
        }
    });
</script>

@endsection
