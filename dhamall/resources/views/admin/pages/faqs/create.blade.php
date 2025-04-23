{{--@extends('admin.layouts.app')--}}

@section('title', 'Add FAQ')

@section('content')
    <div class="container mt-4">
        <h2>Add FAQ</h2>
        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Question">Question</label>
                <input type="text" class="form-control" id="Question" name="Question" required>
            </div>
            <div class="form-group mt-3">
                <label for="Answer">Answer</label>
                <textarea class="form-control" id="Answer" name="Answer" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add FAQ</button>
        </form>
    </div>
@endsection
