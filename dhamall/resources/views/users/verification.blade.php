<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification - Dhamall</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        .btn-signup {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }

        .btn-login {
            background-color: #6f42c1;
            color: white;
        }

        .container-fluid {
            min-height: 100vh;
        }

        .verification-container {
            max-width: 400px;
            width: 100%;
        }

        .form-control {
            border-radius: 8px;
            border: 2px solid #ccc;
        }

        .form-control:focus {
            border-color: #0d6efd;
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
            color: black;
            border: 1px solid #6f42c1;
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
            <a class="navbar-brand" href="/">Dhamall</a>
            <div class="input-group w-25">
                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i> <!-- Search Icon -->
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
            <img src="image.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Verification">
        </div>

        <!-- Right Side - Verification Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="verification-container w-75">
                <h2 class="mb-3">Verification</h2>
                <p class="text-muted">Verify your code.</p>

                <form>
                    <div class="mb-3">
                        <label class="form-label">Verification Code</label>
                        <input type="text" class="form-control" placeholder="Enter code" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Verify Code</button>
                </form>

                <p class="text-center mt-3"><a href="/login" class="text-decoration-none custom-link">Back to Login</a></p>
            </div>
        </div>
    </div>

</body>
</html>
