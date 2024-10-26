<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome to the Dashboard Blog</h1>
        <p class="lead">Please login or register to continue</p>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary mx-2">Register</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
