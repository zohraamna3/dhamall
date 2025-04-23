@extends('users.buyer.layouts.app')

@section('title', 'Feedback - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feedback</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Feedback</h1>
        <p class="text-center">We value your thoughts! Please rate your experience and share any comments.</p>
        <form class="mt-4" action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rating">Rating (1 to 5)</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                    <option value="4">⭐⭐⭐⭐ (Good)</option>
                    <option value="3">⭐⭐⭐ (Average)</option>
                    <option value="2">⭐⭐ (Below Average)</option>
                    <option value="1">⭐ (Poor)</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="comment">Comments (Optional)</label>
                <textarea class="form-control" id="comment" name="comment" rows="5"
                          placeholder="Enter your comments"></textarea>
            </div>
            <button type="submit" class="btn btn-warning mt-3 w-100">Submit Feedback</button>
        </form>
    </div>
@endsection
