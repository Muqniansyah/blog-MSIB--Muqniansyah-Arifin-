<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi */
            backdrop-filter: blur(10px); /* Efek blur */
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .password-toggle-satu {
            position: absolute;
            top: 37%;
            right: 46px;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.25rem;
            cursor: pointer;
        }

        .password-toggle-dua {
            position: absolute;
            top: 59%;
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
                <div class="card mt-5">
                    <h2 class="text-center mb-4">New Password</h2>
                    <form action="{{ route('password.update') }}" method="POST"> 
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ request('email') }}">

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Create a new password">
                            <i class="bi bi-eye password-toggle-satu" onclick="togglePassword('password', this)"></i> 
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your new password">
                            <i class="bi bi-eye password-toggle-dua" onclick="togglePassword('password_confirmation', this)"></i>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
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
