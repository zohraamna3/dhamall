@extends('admin.layouts.app')

@section('title', 'Manage Returns and Refunds')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.returns-refunds.create') }}" class="btn btn-primary mb-3">Add Policy</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Policy Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($policies as $policy)
                <tr>
                    <td>{{ $policy->id }}</td>
                    <td>{{ $policy->PolicyType }}</td>
                    <td>{{ $policy->Description }}</td>
                    <td>
                        <a href="{{ route('admin.returns-refunds.edit', $policy->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.returns-refunds.destroy', $policy->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
