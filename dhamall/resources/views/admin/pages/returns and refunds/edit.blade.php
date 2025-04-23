@extends('admin.layouts.app')

@section('title', 'Edit Policy')

@section('content')
    <div class="container mt-4">
        <h2>Edit Policy</h2>
        <form action="{{ route('admin.returns-refunds.update', $policy->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="PolicyType">Policy Type</label>
                <select class="form-control" id="PolicyType" name="PolicyType" required>
                    <option value="Returns" {{ $policy->PolicyType == 'Returns' ? 'selected' : '' }}>Returns</option>
                    <option value="Refunds" {{ $policy->PolicyType == 'Refunds' ? 'selected' : '' }}>Refunds</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="5" required>{{ $policy->Description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Policy</button>
        </form>
    </div>
@endsection
