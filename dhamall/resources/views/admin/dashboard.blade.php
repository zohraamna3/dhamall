@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-10">
            <div class="row mt-3">
                <!-- Seller Requests Card -->
                <div class="col-md-6">
                    <div class="card bg-info text-white p-3">
                        <h5>Pending Seller Requests</h5>
                        <h3>{{ $data['pending_sellers'] }}</h3>
                        <p>Sellers waiting for approval</p>
                    </div>
                </div>

                <!-- Total Sellers Card -->
                <div class="col-md-6">
                    <div class="card bg-dark text-white p-3">
                        <h5>Total Sellers</h5>
                        <h3>{{ $data['total_sellers'] }}</h3>
                        <p>Approved sellers on the platform</p>
                    </div>
                </div>

                <!-- Monthly Seller Registration Graph -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3">
                        <h5>Seller Registrations Trend</h5>
                        <canvas id="sellerChart"></canvas>
                    </div>
                </div>

                <!-- Revenue Graph -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3">
                        <h4>Total Revenue</h4>
                        <p>{{ $data['total_revenue_growth'] }} <span class="text-success">↑ $5K from last month</span></p>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Most Sold Items -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3">
                        <h4>Most Sold Items</h4>
                        @foreach($data['most_sold_items'] as $item)
                            <p>{{ $item['name'] }} <span class="float-end">{{ $item['percentage'] }}%</span></p>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $item['percentage'] }}%"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Latest Orders -->
                <div class="col-md-12 mt-4">
                    <div class="card p-3">
                        <h4>Latest Orders</h4>
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
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
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
        }});
</script>

@endsection
