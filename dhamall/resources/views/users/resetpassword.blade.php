<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Dhamall</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="styles.css">
    <style>
        .btn-signup{
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }
        .btn-login{
            background-color: #6f42c1;
            color: white;
        }

        .container-fluid {
            min-height: 100vh;
        }

        .reset-password-container {
            max-width: 400px;
            width: 100%;
        }

        .form-control {
            border-radius: 8px;
            border: 2px solid #ccc;
        }

        .form-control:focus {
            border-color: #0d6efd; /* Blue outline on focus */
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }

        .btn-primary {
            background-color: #6f42c1;
            border: none;
            border-radius: 8px;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: white;
            color:black;
            border:1px solid #6f42c1;
        }

        .error-text {
            color: red;
            font-size: 14px;
        }

        .navbar .form-control {
            width: 200px;
        }
        .custom-link {
    color: #6f42c1;
    font-weight: bold;
}

.custom-link:hover {
    color: #4a2875;
    text-decoration: underline;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Dhamall</a>
<!-- Search Input with Icon -->
            <div class="input-group w-25">
                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>  <!-- Bootstrap Search Icon -->
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
            <img src="image.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Reset Password">
        </div>

        <!-- Right Side - Reset Password Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="reset-password-container w-75">
                <h2 class="mb-3">Reset Your Password</h2>
                <p class="text-muted">Enter your email and we’ll send you a link to reset your password.<br> Please check it.</p>

                <form>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                        <p class="error-text mt-1">We cannot find your email.</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send</button>
                </form>

                <p class="text-center mt-3"><a href="#" class="custom-link text-decoration-none">Back to Login</a></p>
            </div>
        </div>
    </div>

</body>
</html>
