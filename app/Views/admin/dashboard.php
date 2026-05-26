<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Paskibraku</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #F8F9FA; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background-color: #0B2447; }
        .card-custom { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 10px; }
        .table-custom th { background-color: #f1f3f5; color: #495057; font-weight: 600; border-bottom: 2px solid #dee2e6; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shield-check me-2"></i>Admin Panel Paskibraku</a>
            <div class="d-flex align-items-center text-white">
                <span class="me-3"><i class="bi bi-person-circle me-1"></i> <?= session()->get('username') ?></span>
                <a href="/logout" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid px-4 pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold m-0 text-dark">Data Pembelian Tiket</h2>
            <a href="/" target="_blank" class="btn btn-outline-primary"><i class="bi bi-box-arrow-up-right me-1"></i> Lihat Website</a>
        </div>
        
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('msg') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

        <?php if(session()->getFlashdata('error')):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

        <div class="card card-custom p-0 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover table-custom mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="py-3 px-4">ID Tiket</th>
                            <th class="py-3">Pembeli</th>
                            <th class="py-3">Kontak</th>
                            <th class="py-3 text-center">Tiket</th>
                            <th class="py-3 text-end">Total</th>
                            <th class="py-3 text-center">Pembayaran</th>
                            <th class="py-3 text-center">Status</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($tickets) && is_array($tickets)): ?>
                            <?php foreach($tickets as $ticket): ?>
                            <tr>
                                <td class="px-4">
                                    <span class="font-monospace text-primary fw-bold"><?= $ticket['payment_code'] ?></span><br>
                                    <small class="text-muted"><?= date('d M Y H:i', strtotime($ticket['created_at'])) ?></small>
                                </td>
                                <td>
                                    <strong><?= esc($ticket['buyer_name']) ?></strong><br>
                                    <small class="text-muted"><i class="bi bi-building"></i> <?= esc($ticket['buyer_institution']) ?></small>
                                </td>
                                <td>
                                    <div><i class="bi bi-telephone text-muted"></i> <?= esc($ticket['buyer_phone']) ?></div>
                                    <div><i class="bi bi-envelope text-muted"></i> <a href="mailto:<?= esc($ticket['buyer_email']) ?>" class="text-decoration-none"><?= esc($ticket['buyer_email']) ?></a></div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-secondary"><?= ucfirst($ticket['ticket_type']) ?></span><br>
                                    <strong><?= $ticket['quantity'] ?> Qty</strong>
                                </td>
                                <td class="text-end text-danger fw-bold">
                                    Rp <?= number_format($ticket['total_price'], 0, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <span class="text-uppercase fw-bold"><?= esc($ticket['payment_method']) ?></span><br>
                                    <small class="font-monospace text-muted"><?= esc($ticket['payment_account']) ?></small>
                                </td>
                                <td class="text-center">
                                    <?php if($ticket['status'] === 'verified'): ?>
                                        <span class="badge bg-success rounded-pill px-3 py-2"><i class="bi bi-check-circle me-1"></i> Verified</span>
                                    <?php elseif($ticket['status'] === 'pending'): ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2"><i class="bi bi-clock me-1"></i> Pending</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger rounded-pill px-3 py-2"><i class="bi bi-x-circle me-1"></i> Rejected</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($ticket['status'] === 'pending'): ?>
                                    <form action="/admin/verify/<?= $ticket['id'] ?>" method="post">
                                        <button type="submit" class="btn btn-sm btn-success fw-bold px-3" onclick="return confirm('Verifikasi tiket ini dan kirim email e-ticket ke pelanggan?')">
                                            <i class="bi bi-check2-all"></i> Verifikasi
                                        </button>
                                    </form>
                                    <?php else: ?>
                                        <span class="text-muted"><i class="bi bi-dash"></i></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    Belum ada data pembelian tiket.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
