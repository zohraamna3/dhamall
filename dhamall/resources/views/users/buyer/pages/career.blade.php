@extends('users.buyer.layouts.app')

@section('title', 'Career - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Career</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Career Opportunities</h1>
        <p class="text-center">Join our team and be part of an exciting journey! We are always looking for talented individuals to join us.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="text-warning">Current Openings</h3>
                <ul>
                    <li>Software Engineer</li>
                    <li>Marketing Specialist</li>
                    <li>Customer Support Representative</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3 class="text-warning">Why Join Us?</h3>
                <ul>
                    <li>Competitive salary</li>
                    <li>Flexible working hours</li>
                    <li>Supportive work environment</li>
                </ul>
            </div>
        </div>
        <p class="text-center mt-4">Send your resume to <a href="mailto:careers@dhamall.com" class="text-warning">careers@dhamall.com</a>.</p>
    </div>
@endsection
