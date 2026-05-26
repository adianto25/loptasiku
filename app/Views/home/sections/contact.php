<section id="kontak" class="py-5 bg-white">
    <div class="container my-5">
        <h2 id="contact-title" class="section-title text-center mb-5">Kirim Pesan</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-custom p-5">
                    <p class="text-center text-muted mb-4">Punya pertanyaan seputar acara atau pendaftaran? Kirimkan pesan Anda melalui formulir di bawah ini.</p>
                    <form id="contact-form">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="Masukkan nama Anda">
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <label class="form-label fw-bold text-muted small text-uppercase">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required placeholder="email@contoh.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted small text-uppercase">Nomor Telepon</label>
                                <input type="tel" name="phone" class="form-control" placeholder="08xxxxxxxx">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Subjek <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control" required placeholder="Terkait apa pesan ini?">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Pesan <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control" rows="5" required placeholder="Tuliskan pesan Anda selengkapnya di sini..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom-primary px-5 py-3 fw-bold">Kirim Pesan Sekarang <i class="bi bi-send ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>