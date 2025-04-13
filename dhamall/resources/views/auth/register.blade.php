@extends('users.buyer.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-current">Sign Up</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 shadow-lg rounded-3 overflow-hidden" style="max-width: 900px; background-color: #f8f9fa;">

            <!-- Left Section (Branding) -->
            <div class="col-md-5 text-white d-none d-md-flex flex-column justify-content-between p-4"
                 style="background-color: #1a1a2e;">
                <h2 class="fw-bold text-gold">Dhamall</h2>
                <div class="flex-grow-1 d-flex align-items-center">
                    <h4 class="text-center text-light">Premium Sound, Ultimate Comfort</h4>
                </div>
                <a href="/" class="btn btn-outline-light fw-bold">← Back to Store</a>
            </div>

            <!-- Right Section (Registration Form) -->
            <div class="col-md-7 bg-white p-3 p-md-5">
                <h3 class="fw-bold mb-3 text-dark">Create an Account</h3>
                <p class="text-muted">Already have an account?
                    <a href="{{ route('signin') }}" class="text-primary fw-bold">Log in</a>
                </p>

                <!-- Registration Form -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Add this right after the opening form tag -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="Name" class="form-label fw-bold">Full Name</label>
                        <input type="text" name="Name" class="form-control p-2" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="PhoneNumber" class="form-label fw-bold">Phone Number</label>
                        <input type="text" name="PhoneNumber" class="form-control p-2" placeholder="Enter your phone number"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="Gender" class="form-label fw-bold">Gender</label>
                        <select name="Gender" class="form-control p-2" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="DateOfBirth" class="form-label fw-bold">Date of Birth</label>
                        <input type="date" name="DateOfBirth" class="form-control p-2" required>
                    </div>

                    <div class="mb-3">
                        <label for="UserRole" class="form-label fw-bold">Role</label>
                        <select name="UserRole" class="form-control p-2" required>
                            <option value="admin">Admin</option>
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="EmailAddress" class="form-label fw-bold">Email Address</label>
                        <input type="email" name="EmailAddress" class="form-control p-2" placeholder="Enter your email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="Password" class="form-label fw-bold">Password</label>
                        <input type="password" name="Password" class="form-control p-2"
                               placeholder="Enter a strong password" required>
                    </div>

                    <div class="mb-4">
                        <label for="Password_confirmation" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" name="Password_confirmation" class="form-control p-2"
                               placeholder="Re-enter your password" required>
                    </div>

                    <div class="mb-3">
                        <label for="ImageURL" class="form-label fw-bold">Profile Image URL</label>
                        <input type="text" name="ImageURL" class="form-control p-2" placeholder="Enter image URL (optional)">
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold text-gold">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .text-gold {
            color: #d4af37;
        }

        .btn-dark {
            background-color: #1a1a2e;
            border: none;
        }

        .btn-dark:hover {
            background-color: #111122;
        }
        .alert {
             padding: 15px;
             margin-bottom: 20px;
             border: 1px solid transparent;
             border-radius: 4px;
         }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
@endsection
