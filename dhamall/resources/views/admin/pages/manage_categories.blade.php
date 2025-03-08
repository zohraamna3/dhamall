@extends('admin.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Manage Categories</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-gold rounded-1" style="background: #1a1a2e; color: #b3a31c; padding:1.5rem;">
            Manage Categories
        </h3>
    </div>

    <!-- Add Category Form -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Add New Category</h5>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter category name" required>
                </div>
                <button type="submit" class="btn btn-success">Add Category</button>
            </form>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm mb-2">Update</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
