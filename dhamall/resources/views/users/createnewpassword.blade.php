<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password - Dhamall</title>
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

        .password-container {
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

        .navbar .form-control {
            width: 200px;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .input-group-text {
            cursor: pointer;
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
            <img src="image.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Reset Password">
        </div>

        <!-- Right Side - Password Reset Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="password-container w-75">
                <h2 class="mb-3">Create New Password</h2>
                <p class="text-muted">Your new password must be different from previously used passwords.</p>

                <form onsubmit="return validatePassword()">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Enter new password" required>
                            <span class="input-group-text" onclick="togglePassword('password')">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <small class="text-muted">Must be at least 8 characters.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="confirm-password" class="form-control" placeholder="Confirm password" required>
                            <span class="input-group-text" onclick="togglePassword('confirm-password')">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>
                        <small id="error-message" class="error-message d-none">New password and confirm new password do not match</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            let input = document.getElementById(id);
            let icon = input.nextElementSibling.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("bi-eye", "bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("bi-eye-slash", "bi-eye");
            }
        }

        function validatePassword() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm-password").value;
            let errorMessage = document.getElementById("error-message");

            if (password !== confirmPassword) {
                errorMessage.classList.remove("d-none");
                return false;
            } else {
                errorMessage.classList.add("d-none");
                return true;
            }
        }
    </script>
</body>
</html>
