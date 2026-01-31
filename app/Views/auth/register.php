<!doctype html>
<html>

<head>
    <meta name="base-url" content="<?= base_url() ?>">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth/login.css') ?>">
</head>

<body class="login-page">
    <div class="login-card">
        <h4 class="login-title mb-2">Register!</h4>
        <p class="login-subtitle mb-4">Sign in to your account</p>

        <div id="alert"></div>

        <form id="registerForm">
            <input type="username" name="username" class="form-control mb-2" placeholder="username" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button class="btn btn-primary w-100">Register</button>
        </form>

        <div class="text-end mt-2">
            Already have an account?
            <a href="<?= base_url('login') ?>"> Login here</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url('assets/js/auth/login.js') ?>"></script>
</body>

</html>