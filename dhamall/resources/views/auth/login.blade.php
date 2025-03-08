@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Login</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 m-auto">
        <div class="row w-100 shadow-lg rounded-lg overflow-hidden login-card mb-3 mb-md-0" style="max-width: 800px;">

            <!-- Left Section (Branding) -->
            <div class="col-md-5 text-white d-none d-md-flex  flex-column justify-content-between p-4"
                 style="background-color: #1a1a2e;">
                <h2 class="fw-bold text-gold">Dhamall</h2>
                <div class="flex-grow-1 d-flex align-items-center">
                    <h4 class="text-center text-light">Premium Sound, Ultimate Comfort</h4>
                </div>
                <a href="/" class="btn btn-outline-light fw-bold">← Back to Store</a>
            </div>


            <!-- Right Section (Login Form) -->
            <div class="col-md-7 bg-white p-3 p-md-5">
                <h3 class="font-weight-bold mb-3 text-center">Welcome Back!</h3>
                <p class="text-center text-muted">Sign in to continue</p>

                <!-- Social Login Buttons -->
                <div class="mb-3">
                    <a href="{{ url('/login/google') }}" class="btn btn-google w-100">
                        <img src="{{ asset('images/google.png') }}" width="20" class="me-2"> Continue with Google
                    </a>
                </div>
                <div class="mb-3">
                    <a href="{{ url('/login/twitter') }}" class="btn btn-twitter w-100">
                        <img src="{{ asset('images/twitter.png') }}" width="20" class="me-2"> Continue with Twitter
                    </a>
                </div>

                <div class="text-center my-3 text-muted">OR</div>

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="text-end">
                        <a href="#" class="text-decoration-none">Forgot your password?</a>
                    </div>

                    <button type="submit" class="btn btn-signin w-100 mt-3">Sign In</button>
                </form>

                <p class="text-center mt-3">Don't have an account? <a href="{{ route('signup') }}" class="text-primary">Sign
                        up</a></p>
            </div>
        </div>
    </div>
    <style>
        /* General Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        /* Sign-In Card */
        .login-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Sign-In Button */
        .btn-signin {
            background-color: #1a1a2e;
            color: #b3a31c;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-signin:hover {
            background-color: #5a33a3;
        }

        .text-golden {
            color: #b3a31c;
        }

        /* Social Login Buttons */
        .btn-google {
            background-color: #db4437;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-google:hover {
            background-color: #c1351d;
        }

        .btn-twitter {
            background-color: #1da1f2;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-twitter:hover {
            background-color: #0d8bf2;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-card {
                width: 90%;
            }
        }

    </style>
@endsection
