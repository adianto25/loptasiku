<section id="tiket" class="py-5 bg-light">
    <div class="container my-5">
        <h2 class="section-title text-center mb-5">Pembelian Tiket</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-custom p-4">
                    
                    <?php if(session()->get('logged_in')): ?>
                        <!-- Step 1: Pilih Tiket -->
                        <div id="step-1" class="step-container">
                            <h4 class="fw-bold mb-4">1. Pilih Jenis Tiket</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="ticket-box p-3 ticket-option" data-type="early" data-price="15000" id="early-bird-ticket">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="fw-bold mb-0 text-primary">Early Bird</h5>
                                            <span class="badge bg-danger text-white">Promo</span>
                                        </div>
                                        <p class="h3 fw-bold mb-1">Rp 15.000</p>
                                        <p class="text-muted small mb-0">Stok terbatas: <span id="early-bird-stock">Menghitung...</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ticket-box p-3 ticket-option" data-type="regular" data-price="18000" id="regular-ticket">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="fw-bold mb-0 text-primary">Regular</h5>
                                        </div>
                                        <p class="h3 fw-bold mb-1">Rp 18.000</p>
                                        <p class="text-muted small mb-0" id="regular-status">Tersedia segera</p>
                                    </div>
                                </div>
                            </div>

                            <div id="quantity-selector" class="mb-4 d-none">
                                <label class="form-label fw-bold">Jumlah Tiket (Maks. 10)</label>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-outline-secondary" id="decrease-qty"><i class="bi bi-dash"></i></button>
                                    <span class="mx-4 fw-bold fs-5" id="ticket-quantity-display">1</span>
                                    <button type="button" class="btn btn-outline-secondary" id="increase-qty"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <button id="continue-to-form-btn" class="btn btn-custom-primary w-100 py-3 fw-bold d-none">Lanjutkan ke Data Pembeli <i class="bi bi-arrow-right ms-2"></i></button>
                        </div>

                        <!-- Step 2: Form Data -->
                        <div id="step-2" class="step-container d-none">
                            <div class="d-flex align-items-center mb-4">
                                <button class="btn btn-link text-decoration-none p-0 me-3" id="back-to-ticket-btn"><i class="bi bi-arrow-left"></i> Kembali</button>
                                <h4 class="fw-bold mb-0">2. Data Diri Pembeli</h4>
                            </div>
                            <form id="ticket-form">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control py-2" required placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Asal Instansi/Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" name="institution" class="form-control py-2" required placeholder="Cth: SMA N 1 Jakarta">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Nomor Telepon/WA <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" class="form-control py-2" required placeholder="08xxxxxxxx">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Email Aktif <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control py-2" required placeholder="Email untuk pengiriman tiket">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-custom-primary w-100 py-3 fw-bold mt-3">Lanjut ke Pembayaran <i class="bi bi-credit-card ms-2"></i></button>
                            </form>
                        </div>

                        <!-- Step 3: Pembayaran -->
                        <div id="step-3" class="step-container d-none">
                            <div class="d-flex align-items-center mb-4">
                                <button class="btn btn-link text-decoration-none p-0 me-3" id="back-to-form-btn"><i class="bi bi-arrow-left"></i> Kembali</button>
                                <h4 class="fw-bold mb-0">3. Metode Pembayaran</h4>
                            </div>
                            
                            <div class="bg-light p-3 rounded mb-4 border">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Jenis Tiket</span>
                                    <span class="fw-bold" id="ticket-type-display"></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Jumlah</span>
                                    <span class="fw-bold" id="ticket-qty-display"></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Total Pembayaran</span>
                                    <span class="fw-bold text-primary fs-4" id="total-payment-display"></span>
                                </div>
                            </div>

                            <h5 class="fw-bold mb-3">Pilih Bank / E-Wallet</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <button class="btn btn-outline-secondary w-100 p-3 text-start payment-option" data-method="bca" data-account="1234567890">
                                        <div class="fw-bold text-dark">Bank BCA</div>
                                        <div class="small">1234567890 a/n Paskibra</div>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-secondary w-100 p-3 text-start payment-option" data-method="bri" data-account="0987654321">
                                        <div class="fw-bold text-dark">Bank BRI</div>
                                        <div class="small">0987654321 a/n Paskibra</div>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-secondary w-100 p-3 text-start payment-option" data-method="dana" data-account="081234567890">
                                        <div class="fw-bold text-dark">DANA</div>
                                        <div class="small">081234567890 a/n Paskibra</div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Selesai -->
                        <div id="step-4" class="step-container d-none text-center">
                            <div class="mb-4 text-success">
                                <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-2">Pemesanan Berhasil Dibuat!</h3>
                            <p class="text-muted">Segera lakukan pembayaran agar tiket Anda dapat diterbitkan.</p>

                            <div class="bg-light p-4 rounded border my-4 text-start mx-auto" style="max-width: 400px;">
                                <div class="text-center mb-3">
                                    <div class="text-muted small">Kode Pembayaran</div>
                                    <div class="fs-3 fw-bold text-primary font-monospace" id="payment-code-display"></div>
                                </div>
                                <hr>
                                <div class="mb-2 d-flex justify-content-between"><span>Nama:</span> <span class="fw-bold" id="final-name"></span></div>
                                <div class="mb-2 d-flex justify-content-between"><span>Tiket:</span> <span class="fw-bold" id="final-ticket-type"></span></div>
                                <div class="mb-2 d-flex justify-content-between"><span>Jumlah:</span> <span class="fw-bold" id="final-quantity"></span></div>
                                <div class="mb-2 d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold">Transfer ke:</span>
                                    <div class="text-end">
                                        <div class="fw-bold" id="bank-name-display"></div>
                                        <div class="small font-monospace" id="account-number-display"></div>
                                    </div>
                                </div>
                                <div class="mt-3 p-2 bg-white rounded text-center border">
                                    <div class="small text-muted">Total Tagihan</div>
                                    <div class="fs-4 fw-bold text-danger" id="final-total-payment"></div>
                                </div>
                            </div>

                            <p class="text-muted small">Setelah Anda melakukan pembayaran, Admin akan memverifikasi, dan e-tiket akan dikirimkan ke Email Anda.</p>
                            <button id="done-payment-btn" class="btn btn-custom-primary px-5 py-2 mt-2">Selesai</button>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="bi bi-lock-fill text-muted mb-3 d-block" style="font-size: 3rem;"></i>
                            <h4 class="fw-bold">Login Diperlukan</h4>
                            <p class="text-muted mb-4">Silakan login atau daftar terlebih dahulu untuk melakukan pembelian dan mengamankan tiket Anda di akun Anda.</p>
                            <a href="<?= base_url('login') ?>" class="btn btn-custom-primary px-5 py-3 fw-bold">Login / Daftar Sekarang</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Tiket Saya -->
        <?php if(session()->get('logged_in')): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-4">Tiket Saya</h3>
                <div id="no-tickets-message" class="text-center text-muted p-5 bg-white rounded border">
                    <i class="bi bi-ticket-detailed fs-1 mb-3 d-block"></i>
                    <p>Belum ada tiket yang dibeli.</p>
                </div>
                <div id="tickets-list" class="row g-4">
                    <!-- Ticket cards rendered via JS -->
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>