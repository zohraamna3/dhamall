@extends('admin.layouts.app')

@section('title', 'Add Policy')

@section('content')
    <div class="container mt-4">
        <h2>Add Policy</h2>
        <form action="{{ route('admin.returns-refunds.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="PolicyType">Policy Type</label>
                <select class="form-control" id="PolicyType" name="PolicyType" required>
                    <option value="Returns">Returns</option>
                    <option value="Refunds">Refunds</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add Policy</button>
        </form>
    </div>
@endsection
