<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin Paskibra</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #F8F9FA;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
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
    <div class="card register-card p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark">Registrasi Admin</h3>
            <p class="text-muted small">Buat akun admin baru</p>
        </div>
        
        <?php if(isset($validation)):?>
            <div class="alert alert-danger py-2 small">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        
        <form action="<?= base_url('register/auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" required placeholder="Minimal 4 karakter">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Konfirmasi Password</label>
                <input type="password" name="confpassword" class="form-control" required>
            </div>
            <button class="btn btn-primary-custom w-100 py-2 fw-bold" type="submit">
                <i class="bi bi-person-plus me-2"></i> Daftar
            </button>
            <div class="text-center mt-3 small">
                Sudah punya akun? <a href="/login" class="text-decoration-none">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
