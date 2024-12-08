<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f05340, #f8cdda);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #f05340;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding-right: 30px;
            /* Add space for the icon */
        }

        .btn-primary {
            border-radius: 8px;
            background-color: #f05340;
        }

        .btn-primary:hover {
            background-color: #d94734;
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding-bottom: 1rem;
        }

        .small-text {
            color: #6c757d;
        }

        a {
            color: #f05340;
            text-decoration: none;
        }

        a:hover {
            color: #d94734;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header">
                        <h3>Welcome Back</h3>
                        <p>Please login to your account</p>

                        @if (session('result') == 'error')
                            <div class="alert alert-danger">
                                Login failed, email atau password incorrect
                            </div>
                        @endif
                        @if (session('error') == 'error')
                        <div class="alert alert-danger">
                            Silahkan login terlebih dahulu
                        </div>
                    @endif

                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (isset($result))
                            @if ($result == 'success')
                                <div class="alert alert-success text-center">login</div>
                            @elseif($result == 'error')
                                <div class="alert alert-danger text-center">failed</div>
                            @endif
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" value="{{ old('email') }}"
                                        name="email" type="email" placeholder="name@company.com" required="">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Enter your password">
                                    <i class="fas fa-eye eye-icon" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="small-text">Don't have an account? <a href="#">Forgot Password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = togglePassword;

        togglePassword.addEventListener('click', function() {
            // Toggle the password type attribute
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Toggle the eye icon
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
