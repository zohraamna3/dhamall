@extends('users.seller.layouts.app')

@section('title', 'Contact Support - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Support</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Contact Support</h1>
        <p class="text-center">Need help? Reach out to our support team for assistance.</p>
        <form class="mt-4">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-warning mt-3 w-100">Submit</button>
        </form>
    </div>
@endsection
