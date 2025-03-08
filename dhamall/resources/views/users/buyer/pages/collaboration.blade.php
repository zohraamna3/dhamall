@extends('users.buyer.layouts.app')

@section('title', 'Collaboration - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Collaboration</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Collaboration</h1>
        <p class="text-center">We are always open to new partnerships and collaborations. Whether you're a brand, influencer, or content creator, let's work together!</p>
        <div class="row mt-5">
            <div class="col-md-4">
                <h3 class="text-warning">Brand Partnerships</h3>
                <p>Collaborate with us to reach a wider audience.</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-warning">Influencer Collaborations</h3>
                <p>Join our network of influencers and promote our products.</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-warning">Content Creation</h3>
                <p>Work with us to create engaging content for our platform.</p>
            </div>
        </div>
        <p class="text-center mt-4">For inquiries, email <a href="mailto:collaboration@dhamall.com" class="text-warning">collaboration@dhamall.com</a>.</p>
    </div>
@endsection
