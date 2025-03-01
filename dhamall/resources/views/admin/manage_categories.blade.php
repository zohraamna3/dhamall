@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Manage Categories</h2>

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
                            <button class="btn btn-primary btn-sm">Update</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
