@extends('admin.layouts.app')

@section('title', 'Shipping Policy')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Shipping Policies</h5>
                        <a href="{{ route('admin.shipping-policy.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($policies as $policy)
                                    <tr>
                                        <td>{{ $policy->Title }}</td>
                                        <td>{{ $policy->updated_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.shipping-policy.edit', $policy->id) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.shipping-policy.destroy', $policy->id) }}"
                                                  method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No shipping policies found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
