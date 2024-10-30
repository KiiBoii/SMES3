<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f05340, #f8cdda);
            /* Laravel red to soft pink gradient */
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
            /* Laravel Red */
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
        }

        .btn-primary {
            border-radius: 8px;
            background-color: #f05340;
            /* Laravel Red */
            border: none;
        }

        .btn-primary:hover {
            background-color: #d94734;
            /* Darker Laravel Red */
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
            /* Laravel Red */
            text-decoration: none;
        }

        a:hover {
            color: #d94734;
            /* Darker Laravel Red */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header">
                        <h3>Welcome Back
                            {{-- <?php
                            print_r(session()->all());
                            ?> --}}
                            @if (session('username'))
                                {{ session('username') }}
                            @endif
                        </h3>
                        <p>Please login to your account</p>
                    </div>
                    <div class="card-body">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        {{-- pertemuan 5 --}}
                        @if (session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif

                        {{-- lanjutan pert 5 --}}

                        @if (session('status') == 'success')
                            <div class="alert alert-success">
                                <p>Login berhasil</p>
                            </div>
                        @elseif (session('status') == 'error')
                            <div class="alert alert-danger">
                                <p>Login gagal</p>
                            </div>


                            {{-- @if (isset($result))

                            @if ($result == 'success')
                                <div class="alert alert-success">
                                    <p>Login berhasil</p>
                                </div>
                            @elseif ($result == 'error')
                                <div class="alert alert-danger">
                                    <p>Login gagal</p>
                                </div>
                            @endif --}}
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username"
                                    placeholder="Enter your username" name="username">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Enter your password" name="password">
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">confirm password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea id="address" name="address">{{ old('address') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="dob" class="form-label">tanggal lahir</label>
                                <input type="date" class="form-control" id="dob" value="{{ old('dob') }}">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <p class="small-text">Don't have an account? <a href="#">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
