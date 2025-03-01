<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Email - Dhamall</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        .btn-signup {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }
        .btn-login {
            background-color: #6f42c1;
            color: white;
        }
        .btn-signup:hover {
            background-color: #6f42c1;
            color: white;
        }
        .btn-login:hover {
            background-color: white;
            color: black;
            border: 1px solid #6f42c1;
        }

        .container-fluid {
            min-height: 100vh;
        }

        .email-container {
            max-width: 400px;
            width: 100%;
        }
        .custom-link {
    color: #6f42c1;
    font-weight: bold;
}

.custom-link:hover {
    color: #4a2875;
    text-decoration: underline;
}


        .navbar .form-control {
            width: 200px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Dhamall</a>

            <!-- Search Bar with Icon -->
            <div class="input-group w-25">
                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Search">
            </div>

            <div>
                <button class="btn btn-login">Login</button>
                <button class="btn btn-signup">Sign Up</button>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-flex">
        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/email-check.png') }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Check Email">
        </div>

        <!-- Right Side - Check Email Message -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="email-container w-75">
                <h2 class="mb-3">Check Email</h2>
                <p class="text-muted">
                    Please check your email inbox and click on the provided link to reset your password.
                    If you don’t receive an email, <a href="#" class="text-decoration-none custom-link">Click here to resend</a>.
                </p>

                <p class="mt-3"><a href="/login" class="custom-link text-decoration-none">← Back to Login</a></p>
            </div>
        </div>
    </div>

</body>
</html>
