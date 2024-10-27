<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px); 
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .password-toggle-satu {
            position: absolute;
            top: 52%;
            right: 46px;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.25rem;
            cursor: pointer;
        }

        .password-toggle-dua {
            position: absolute;
            top: 66%;
            right: 46px;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.25rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <h2 class="text-center mb-4">Register</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Create a password">
                            <!-- onclick="togglePassword('password', this)" — Memanggil fungsi dengan ID input 'password' dan mengirimkan elemen ikon itu sendiri (this). -->
                            <i class="bi bi-eye password-toggle-satu" onclick="togglePassword('password', this)"></i> 
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                            <!-- onclick="togglePassword('password_confirmation', this)" — Memanggil fungsi dengan ID input 'password_confirmation' dan mengirimkan elemen ikon itu sendiri. -->
                            <i class="bi bi-eye password-toggle-dua" onclick="togglePassword('password_confirmation', this)"></i>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary w-100">Register</button>
                        <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login.form') }}">Login</a></p>
                        <div class="text-start mt-1">
                            <a href="/" class="btn btn-link">
                                <i class="bi bi-arrow-left"></i> 
                            </a>
                        </div>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId, toggleIcon) {
            // fieldId: Ini adalah string yang berisi ID dari input password yang ingin Anda toggle (misalnya, 'password' atau 'password_confirmation').
            const passwordField = document.getElementById(fieldId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>
