<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Dhamall</title>
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
        .btn-signin{
            border: 1px solid #6f42c1;
            color: white;
            background-color:#6f42c1
        }
        .btn-outline-dark:hover{
            background-color: #6f42c1;
            border: 1px solid #6f42c1;

        }
    </style>
</head>
<body>
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

    <div class="container-fluid">
        <div class="row">
            <!-- Left Side Image -->
            <div class="col-md-6 d-none d-md-block">
                <img src="image.png" class="img-fluid h-100 w-100 object-fit-cover" alt="Sign In">
            </div>

            <!-- Sign In Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-75">
                    <h2 class="mb-4">Sign In Page</h2>

                    <button class="btn btn-outline-dark w-100 mb-2"><img src="{{ asset('images/google.png') }}" alt="google Image"  width="20"> Continue With Google</button>
                    <button class="btn btn-outline-dark w-100 mb-3"><img src="{{ asset('images/twiiter.png') }}" alt="twitter Image"  width="20"> Continue With Twitter</button>

                    <div class="text-center my-3">OR</div>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <a href="#" class="d-block text-end">Forgot your password?</a>

                        <button type="submit" class="btn btn-signin w-100 mt-3">Sign In</button>
                    </form>

                    <p class="text-center mt-3">Don't have an account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
