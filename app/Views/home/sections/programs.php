<section id="program" class="py-5 bg-light">
    <div class="container my-5">
        <h2 id="programs-title" class="section-title text-center mb-5">Berita & Kegiatan Utama</h2>
        
        <div class="row g-4 mt-3">
            <!-- Event 1: Loptasiku -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/loptasiku.jpeg') ?>" alt="Loptasiku" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Kompetisi</span>
                            <h4 class="fw-bold text-white mb-2">Loptasiku</h4>
                            <p class="text-white-50 small mb-0">Lomba PBB tingkat SLTA (SMA/SMK/MA) bergengsi se-Jawa Tengah. Ajang mengasah kedisiplinan dan mental juara generasi muda secara kompetitif dan sportif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 2: Pengibaran -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/pengibaran.jpeg') ?>" alt="Pengibaran 17 Agustus" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Puncak Acara</span>
                            <h4 class="fw-bold text-white mb-2">Pengibaran 17 Agustus</h4>
                            <p class="text-white-50 small mb-0">Momen paling sakral dan membanggakan. Detik-detik pengibaran sang saka Merah Putih di hari kemerdekaan dengan penuh khidmat dan kehormatan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 3: LDK -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/ldk.jpeg') ?>" alt="Latihan Dasar Kepemimpinan" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Pelatihan</span>
                            <h4 class="fw-bold text-white mb-2">Latihan Dasar Kepemimpinan</h4>
                            <p class="text-white-50 small mb-0">Kawah candradimuka bagi calon anggota baru Paskibra. Proses rekrutmen ketat yang bertujuan mencetak pemimpin masa depan tangguh dan berkarakter teguh.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 4: GTS -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/gts.jpeg') ?>" alt="Go To School" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Edukasi</span>
                            <h4 class="fw-bold text-white mb-2">Go To School (GTS)</h4>
                            <p class="text-white-50 small mb-0">Ekspedisi edukasi dan pelatihan kepaskibrakaan yang baru saja diselenggarakan dengan sukses di SMK Al-Husain Keling, Kabupaten Jepara.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 5: Seminar -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/seminar.jpeg') ?>" alt="Seminar Kepemudaan" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Akademik</span>
                            <h4 class="fw-bold text-white mb-2">Seminar Kepemudaan</h4>
                            <p class="text-white-50 small mb-0">Wadah diskusi, motivasi, dan edukasi interaktif bagi pelajar tingkat SMA/SMK se-Kota Semarang guna mempersiapkan wawasan kebangsaan dan masa depan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event 6: Liburan -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <img src="<?= base_url('assets/images/liburan.jpeg') ?>" alt="Momen Liburan" class="event-img">
                    <div class="event-overlay">
                        <div class="event-content">
                            <span class="badge bg-primary mb-2">Internal</span>
                            <h4 class="fw-bold text-white mb-2">Momen Liburan & Keakraban</h4>
                            <p class="text-white-50 small mb-0">Bukan sekadar baris-berbaris. Kami juga menjalin ikatan kekeluargaan (bonding) yang solid antar anggota setelah masa tugas yang melelahkan selesai.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Custom CSS for Hover Effect Grid -->
<style>
    .event-card {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        height: 320px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        cursor: pointer;
        background-color: var(--primary-color);
    }
    .event-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .event-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(to top, rgba(11, 36, 71, 0.95) 0%, rgba(11, 36, 71, 0.7) 40%, rgba(11, 36, 71, 0.1) 100%);
        opacity: 0.9;
        transition: all 0.4s ease;
        display: flex;
        align-items: flex-end;
        padding: 25px;
    }
    .event-content {
        transform: translateY(40px);
        transition: transform 0.4s ease;
    }
    .event-content p {
        opacity: 0;
        transition: opacity 0.4s ease;
        transition-delay: 0.1s;
    }
    
    /* Hover Interactions */
    .event-card:hover .event-img {
        transform: scale(1.08);
    }
    .event-card:hover .event-overlay {
        background: linear-gradient(to top, rgba(11, 36, 71, 0.98) 0%, rgba(11, 36, 71, 0.85) 60%, rgba(11, 36, 71, 0.4) 100%);
    }
    .event-card:hover .event-content {
        transform: translateY(0);
    }
    .event-card:hover .event-content p {
        opacity: 1;
    }
</style>