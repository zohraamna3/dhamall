@extends('admin.layouts.app')

@section('title', 'Create Terms and Conditions')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Create New Terms and Conditions</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.terms-and-conditions.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="Title" name="Title" required>
                            </div>
                            <div class="mb-3">
                                <label for="Description" class="form-label">Description</label>
                                <textarea class="form-control" id="Description" name="Description" rows="10" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.terms-and-conditions.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('Description');
    </script>
@endpush
