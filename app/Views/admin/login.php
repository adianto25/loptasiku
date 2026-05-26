<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Paskibra</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #F8F9FA;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .btn-primary-custom {
            background-color: #0B2447;
            border-color: #0B2447;
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #19376D;
            border-color: #19376D;
        }
    </style>
</head>
<body>
    <div class="card login-card p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Login Admin</h3>
            <p class="text-muted small">Silakan masuk ke panel admin Paskibraku</p>
        </div>
        
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger py-2 small">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
        
        <form action="<?= base_url('login/auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>
            <button class="btn btn-primary-custom w-100 py-2 fw-bold" type="submit">
                <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
            </button>
            <div class="text-center mt-3 small">
                Belum punya akun? <a href="/register" class="text-decoration-none">Daftar Admin</a>
            </div>
        </form>
    </div>
</body>
</html>
