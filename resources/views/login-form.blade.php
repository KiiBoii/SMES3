<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #136dc8, #f0f5fa);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            /* Prevents scrolling */
        }

        .login-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Vertically centers the content */
            width: 100%;
            max-width: 900px;
            height: 85vh;
            /* Adjust the height to prevent overflow */
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            overflow: hidden;
            animation: fadeIn 1s ease-out;
        }

        .login-image {
            display: block;
            width: 50%;
            height: 100%;
            background-image: url('{{ asset('assets/images/download (3).jpg') }}');
            background-position: center center;
            background-size: cover;
            position: relative;
        }

        .login-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            /* Semi-transparent overlay */
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            /* Reduced the max-width of the form */
            padding: 1rem;
            /* Reduced padding for a more compact form */
            overflow-y: hidden;
            /* Disable internal scrolling */
            max-height: 75vh;
            /* Adjusted the height to ensure better fit */
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
            /* Reduced margin to fit content better */
        }

        .login-header h3 {
            font-size: 1.75rem;
            color: #343a40;
            font-weight: 600;
        }

        .login-header p {
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .form-group {
            position: relative;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: all 0.3s ease;
            padding-left: 35px;
        }

        .form-control:focus {
            border-color: #5e9cfc;
            box-shadow: 0 0 10px rgba(94, 156, 252, 0.3);
        }

        .form-control .fas {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ced4da;
        }

        .btn-primary {
            background: linear-gradient(to right, #5e9cfc, #5271ff);
            border: none;
            border-radius: 10px;
            padding: 0.8rem;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(82, 113, 255, 0.5);
        }

        .social-login {
            text-align: center;
            margin-top: 2rem;
        }

        .social-login .btn-secondary {
            background: white;
            color: #6c757d;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 0.8rem;
            transition: all 0.3s ease;
        }

        .social-login .btn-secondary:hover {
            background-color: #f8f9fa;
            transform: translateY(-3px);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            /* Reduced margin */
        }

        .login-footer a {
            color: #5271ff;
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            color: #5e9cfc;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            transition: color 0.3s ease;
        }

        .eye-icon:hover {
            color: #495057;
        }

        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 30px;
            height: 30px;
            opacity: 0;
            /* Start fully transparent */
            animation: fadeMove 5s ease-in-out forwards;
        }

        @keyframes fadeMove {
            0% {
                opacity: 0;
                transform: translateY(0) scale(0.8);
            }

            25% {
                opacity: 1;
                transform: translateY(-20px) scale(1);
                /* Slight upward movement */
            }

            75% {
                opacity: 1;
                transform: translateY(-20px) scale(1);
                /* Maintain position and size */
            }

            100% {
                opacity: 0;
                transform: translateY(50px) scale(0.5);
                /* Fade out and shrink */
            }
        }

        .particle i {
            font-size: 30px;
            color: rgba(255, 255, 255, 0.8);
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(10px) rotate(15deg);
            }
        }
        .alert {
    margin-bottom: 1rem; /* Add spacing below alerts */
}
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <div class="login-header">
                <h3>Welcome Back!</h3>
                <p>Login to your e-commerce account</p>
            </div>
            @if (session('result') == 'error')
                <div class="alert alert-danger">
                    Login failed, email or password incorrect.
                </div>
            @endif
            @if (session('error') == 'error')
                <div class="alert alert-danger">
                    Please login first.
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <div class="position-relative">
                        <input type="email" id="email" name="email" class="form-control" placeholder=""
                            required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" id="password" name="password" class="form-control" placeholder=""
                            required>
                        <i class="fas fa-eye eye-icon" id="togglePassword"></i> <!-- Eye Icon for toggle visibility -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="social-login">
                <p class="mt-3">Or continue with:</p>
                <a href="{{ route('redirect.google') }}" class="btn btn-secondary w-100 mt-2">
                    <i class="fab fa-google"></i> Login with Google
                </a>
            </div>


        </div>
    </div>
    <div class="particles-container" id="particlesContainer"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        const particlesContainer = document.getElementById('particlesContainer');
        const icons = ['fa-shopping-cart', 'fa-box', 'fa-dollar-sign', 'fa-tags'];

        function createParticle() {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;

            const icon = document.createElement('i');
            icon.className = `fas ${icons[Math.floor(Math.random() * icons.length)]}`;
            particle.appendChild(icon);

            particlesContainer.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 5000); // Match the animation duration
        }

        // Generate particles at regular intervals
        setInterval(createParticle, 500);
    </script>
</body>

</html>
