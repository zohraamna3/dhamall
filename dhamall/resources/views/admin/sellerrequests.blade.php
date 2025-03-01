@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Seller Requests</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

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
@endsection
