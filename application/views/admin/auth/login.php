<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Gradient Background */
    body {
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }

    /* Centered Login Card */
    .login-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    /* Title Styling */
    .login-card h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    /* Input and Button Styling */
    .form-control {
        border-radius: 25px;
        padding: 10px 15px;
    }

    .btn-primary {
        width: 100%;
        border-radius: 25px;
        padding: 10px;
        background-color: #007bff;
        border: none;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Link Styling */
    .login-card a {
        text-decoration: none;
        color: #007bff;
    }

    .login-card a:hover {
        color: #0056b3;
    }

    /* Bottom Text Styling */
    .login-card .bottom-text {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center">
        <div class="login-card">
            <h2>Login</h2>
            <?php if ($this->session->flashdata('error')): ?>
            <p class="text-center"><?= $this->session->flashdata('error') ?></p>
            <?php endif; ?>
            <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="bottom-text mt-3">
                    <p><a href="<?=base_url('pages');?>">Kembali Beranda</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>