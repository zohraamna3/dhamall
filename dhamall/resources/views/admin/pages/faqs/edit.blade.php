{{--@extends('admin.layouts.app')--}}

@section('title', 'Edit FAQ')

@section('content')
    <div class="container mt-4">
        <h2>Edit FAQ</h2>
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Question">Question</label>
                <input type="text" class="form-control" id="Question" name="Question" value="{{ $faq->Question }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="Answer">Answer</label>
                <textarea class="form-control" id="Answer" name="Answer" rows="5" required>{{ $faq->Answer }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update FAQ</button>
        </form>
    </div>
@endsection
