@extends('admin.layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Product Reviews</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container mt-5 px-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; ">
                    Product Reviews
                </h3>
            </div>

            <div class="card shadow-sm p-4 border-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Sentiment</th>
                                <th>Posted On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($productReviews) > 0)
                                @foreach($productReviews as $review)
                                    <tr>
                                        <td>{{ $review['customer'] }}</td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </td>
                                        <td>{{ $review['review'] }}</td>
                                        <td>
                                            <span class="badge {{ $review['sentiment'] == 'Positive' ? 'bg-success' : ($review['sentiment'] == 'Negative' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ $review['sentiment'] }}
                                            </span>
                                        </td>
                                        <td>{{ $review['date'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No reviews available for this product.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
