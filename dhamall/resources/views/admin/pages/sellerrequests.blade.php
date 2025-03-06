@extends('admin.layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Seller Requests</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
                Seller Requests
            </h3>
        </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Shop Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellerRequests as $seller)
                    <tr>
                        <td>{{ $seller['id'] }}</td>
                        <td>{{ $seller['name'] }}</td>
                        <td>{{ $seller['email'] }}</td>
                        <td>{{ $seller['shop_name'] }}</td>
                        <td><span class="badge bg-warning">{{ ucfirst($seller['status']) }}</span></td>

                        <td>
                        <form action="{{ route('admin.seller.approve', $seller['id']) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-success btn-sm">Approve</button>
</form>

<form action="{{ route('admin.seller.reject', $seller['id']) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
</form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
        </div>
    </div>
</div>
@endsection
