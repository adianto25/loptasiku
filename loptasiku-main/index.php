<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Paskibra</title>
    <script src="/_sdk/element_sdk.js"></script>
    <script src="/_sdk/data_sdk.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        :root {
            --primary-dark: #2b0101;
            --primary-mid: #4a0404;
            --primary-main: #680606;
            --primary-light: #8b0a0a;
            --primary-accent: #a50d0d;
            /* Warna Emas */
            --gold-main: #D6B65F;
            --gold-light: #E9CC5B;
            --gold-dark: #B89B4A;
            --gold-glow: rgba(214, 182, 95, 0.4);
            --text-white: #ffffff;
            --text-light: rgba(255, 255, 255, 0.9);
            --text-muted: rgba(255, 255, 255, 0.7);
        }

        body {
            box-sizing: border-box;
            background: linear-gradient(180deg,
                    var(--primary-main) 0%,
                    var(--primary-mid) 25%,
                    var(--primary-dark) 50%,
                    var(--primary-mid) 75%,
                    var(--primary-main) 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hero gradient - lebih terang di atas */
        .gradient-bg {
            background: linear-gradient(180deg,
                    var(--primary-main) 0%,
                    var(--primary-mid) 50%,
                    var(--primary-dark) 100%);
            position: relative;
        }

        .gradient-bg::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to bottom, transparent, var(--primary-dark));
            pointer-events: none;
        }

        /* Section dengan gradasi menyambung */
        .section-padding {
            padding: 80px 24px;
            position: relative;
        }

        /* Gradasi dari gelap ke terang ke gelap */
        #tentang {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-mid) 50%,
                    var(--primary-dark) 100%);
        }

        #program {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-main) 50%,
                    var(--primary-dark) 100%);
        }

        #prestasi {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-mid) 50%,
                    var(--primary-dark) 100%);
        }

        #tiket {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-main) 50%,
                    var(--primary-dark) 100%);
        }

        #galeri {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-mid) 50%,
                    var(--primary-dark) 100%);
        }

        #kontak {
            background: linear-gradient(180deg,
                    var(--primary-dark) 0%,
                    var(--primary-main) 50%,
                    var(--primary-mid) 100%);
        }

        footer {
            background: linear-gradient(180deg,
                    var(--primary-mid) 0%,
                    var(--primary-dark) 100%) !important;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(145deg,
                    rgba(104, 6, 6, 0.6),
                    rgba(43, 1, 1, 0.8)) !important;
            border: 1px solid rgba(139, 10, 10, 0.3);
            backdrop-filter: blur(10px);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(43, 1, 1, 0.5);
            border-color: rgba(139, 10, 10, 0.6);
        }

        /* Card styles dengan glass effect */
        .rounded-2xl {
            background: linear-gradient(145deg,
                    rgba(74, 4, 4, 0.7),
                    rgba(43, 1, 1, 0.9)) !important;
            border: 1px solid rgba(104, 6, 6, 0.4);
            backdrop-filter: blur(10px);
        }

        /* Timeline dengan warna aksen */
        .timeline-item {
            background: linear-gradient(145deg,
                    rgba(104, 6, 6, 0.5),
                    rgba(43, 1, 1, 0.7)) !important;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg,
                    var(--primary-accent),
                    var(--primary-main),
                    var(--primary-mid));
            border-radius: 2px;
        }

        /* Navbar dengan gradasi halus */
        #navbar {
            background: linear-gradient(180deg,
                    rgba(104, 6, 6, 0.95) 0%,
                    rgba(74, 4, 4, 0.9) 100%) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(139, 10, 10, 0.3);
        }

        /* Button dengan gradasi EMAS - Premium Look */
        button,
        .btn {
            background: linear-gradient(135deg,
                    var(--gold-light),
                    var(--gold-main),
                    var(--gold-dark)) !important;
            border: 1px solid var(--gold-main);
            color: var(--primary-dark) !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-shadow: none;
        }

        button:hover,
        .btn:hover {
            background: linear-gradient(135deg,
                    var(--gold-light),
                    var(--gold-light),
                    var(--gold-main)) !important;
            box-shadow: 0 8px 30px var(--gold-glow), 0 0 20px var(--gold-glow);
            transform: translateY(-2px);
        }

        /* CTA Button khusus dengan glow */
        #cta-button {
            background: linear-gradient(135deg,
                    var(--gold-light),
                    var(--gold-main)) !important;
            color: var(--primary-dark) !important;
            font-weight: 700;
            box-shadow: 0 4px 20px var(--gold-glow);
        }

        #cta-button:hover {
            box-shadow: 0 8px 40px var(--gold-glow), 0 0 30px rgba(233, 204, 91, 0.5);
        }

        /* Input fields dengan tema maroon dan aksen emas */
        input,
        textarea {
            background: rgba(43, 1, 1, 0.6) !important;
            border: 1px solid rgba(104, 6, 6, 0.5) !important;
            color: var(--text-white) !important;
        }

        input:focus,
        textarea:focus {
            border-color: var(--gold-main) !important;
            box-shadow: 0 0 0 3px var(--gold-glow);
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Gallery items */
        .aspect-square>div {
            background: linear-gradient(145deg,
                    rgba(104, 6, 6, 0.6),
                    rgba(43, 1, 1, 0.8)) !important;
        }

        /* Smooth scroll */
        .smooth-scroll {
            scroll-behavior: smooth;
        }

        .hero-pattern {
            background-image:
                linear-gradient(135deg, rgba(255, 255, 255, 0.03) 25%, transparent 25%),
                linear-gradient(225deg, rgba(255, 255, 255, 0.03) 25%, transparent 25%),
                linear-gradient(45deg, rgba(255, 255, 255, 0.03) 25%, transparent 25%),
                linear-gradient(315deg, rgba(255, 255, 255, 0.03) 25%, transparent 25%);
            background-size: 40px 40px;
            background-position: 0 0, 0 20px, 20px -20px, -20px 0px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .stat-number {
            font-variant-numeric: tabular-nums;
            color: var(--gold-light) !important;
            text-shadow: 0 2px 10px var(--gold-glow);
        }

        /* Section Headings dengan aksen emas - Fixed clipping */
        h2 {
            background: linear-gradient(135deg, var(--gold-light), var(--gold-main));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
            width: 100%;
            padding-bottom: 0.1em;
            line-height: 1.3;
        }

        /* Card heading - Fixed clipping */
        h3 {
            color: var(--gold-light) !important;
            line-height: 1.4;
            padding-bottom: 0.05em;
        }

        /* Hero title fix */
        h1 {
            line-height: 1.2;
            padding-bottom: 0.1em;
        }

        /* Ticket options dengan gradient */
        .ticket-option {
            background: linear-gradient(145deg,
                    rgba(74, 4, 4, 0.6),
                    rgba(43, 1, 1, 0.8)) !important;
            border: 2px solid rgba(104, 6, 6, 0.4) !important;
        }

        .ticket-option:hover {
            border-color: var(--gold-main) !important;
            background: linear-gradient(145deg,
                    rgba(104, 6, 6, 0.7),
                    rgba(74, 4, 4, 0.9)) !important;
            box-shadow: 0 0 20px var(--gold-glow);
        }

        .ticket-option.selected {
            border-color: var(--gold-light) !important;
            box-shadow: 0 0 25px var(--gold-glow);
        }

        /* Payment options styling */
        .payment-option {
            background: linear-gradient(145deg,
                    rgba(74, 4, 4, 0.5),
                    rgba(43, 1, 1, 0.7)) !important;
        }

        .payment-option:hover {
            background: linear-gradient(145deg,
                    rgba(104, 6, 6, 0.6),
                    rgba(74, 4, 4, 0.8)) !important;
            border-color: var(--gold-main) !important;
        }

        /* Glow effect untuk elemen penting */
        @keyframes subtleGlow {

            0%,
            100% {
                box-shadow: 0 0 20px var(--gold-glow);
            }

            50% {
                box-shadow: 0 0 35px rgba(233, 204, 91, 0.6);
            }
        }

        @keyframes goldShimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .cta-glow {
            animation: subtleGlow 3s infinite;
        }

        /* Gold accent untuk borders */
        .gold-border {
            border: 1px solid var(--gold-main) !important;
        }

        /* Timeline dengan warna emas */
        .timeline-item::before {
            background: linear-gradient(180deg,
                    var(--gold-light),
                    var(--gold-main),
                    var(--gold-dark)) !important;
        }

        /* Nav link hover effect */
        .nav-link:hover {
            color: var(--gold-light) !important;
        }

        /* Price display dengan warna emas */
        .text-2xl.font-bold,
        .text-3xl.font-bold,
        .text-4xl.font-bold {
            color: var(--gold-light);
        }

        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 16px;
            }
        }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
</head>

<body class="h-full smooth-scroll">
    <div id="root" class="w-full h-full overflow-auto"><!-- Navigation -->
        <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-2xl">

                        </div><span id="nav-org-name" class="text-xl font-bold"></span>
                    </div>
                    <div class="hidden md:flex space-x-8"><a href="#beranda"
                            class="nav-link font-medium hover:opacity-80 transition-opacity">Beranda</a> <a
                            href="#tentang" class="nav-link font-medium hover:opacity-80 transition-opacity">Tentang</a>
                        <a href="#program" class="nav-link font-medium hover:opacity-80 transition-opacity">Program</a>
                        <a href="#prestasi"
                            class="nav-link font-medium hover:opacity-80 transition-opacity">Prestasi</a> <a
                            href="#tiket" class="nav-link font-medium hover:opacity-80 transition-opacity">Beli
                            Tiket</a> <a href="#galeri"
                            class="nav-link font-medium hover:opacity-80 transition-opacity">Galeri</a> <a
                            href="#kontak" class="nav-link font-medium hover:opacity-80 transition-opacity">Kontak</a>
                    </div><button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg></button>
                </div>
                <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2"><a href="#beranda"
                        class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Beranda</a> <a
                        href="#tentang"
                        class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Tentang</a> <a
                        href="#program"
                        class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Program</a> <a
                        href="#prestasi"
                        class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Prestasi</a> <a
                        href="#tiket" class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Beli
                        Tiket</a> <a href="#galeri"
                        class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Galeri</a> <a
                        href="#kontak" class="block py-2 px-4 rounded-lg hover:opacity-80 transition-opacity">Kontak</a>
                </div>
            </div>
        </nav><!-- Hero Section -->
        <section class="gradient-bg min-h-screen">
            <div class="max-w-7xl mx-auto px-6 py-20 w-full">
                <div class="text-center fade-in-up">
                    <div class="mb-6 text-6xl">
            
                    </div>
                    <h1 id="hero-title" class="text-5xl md:text-7xl font-bold mb-6"></h1>
                    <p id="hero-subtitle" class="text-xl md:text-2xl mb-12 opacity-90"></p><button id="cta-button"
                        class="px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"></button>
                </div>
                <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold stat-number mb-2">
                            100+
                        </div>
                        <div class="text-sm md:text-base opacity-80">
                            Total Anggota
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold stat-number mb-2">
                            70+
                        </div>
                        <div class="text-sm md:text-base opacity-80">
                            Anggota Aktif
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold stat-number mb-2">
                            5+
                        </div>
                        <div class="text-sm md:text-base opacity-80">
                            Kegiatan
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold stat-number mb-2">
                            10+
                        </div>
                        <div class="text-sm md:text-base opacity-80">
                            Tahun
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- About Section -->
        <section id="tentang" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 id="about-title" class="text-4xl md:text-5xl font-bold text-center mb-16"></h2>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg"
                            style="border: 2px solid var(--gold-main);">
                            <img src="assets/images/foto.png" alt="Tentang Paskibraku"
                                class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-9xl bg-gradient-to-br from-[#4a0404] to-[#2b0101]\'>🏆</div>';">
                        </div>
                    </div>
                    <div class="space-y-6">
                        <p id="about-text" class="text-lg leading-relaxed"></p>
                        <div class="space-y-4 mt-8">
                            <div class="flex items-start space-x-4">
                                <div class="text-3xl">

                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-2">Visi</h3>
                                    <p class="opacity-80">Menjadi organisasi pengibar bendera pusaka terbaik yang
                                        menjunjung tinggi nilai-nilai disiplin dan kebangsaan.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="text-3xl">

                                </div>
                                <div>
                                    <h3 class="font-bold text-xl mb-2">Misi</h3>
                                    <p class="opacity-80">Membentuk karakter anggota yang disiplin, bertanggung jawab,
                                        dan memiliki jiwa kepemimpinan yang kuat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Programs Section -->
        <section id="program" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 id="programs-title" class="text-4xl md:text-5xl font-bold text-center mb-16"></h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="rounded-2xl p-8 card-hover">
                        <div class="text-5xl mb-4">
                            ⚡
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Latihan Rutin</h3>
                        <p class="opacity-80 mb-4">Latihan PBB dan baris-berbaris dilaksanakan setiap minggu untuk
                            meningkatkan kekompakan dan kedisiplinan anggota.</p>
                        <ul class="space-y-2 opacity-80">
                            <li>• Loptasiku</li>
                            <li>• Goes To School (GTS)</li>
                            <li>• Pengibaran 17 Agustus</li>
                            <li>• Latihan Dasar Kepemimpinan (LDK)</li>
                        </ul>
                    </div>
                    <div class="rounded-2xl p-8 card-hover">
                        <div class="text-5xl mb-4">
                            📚
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Pelatihan Kepemimpinan</h3>
                        <p class="opacity-80 mb-4">Program pengembangan soft skills dan kepemimpinan untuk mempersiapkan
                            anggota menjadi pemimpin masa depan.</p>
                        <ul class="space-y-2 opacity-80">
                            <li>• Leadership Training</li>
                            <li>• Public Speaking</li>
                            <li>• Manajemen Waktu</li>
                        </ul>
                    </div>
                    <div class="rounded-2xl p-8 card-hover">
                        <div class="text-5xl mb-4">
                            🎪
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Event &amp; Kompetisi</h3>
                        <p class="opacity-80 mb-4">Aktif berpartisipasi dalam berbagai lomba dan event tingkat kota,
                            provinsi, hingga nasional.</p>
                        <ul class="space-y-2 opacity-80">
                            <li>• Lomba PBB</li>
                            <li>• Pentas Seni</li>
                            <li>• Upacara Bendera</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- Achievements Section -->
        <section id="prestasi" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 id="achievements-title" class="text-4xl md:text-5xl font-bold text-center mb-16"></h2>
                <div class="space-y-8">
                    <div class="rounded-2xl p-8 relative pl-12 timeline-item">
                        <div class="flex items-start space-x-6">
                            <div class="text-4xl">
                                🥇
                            </div>
                            <div>
                                <div class="text-sm opacity-60 mb-2">
                                    2024
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Juara 1 Lomba PBB Tingkat Provinsi</h3>
                                <p class="opacity-80">Meraih juara pertama dalam kompetisi PBB antar SMA se-provinsi
                                    dengan skor sempurna.</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl p-8 relative pl-12 timeline-item">
                        <div class="flex items-start space-x-6">
                            <div class="text-4xl">
                                🥈
                            </div>
                            <div>
                                <div class="text-sm opacity-60 mb-2">
                                    2023
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Juara 2 Lomba Formasi Terbaik</h3>
                                <p class="opacity-80">Penghargaan formasi terbaik dalam Festival Paskibra Nusantara
                                    tingkat nasional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl p-8 relative pl-12 timeline-item">
                        <div class="flex items-start space-x-6">
                            <div class="text-4xl">
                                🏅
                            </div>
                            <div>
                                <div class="text-sm opacity-60 mb-2">
                                    2023
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Pengibar Bendera HUT RI ke-78</h3>
                                <p class="opacity-80">Dipercaya sebagai pasukan pengibar bendera pusaka pada upacara
                                    kemerdekaan tingkat kota.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Ticket Purchase Section -->
        <section id="tiket" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-4">Beli Tiket Event</h2>
                <p class="text-center text-lg opacity-80 mb-16">Dapatkan tiket dan kupon suara Anda sekarang!</p>
                <!-- Ticket Selection Step -->
                <div id="step-1" class="max-w-4xl mx-auto">
                    <div class="rounded-2xl p-8 mb-8">
                        <h3 class="text-2xl font-bold mb-6">Pilih Jenis Tiket</h3>
                        <div class="space-y-4">
                            <div class="rounded-xl p-6 cursor-pointer border-2 ticket-option transition-all hover:shadow-lg"
                                data-type="early" data-price="15000" id="early-bird-ticket">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-4xl">
                                            🎯
                                        </div>
                                        <div>
                                            <h4 class="text-xl font-bold">Early Bird Ticket</h4>
                                            <p class="text-sm opacity-80">Untuk 500 pembeli pertama</p>
                                            <p class="text-xs opacity-60 mt-1">Tersisa: <span class="font-semibold"
                                                    id="early-bird-stock">500 tiket</span></p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold">
                                            Rp 15.000
                                        </div>
                                        <div class="text-xs opacity-60">
                                            per tiket
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-xl p-6 cursor-pointer border-2 ticket-option transition-all hover:shadow-lg"
                                data-type="regular" data-price="18000" id="regular-ticket">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-4xl">
                                            🎫
                                        </div>
                                        <div>
                                            <h4 class="text-xl font-bold">Regular Ticket</h4>
                                            <p class="text-sm opacity-80">Harga normal</p>
                                            <p class="text-xs opacity-60 mt-1" id="regular-status">Tersedia setelah
                                                early bird habis</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold">
                                            Rp 18.000
                                        </div>
                                        <div class="text-xs opacity-60">
                                            per tiket
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Quantity Selector -->
                        <div id="quantity-selector" class="hidden mt-8 p-6 rounded-xl border-2"><label
                                class="block text-sm font-medium mb-4">Jumlah Tiket</label>
                            <div class="flex items-center justify-center space-x-6"><button type="button"
                                    id="decrease-qty"
                                    class="w-14 h-14 rounded-full font-bold text-2xl transition-all hover:scale-110">-</button>
                                <div class="text-center">
                                    <div id="ticket-quantity-display" class="text-4xl font-bold">
                                        1
                                    </div>
                                    <div class="text-xs opacity-60 mt-1">
                                        tiket
                                    </div>
                                </div><button type="button" id="increase-qty"
                                    class="w-14 h-14 rounded-full font-bold text-2xl transition-all hover:scale-110">+</button>
                            </div>
                            <div class="text-center mt-4 text-sm opacity-60">
                                Maksimal 10 tiket per transaksi
                            </div>
                        </div><button id="continue-to-form-btn"
                            class="hidden w-full mt-6 py-4 rounded-lg font-semibold text-lg transition-all duration-300 hover:scale-105">
                            Lanjutkan </button>
                    </div>
                </div><!-- Passenger Details Step -->
                <div id="step-2" class="hidden max-w-4xl mx-auto">
                    <div class="rounded-2xl p-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold">Data Pembeli</h3><button id="back-to-ticket-btn"
                                class="text-sm opacity-60 hover:opacity-100 transition-opacity">← Ubah Tiket</button>
                        </div>
                        <form id="ticket-form" class="space-y-5">
                            <div><label for="buyer-name" class="block text-sm font-medium mb-2">Nama Lengkap *</label>
                                <input type="text" id="buyer-name" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div><label for="buyer-institution" class="block text-sm font-medium mb-2">Asal
                                    Sekolah/Instansi *</label> <input type="text" id="buyer-institution"
                                    name="institution" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="Nama sekolah atau instansi">
                            </div>
                            <div><label for="buyer-phone" class="block text-sm font-medium mb-2">No. HP/WhatsApp
                                    *</label> <input type="tel" id="buyer-phone" name="phone" required pattern="[0-9]+"
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="08xxxxxxxxxx">
                            </div>
                            <div><label for="buyer-email" class="block text-sm font-medium mb-2">Email *</label> <input
                                    type="email" id="buyer-email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="email@example.com">
                            </div><button type="submit" id="continue-to-payment-btn"
                                class="w-full py-4 rounded-lg font-semibold text-lg transition-all duration-300 hover:scale-105">
                                Lanjut ke Pembayaran </button>
                        </form>
                    </div>
                </div><!-- Payment Method Step -->
                <div id="step-3" class="hidden max-w-4xl mx-auto">
                    <div class="rounded-2xl p-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold">Pilih Metode Pembayaran</h3><button id="back-to-form-btn"
                                class="text-sm opacity-60 hover:opacity-100 transition-opacity">← Kembali</button>
                        </div>
                        <div class="mb-6 p-4 rounded-lg" id="order-summary-top">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="text-sm opacity-80">
                                        Total Pembayaran
                                    </div>
                                    <div class="text-3xl font-bold" id="total-payment-display">
                                        Rp 0
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm opacity-80" id="ticket-type-display">
                                        -
                                    </div>
                                    <div class="text-sm font-semibold" id="ticket-qty-display">
                                        -
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="text-sm font-medium mb-3 opacity-80">
                                Transfer Bank
                            </div><button type="button"
                                class="payment-option w-full p-4 rounded-lg border-2 transition-all hover:scale-102 text-left"
                                data-method="bca" data-account="1234567890">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="text-3xl">
                                            🏦
                                        </div>
                                        <div>
                                            <div class="font-bold">
                                                BCA
                                            </div>
                                            <div class="text-xs opacity-60">
                                                Transfer via BCA
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-sm opacity-60">
                                        →
                                    </div>
                                </div>
                            </button> <button type="button"
                                class="payment-option w-full p-4 rounded-lg border-2 transition-all hover:scale-102 text-left"
                                data-method="bri" data-account="5567891234">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="text-3xl">
                                            🏦
                                        </div>
                                        <div>
                                            <div class="font-bold">
                                                BRI
                                            </div>
                                            <div class="text-xs opacity-60">
                                                Transfer via BRI
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-sm opacity-60">
                                        →
                                    </div>
                                </div>
                            </button>
                            <div class="text-sm font-medium mb-3 mt-6 opacity-80">
                                E-Wallet
                            </div><button type="button"
                                class="payment-option w-full p-4 rounded-lg border-2 transition-all hover:scale-102 text-left"
                                data-method="dana" data-account="081298765432">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="text-3xl">
                                            💙
                                        </div>
                                        <div>
                                            <div class="font-bold">
                                                DANA
                                            </div>
                                            <div class="text-xs opacity-60">
                                                Transfer via DANA
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-sm opacity-60">
                                        →
                                    </div>
                                </div>
                            </button> <button type="button"
                                class="payment-option w-full p-4 rounded-lg border-2 transition-all hover:scale-102 text-left"
                                data-method="shopee" data-account="081234567890">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="text-3xl">
                                            🛍️
                                        </div>
                                        <div>
                                            <div class="font-bold">
                                                ShopeePay
                                            </div>
                                            <div class="text-xs opacity-60">
                                                Transfer via ShopeePay
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-sm opacity-60">
                                        →
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div><!-- Payment Instruction Step -->
                <div id="step-4" class="hidden max-w-4xl mx-auto">
                    <div class="rounded-2xl p-8">
                        <div class="text-center mb-8">
                            <div class="text-6xl mb-4">
                                ✅
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Pesanan Berhasil Dibuat!</h3>
                            <p class="opacity-80">Selesaikan pembayaran untuk mendapatkan tiket Anda</p>
                        </div><!-- Payment Details Card -->
                        <div class="rounded-xl p-6 mb-6" id="payment-details-card">
                            <div class="text-center mb-6">
                                <div class="text-sm opacity-60 mb-2">
                                    Kode Pembayaran
                                </div>
                                <div class="text-3xl font-bold tracking-wider" id="payment-code-display">
                                    -
                                </div>
                            </div>
                            <div class="border-t border-b py-4 mb-4">
                                <div class="flex justify-between mb-3"><span class="opacity-80">Jenis Tiket</span> <span
                                        class="font-semibold" id="final-ticket-type">-</span>
                                </div>
                                <div class="flex justify-between mb-3"><span class="opacity-80">Jumlah</span> <span
                                        class="font-semibold" id="final-quantity">-</span>
                                </div>
                                <div class="flex justify-between mb-3"><span class="opacity-80">Nama Pemesan</span>
                                    <span class="font-semibold" id="final-name">-</span>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="text-sm font-medium mb-3">
                                    Transfer ke:
                                </div>
                                <div class="p-4 rounded-lg" style="background-color: rgba(255,255,255,0.05);">
                                    <div class="flex items-center justify-between mb-2"><span class="font-bold text-lg"
                                            id="bank-name-display">-</span> <span class="text-2xl"
                                            id="bank-icon-display">🏦</span>
                                    </div>
                                    <div class="text-sm opacity-60 mb-1">
                                        Nomor Rekening
                                    </div>
                                    <div class="font-mono text-xl font-bold mb-3" id="account-number-display">
                                        -
                                    </div>
                                    <div class="text-sm opacity-60 mb-1">
                                        Atas Nama
                                    </div>
                                    <div class="font-semibold">
                                        Panitia Paskibra Event
                                    </div>
                                </div>
                            </div>
                            <div class="text-center p-6 rounded-lg" style="background-color: rgba(104, 6, 6, 0.2);">

                                <div class="text-sm opacity-80 mb-2">
                                    Total yang harus dibayar
                                </div>
                                <div class="text-4xl font-bold" id="final-total-payment">
                                    Rp 0
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg p-4 mb-6" style="background-color: rgba(255, 193, 7, 0.1);">
                            <div class="text-sm">
                                <div class="font-semibold mb-2">
                                    ⚠����� Instruksi Pembayaran:
                                </div>
                                <ol class="list-decimal list-inside space-y-1 opacity-80 text-sm">
                                    <li>Transfer sesuai nominal di atas ke rekening yang tertera</li>
                                    <li>Simpan bukti transfer Anda</li>
                                    <li>Tiket akan otomatis diverifikasi dalam 1x24 jam</li>
                                    <li>Cek status tiket di bawah setelah pembayaran</li>
                                </ol>
                            </div>
                        </div><button id="done-payment-btn"
                            class="w-full py-4 rounded-lg font-semibold text-lg transition-all duration-300 hover:scale-105">
                            Saya Sudah Transfer </button>
                    </div>
                </div><!-- My Tickets Section -->
                <div class="mt-16">
                    <h3 class="text-3xl font-bold mb-8">Tiket Saya</h3>
                    <div id="tickets-list" class="grid md:grid-cols-2 gap-6"><!-- Tickets will be displayed here -->
                    </div>
                    <div id="no-tickets-message" class="text-center py-12 opacity-60">
                        <div class="text-6xl mb-4">
                            🎫
                        </div>
                        <p class="text-lg">Belum ada tiket yang dibeli</p>
                    </div>
                </div>
            </div>
        </section><!-- Gallery Section -->
        <section id="galeri" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 id="gallery-title" class="text-4xl md:text-5xl font-bold text-center mb-16"></h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/foto2.jpg" alt="Galeri 1" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>📸</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/ldk1.jpeg" alt="Galeri 2" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🎯</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/ldk2.jpeg" alt="Galeri 3" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🏃</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/lopta1.jpeg" alt="Galeri 4" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🤝</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/foto2.jpg" alt="Galeri 5" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🎊</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/ldk1.jpeg" alt="Galeri 6" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🌟</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/ldk2.jpeg" alt="Galeri 7" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>💪</div>';">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden card-hover">
                        <img src="assets/images/lopta1.jpeg" alt="Galeri 8" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-6xl\'>🎖️</div>';">
                    </div>
                </div>
            </div>
        </section><!-- Contact Section -->
        <section id="kontak" class="section-padding">
            <div class="max-w-7xl mx-auto">
                <h2 id="contact-title" class="text-4xl md:text-5xl font-bold text-center mb-4"></h2>
                <p class="text-center text-lg opacity-80 mb-16">Punya pertanyaan? Hubungi kami dan kami akan segera
                    merespons!</p>
                <div class="grid md:grid-cols-2 gap-8"><!-- Contact Information Cards -->
                    <div class="space-y-6">
                        <div class="rounded-2xl p-8">
                            <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
                            <div class="space-y-6"><!-- Email Card -->
                                <div class="flex items-start space-x-4 p-4 rounded-xl transition-all hover:scale-105 cursor-pointer"
                                    style="background-color: rgba(255,255,255,0.05);">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl"
                                        style="background-color: rgba(104, 6, 6, 0.3);">
                                        📧
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold mb-1">
                                            Email
                                        </div><a href="mailto:paskibra@example.com"
                                            class="text-sm opacity-80 hover:opacity-100 transition-opacity">paskibra@example.com</a>
                                    </div>
                                </div><!-- Phone Card -->
                                <div class="flex items-start space-x-4 p-4 rounded-xl transition-all hover:scale-105 cursor-pointer"
                                    style="background-color: rgba(255,255,255,0.05);">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl"
                                        style="background-color: rgba(104, 6, 6, 0.3);">
                                        📱
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold mb-1">
                                            Telepon / WhatsApp
                                        </div><a href="tel:+6281234567890"
                                            class="text-sm opacity-80 hover:opacity-100 transition-opacity block">+62
                                            812-3456-7890</a> <a href="https://wa.me/6281234567890" target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-xs opacity-60 hover:opacity-100 transition-opacity">Chat via
                                            WhatsApp →</a>
                                    </div>
                                </div><!-- Location Card -->
                                <div class="flex items-start space-x-4 p-4 rounded-xl transition-all hover:scale-105 cursor-pointer"
                                    style="background-color: rgba(255,255,255,0.05);">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl"
                                        style="background-color: rgba(104, 6, 6, 0.3);">
                                        📍
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold mb-1">
                                            Alamat
                                        </div>
                                        <div class="text-sm opacity-80">
                                            Jl. Pendidikan No. 123<br>
                                            Jakarta Selatan, DKI Jakarta<br>
                                            Indonesia 12345
                                        </div>
                                    </div>
                                </div><!-- Social Media -->
                                <div class="flex items-start space-x-4 p-4 rounded-xl transition-all hover:scale-105 cursor-pointer"
                                    style="background-color: rgba(255,255,255,0.05);">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl"
                                        style="background-color: rgba(104, 6, 6, 0.3);">
                                        🌐
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold mb-3">
                                            Media Sosial
                                        </div>
                                        <div class="flex space-x-4"><a href="#" target="_blank"
                                                rel="noopener noreferrer"
                                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                                style="background-color: rgba(104, 6, 6, 0.3);" title="Facebook"> 📘
                                            </a> <a href="#" target="_blank" rel="noopener noreferrer"
                                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                                style="background-color: rgba(104, 6, 6, 0.3);" title="Instagram"> 📷
                                            </a> <a href="#" target="_blank" rel="noopener noreferrer"
                                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                                style="background-color: rgba(104, 6, 6, 0.3);" title="Twitter"> 🐦
                                            </a> <a href="#" target="_blank" rel="noopener noreferrer"
                                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all hover:scale-110"
                                                style="background-color: rgba(104, 6, 6, 0.3);" title="YouTube"> ▶️
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Operating Hours -->
                            <div class="mt-8 p-6 rounded-xl"
                                style="background-color: rgba(255,193,7,0.1); border: 2px dashed rgba(255,193,7,0.3);">
                                <div class="flex items-start space-x-3">
                                    <div class="text-2xl">
                                        ⏰
                                    </div>
                                    <div>
                                        <div class="font-semibold mb-2">
                                            Jam Operasional
                                        </div>
                                        <div class="text-sm space-y-1 opacity-80">
                                            <div>
                                                Senin - Jumat: 08:00 - 16:00
                                            </div>
                                            <div>
                                                Sabtu: 08:00 - 12:00
                                            </div>
                                            <div>
                                                Minggu &amp; Libur: Tutup
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Contact Form -->
                    <div class="rounded-2xl p-8">
                        <h3 class="text-2xl font-bold mb-2">Kirim Pesan</h3>
                        <p class="text-sm opacity-80 mb-6">Isi formulir di bawah dan kami akan menghubungi Anda sesegera
                            mungkin</p>
                        <form id="contact-form" class="space-y-5">
                            <div><label for="name" class="block text-sm font-medium mb-2"> Nama Lengkap <span
                                        class="text-red-500">*</span> </label> <input type="text" id="name" name="name"
                                    required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="John Doe">
                            </div>
                            <div><label for="email" class="block text-sm font-medium mb-2"> Email <span
                                        class="text-red-500">*</span> </label> <input type="email" id="email"
                                    name="email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="john@example.com">
                            </div>
                            <div><label for="phone-contact" class="block text-sm font-medium mb-2"> Nomor Telepon
                                </label> <input type="tel" id="phone-contact" name="phone"
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="08xxxxxxxxxx">
                            </div>
                            <div><label for="subject" class="block text-sm font-medium mb-2"> Subjek <span
                                        class="text-red-500">*</span> </label> <input type="text" id="subject"
                                    name="subject" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all"
                                    placeholder="Pertanyaan tentang...">
                            </div>
                            <div><label for="message" class="block text-sm font-medium mb-2"> Pesan <span
                                        class="text-red-500">*</span> </label> <textarea id="message" name="message"
                                    rows="5" required
                                    class="w-full px-4 py-3 rounded-lg border-2 focus:outline-none focus:ring-2 transition-all resize-none"
                                    placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div><button type="submit"
                                class="w-full py-4 rounded-lg font-semibold transition-all duration-300 hover:scale-105 flex items-center justify-center space-x-2">
                                <span>Kirim Pesan</span> <span>📩</span> </button>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- Footer -->
        <footer class="py-8">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <p id="footer-text" class="text-sm opacity-80 center"></p>
                    
                </div>
            </div>
        </footer>
    </div>
    <script>
        let allTickets = [];
        let selectedTicketType = null;
        let selectedTicketPrice = 0;
        let ticketQuantity = 1;
        let selectedPaymentMethod = null;
        let selectedPaymentAccount = null;
        let currentStep = 1;
        let buyerData = {};

        const defaultConfig = {
            background_color: '#680606',
            surface_color: '#4a0404',
            text_color: '#ffffff',
            primary_action_color: '#8b0a0a',
            secondary_action_color: '#2b0101',
            org_name: 'PASKIBRAKU',
            hero_title: 'Pasukan Pengibar Bendera',
            hero_subtitle: 'Sigap, Tanggap, Tangguh',
            cta_button: 'Bergabung Dengan Kami',
            about_title: 'Tentang Paskibraku',
            about_text: 'Paskibra adalah organisasi pengibar bendera pusaka yang mengedepankan nilai-nilai disiplin, tanggung jawab, dan nasionalisme. Kami berkomitmen membentuk generasi muda yang berkarakter kuat dan cinta tanah air.',
            programs_title: 'Program Kegiatan',
            achievements_title: 'Prestasi Kami',
            gallery_title: 'Galeri Foto',
            contact_title: 'Hubungi Kami',
            footer_text: '© 2025 Paskibra. All rights reserved.'
        };

        const dataHandler = {
            onDataChanged(data) {
                allTickets = data;
                renderTickets();
                updateTicketAvailability();
            }
        };

        function updateTicketAvailability() {
            const earlyBirdCount = allTickets.filter(t => t.ticket_type === 'early').reduce((sum, t) => sum + t.quantity, 0);
            const remaining = Math.max(0, 500 - earlyBirdCount);

            const earlyBirdTicket = document.getElementById('early-bird-ticket');
            const regularTicket = document.getElementById('regular-ticket');
            const earlyBirdStock = document.getElementById('early-bird-stock');
            const regularStatus = document.getElementById('regular-status');

            if (earlyBirdStock) {
                earlyBirdStock.textContent = `${remaining} tiket`;
            }

            if (remaining === 0) {
                if (earlyBirdTicket) {
                    earlyBirdTicket.style.opacity = '0.5';
                    earlyBirdTicket.style.cursor = 'not-allowed';
                    earlyBirdTicket.classList.add('ticket-sold-out');
                }
                if (regularStatus) {
                    regularStatus.textContent = 'Tersedia sekarang!';
                    regularStatus.style.color = window.elementSdk?.config?.primary_action_color || defaultConfig.primary_action_color;
                }
            } else {
                if (regularTicket) {
                    regularTicket.style.opacity = '0.5';
                    regularTicket.style.cursor = 'not-allowed';
                    regularTicket.classList.add('ticket-not-available');
                }
            }
        }

        async function onConfigChange(config) {
            const bgColor = config.background_color || defaultConfig.background_color;
            const surfaceColor = config.surface_color || defaultConfig.surface_color;
            const textColor = config.text_color || defaultConfig.text_color;
            const primaryColor = config.primary_action_color || defaultConfig.primary_action_color;
            const secondaryColor = config.secondary_action_color || defaultConfig.secondary_action_color;

            document.documentElement.style.setProperty('--bg-primary', bgColor);
            document.documentElement.style.setProperty('--bg-secondary', secondaryColor);
            document.documentElement.style.setProperty('--accent-color', primaryColor);

            document.body.style.backgroundColor = bgColor;
            document.body.style.color = textColor;

            const navbar = document.getElementById('navbar');
            navbar.style.backgroundColor = bgColor;
            navbar.style.color = textColor;

            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.style.color = textColor;
            });

            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            mobileMenuBtn.style.color = textColor;

            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.style.backgroundColor = surfaceColor;
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.style.color = textColor;
                link.style.backgroundColor = 'transparent';
                link.addEventListener('mouseenter', () => {
                    link.style.backgroundColor = bgColor;
                });
                link.addEventListener('mouseleave', () => {
                    link.style.backgroundColor = 'transparent';
                });
            });

            const ctaButton = document.getElementById('cta-button');
            ctaButton.style.backgroundColor = primaryColor;
            ctaButton.style.color = textColor;

            const cards = document.querySelectorAll('.rounded-2xl');
            cards.forEach(card => {
                if (!card.closest('form')) {
                    card.style.backgroundColor = surfaceColor;
                    card.style.color = textColor;
                }
            });

            const timelineItems = document.querySelectorAll('.timeline-item');
            timelineItems.forEach(item => {
                item.style.backgroundColor = surfaceColor;
            });

            const galleryItems = document.querySelectorAll('.aspect-square > div');
            galleryItems.forEach(item => {
                item.style.backgroundColor = surfaceColor;
            });

            const contactForm = document.getElementById('contact-form');
            contactForm.style.backgroundColor = surfaceColor;

            const inputs = document.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.style.backgroundColor = bgColor;
                input.style.color = textColor;
                input.style.borderColor = secondaryColor;
            });

            const submitButton = contactForm.querySelector('button[type="submit"]');
            submitButton.style.backgroundColor = primaryColor;
            submitButton.style.color = textColor;

            const footer = document.querySelector('footer');
            footer.style.backgroundColor = surfaceColor;
            footer.style.color = textColor;

            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            if (decreaseBtn && increaseBtn) {
                decreaseBtn.style.backgroundColor = secondaryColor;
                decreaseBtn.style.color = textColor;
                increaseBtn.style.backgroundColor = secondaryColor;
                increaseBtn.style.color = textColor;
            }

            document.getElementById('nav-org-name').textContent = config.org_name || defaultConfig.org_name;
            document.getElementById('hero-title').textContent = config.hero_title || defaultConfig.hero_title;
            document.getElementById('hero-subtitle').textContent = config.hero_subtitle || defaultConfig.hero_subtitle;
            document.getElementById('cta-button').textContent = config.cta_button || defaultConfig.cta_button;
            document.getElementById('about-title').textContent = config.about_title || defaultConfig.about_title;
            document.getElementById('about-text').textContent = config.about_text || defaultConfig.about_text;
            document.getElementById('programs-title').textContent = config.programs_title || defaultConfig.programs_title;
            document.getElementById('achievements-title').textContent = config.achievements_title || defaultConfig.achievements_title;
            document.getElementById('gallery-title').textContent = config.gallery_title || defaultConfig.gallery_title;
            document.getElementById('contact-title').textContent = config.contact_title || defaultConfig.contact_title;
            document.getElementById('footer-text').textContent = config.footer_text || defaultConfig.footer_text;
        }

        function mapToCapabilities(config) {
            return {
                recolorables: [
                    {
                        get: () => config.background_color || defaultConfig.background_color,
                        set: (value) => {
                            config.background_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ background_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.surface_color || defaultConfig.surface_color,
                        set: (value) => {
                            config.surface_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ surface_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.text_color || defaultConfig.text_color,
                        set: (value) => {
                            config.text_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ text_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.primary_action_color || defaultConfig.primary_action_color,
                        set: (value) => {
                            config.primary_action_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ primary_action_color: value });
                            }
                        }
                    },
                    {
                        get: () => config.secondary_action_color || defaultConfig.secondary_action_color,
                        set: (value) => {
                            config.secondary_action_color = value;
                            if (window.elementSdk) {
                                window.elementSdk.setConfig({ secondary_action_color: value });
                            }
                        }
                    }
                ],
                borderables: [],
                fontEditable: undefined,
                fontSizeable: undefined
            };
        }

        function mapToEditPanelValues(config) {
            return new Map([
                ['org_name', config.org_name || defaultConfig.org_name],
                ['hero_title', config.hero_title || defaultConfig.hero_title],
                ['hero_subtitle', config.hero_subtitle || defaultConfig.hero_subtitle],
                ['cta_button', config.cta_button || defaultConfig.cta_button],
                ['about_title', config.about_title || defaultConfig.about_title],
                ['about_text', config.about_text || defaultConfig.about_text],
                ['programs_title', config.programs_title || defaultConfig.programs_title],
                ['achievements_title', config.achievements_title || defaultConfig.achievements_title],
                ['gallery_title', config.gallery_title || defaultConfig.gallery_title],
                ['contact_title', config.contact_title || defaultConfig.contact_title],
                ['footer_text', config.footer_text || defaultConfig.footer_text]
            ]);
        }

        function showStep(step) {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-3').classList.add('hidden');
            document.getElementById('step-4').classList.add('hidden');

            document.getElementById(`step-${step}`).classList.remove('hidden');
            currentStep = step;

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function renderTickets() {
            const ticketsList = document.getElementById('tickets-list');
            const noTicketsMessage = document.getElementById('no-tickets-message');

            if (allTickets.length === 0) {
                ticketsList.innerHTML = '';
                noTicketsMessage.classList.remove('hidden');
                return;
            }

            noTicketsMessage.classList.add('hidden');
            ticketsList.innerHTML = '';

            allTickets.forEach(ticket => {
                const ticketCard = document.createElement('div');
                ticketCard.className = 'rounded-2xl p-6 relative';
                ticketCard.style.backgroundColor = window.elementSdk?.config?.surface_color || defaultConfig.surface_color;
                ticketCard.style.color = window.elementSdk?.config?.text_color || defaultConfig.text_color;
                ticketCard.style.border = '2px solid rgba(255,255,255,0.1)';

                const statusColor = ticket.payment_status === 'pending' ? '#f59e0b' :
                    ticket.payment_status === 'verified' ? '#10b981' : '#ef4444';

                const statusText = ticket.payment_status === 'pending' ? 'Menunggu Pembayaran' :
                    ticket.payment_status === 'verified' ? 'Terverifikasi ✓' : 'Ditolak';

                const emoji = ticket.ticket_type === 'early' ? '🎯' : '🎫';
                const ticketName = ticket.ticket_type === 'early' ? 'Early Bird' : 'Regular';

                const bankIcons = {
                    'bca': '🏦',
                    'bri': '🏦',
                    'dana': '💙',
                    'shopee': '🛍️'
                };

                ticketCard.innerHTML = `
                    <div class="absolute top-4 right-4">
                        <div class="text-xs px-3 py-1 rounded-full font-semibold" style="background-color: ${statusColor}; color: white;">
                            ${statusText}
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="text-4xl mb-2">${emoji}</div>
                        <h4 class="text-xl font-bold mb-1">${ticketName} Ticket</h4>
                        <p class="text-sm opacity-60">${ticket.name}</p>
                    </div>
                    
                    <div class="p-4 rounded-lg mb-4" style="background-color: rgba(255,255,255,0.05);">
                        <div class="text-center mb-3">
                            <div class="text-xs opacity-60 mb-1">Kode Pembayaran</div>
                            <div class="text-2xl font-bold tracking-wider font-mono">${ticket.payment_code}</div>
                        </div>
                        
                        <div class="border-t pt-3" style="border-color: rgba(255,255,255,0.1);">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="opacity-60">Jumlah</span>
                                <span class="font-semibold">${ticket.quantity} tiket</span>
                            </div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="opacity-60">Total Bayar</span>
                                <span class="font-bold text-lg">Rp ${ticket.total_price.toLocaleString('id-ID')}</span>
                            </div>
                        </div>
                    </div>

                    ${ticket.payment_status === 'verified' ? `
                        <div class="p-4 rounded-lg text-center" style="background-color: rgba(16, 185, 129, 0.1); border: 2px dashed rgba(16, 185, 129, 0.3);">
                            <div id="qr-${ticket.id}" class="flex justify-center mb-3"></div>
                            <p class="text-xs font-semibold" style="color: #10b981;">Tiket Sah - Tunjukkan di pintu masuk</p>
                        </div>
                    ` : ''}
                    
                    ${ticket.payment_status === 'pending' ? `
                        <div class="p-4 rounded-lg" style="background-color: rgba(245, 158, 11, 0.1);">
                            <div class="text-sm font-semibold mb-2">Transfer ke:</div>
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <div class="font-bold">${ticket.payment_method.toUpperCase()}</div>
                                    <div class="font-mono font-bold text-lg">${ticket.payment_account}</div>
                                    <div class="text-xs opacity-60">a.n. Panitia Paskibra Event</div>
                                </div>
                                <div class="text-3xl">${bankIcons[ticket.payment_method] || '💳'}</div>
                            </div>
                        </div>
                        <button class="verify-btn w-full mt-3 py-2 px-4 rounded-lg font-semibold text-sm transition-all hover:scale-105" data-ticket-id="${ticket.__backendId}" style="background-color: #10b981; color: white;">
                            ✓ Verifikasi Pembayaran (Demo)
                        </button>
                    ` : ''}
                `;

                ticketsList.appendChild(ticketCard);

                if (ticket.payment_status === 'verified') {
                    setTimeout(() => {
                        const qrContainer = document.getElementById(`qr-${ticket.id}`);
                        if (qrContainer && qrContainer.innerHTML === '') {
                            new QRCode(qrContainer, {
                                text: `TICKET-${ticket.payment_code}-${ticket.id}`,
                                width: 120,
                                height: 120,
                                colorDark: window.elementSdk?.config?.text_color || defaultConfig.text_color,
                                colorLight: window.elementSdk?.config?.surface_color || defaultConfig.surface_color
                            });
                        }
                    }, 100);
                }

                const verifyBtn = ticketCard.querySelector('.verify-btn');
                if (verifyBtn) {
                    verifyBtn.addEventListener('click', async () => {
                        verifyBtn.disabled = true;
                        verifyBtn.textContent = 'Memverifikasi...';

                        const ticketToUpdate = allTickets.find(t => t.__backendId === ticket.__backendId);

                        if (ticketToUpdate && window.dataSdk) {
                            ticketToUpdate.payment_status = 'verified';
                            const result = await window.dataSdk.update(ticketToUpdate);

                            if (!result.isOk) {
                                verifyBtn.disabled = false;
                                verifyBtn.textContent = '✓ Verifikasi Pembayaran (Demo)';

                                const errorDiv = document.createElement('div');
                                errorDiv.className = 'mt-2 p-2 rounded text-xs text-center';
                                errorDiv.style.backgroundColor = '#ef4444';
                                errorDiv.style.color = 'white';
                                errorDiv.textContent = 'Gagal memverifikasi. Coba lagi.';
                                verifyBtn.parentElement.appendChild(errorDiv);
                                setTimeout(() => errorDiv.remove(), 3000);
                            }
                        } else if (ticketToUpdate) {
                            // Fallback: Update locally when SDK is not available
                            ticketToUpdate.payment_status = 'verified';

                            // Save to localStorage
                            try {
                                localStorage.setItem('paskibra_tickets', JSON.stringify(allTickets));
                            } catch (e) {
                                console.log('Could not save to localStorage');
                            }

                            // Re-render tickets to show verified status with QR code
                            renderTickets();
                            updateTicketAvailability();
                        }
                    });
                }
            });
        }

        function generatePaymentCode() {
            const timestamp = Date.now().toString().slice(-6);
            const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
            return `PAY${timestamp}${random}`;
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities,
                mapToEditPanelValues
            });
        } else {
            // Fallback: Apply default config when SDK is not available
            onConfigChange(defaultConfig);
        }

        if (window.dataSdk) {
            window.dataSdk.init(dataHandler);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const ticketOptions = document.querySelectorAll('.ticket-option');
            const submitBtn = document.getElementById('submit-ticket-btn');
            const selectedTicketInfo = document.getElementById('selected-ticket-info');
            const selectedTicketTypeEl = document.getElementById('selected-ticket-type');
            const ticketQuantitySection = document.getElementById('ticket-quantity-section');
            const paymentMethodSection = document.getElementById('payment-method-section');
            const ticketQuantityInput = document.getElementById('ticket-quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const paymentOptions = document.querySelectorAll('.payment-option');

            ticketOptions.forEach(option => {
                option.addEventListener('click', () => {
                    if (option.classList.contains('ticket-sold-out') || option.classList.contains('ticket-not-available')) {
                        const warningDiv = document.createElement('div');
                        warningDiv.className = 'mt-4 p-4 rounded-lg text-center';
                        warningDiv.style.backgroundColor = '#ef4444';
                        warningDiv.style.color = 'white';

                        if (option.classList.contains('ticket-sold-out')) {
                            warningDiv.textContent = 'Early Bird sudah habis! Silakan pilih Regular Ticket.';
                        } else {
                            warningDiv.textContent = 'Regular Ticket belum tersedia. Pilih Early Bird Ticket terlebih dahulu!';
                        }

                        option.appendChild(warningDiv);
                        setTimeout(() => warningDiv.remove(), 3000);
                        return;
                    }

                    ticketOptions.forEach(opt => {
                        if (!opt.classList.contains('ticket-sold-out') && !opt.classList.contains('ticket-not-available')) {
                            opt.style.borderColor = window.elementSdk?.config?.secondary_action_color || defaultConfig.secondary_action_color;
                            opt.style.opacity = '0.7';
                        }
                    });

                    option.style.borderColor = window.elementSdk?.config?.primary_action_color || defaultConfig.primary_action_color;
                    option.style.opacity = '1';

                    const type = option.getAttribute('data-type');
                    const price = parseInt(option.getAttribute('data-price'));

                    selectedTicketType = type;
                    selectedTicketPrice = price;

                    const quantitySelector = document.getElementById('quantity-selector');
                    const continueBtn = document.getElementById('continue-to-form-btn');

                    quantitySelector.classList.remove('hidden');
                    continueBtn.classList.remove('hidden');
                    continueBtn.style.backgroundColor = window.elementSdk?.config?.primary_action_color || defaultConfig.primary_action_color;
                    continueBtn.style.color = window.elementSdk?.config?.text_color || defaultConfig.text_color;
                });
            });

            const quantityDisplay = document.getElementById('ticket-quantity-display');

            decreaseBtn.addEventListener('click', () => {
                if (ticketQuantity > 1) {
                    ticketQuantity--;
                    quantityDisplay.textContent = ticketQuantity;
                }
            });

            increaseBtn.addEventListener('click', () => {
                if (ticketQuantity < 10) {
                    ticketQuantity++;
                    quantityDisplay.textContent = ticketQuantity;
                }
            });

            const continueToFormBtn = document.getElementById('continue-to-form-btn');
            continueToFormBtn.addEventListener('click', () => {
                showStep(2);
            });

            const backToTicketBtn = document.getElementById('back-to-ticket-btn');
            backToTicketBtn.addEventListener('click', () => {
                showStep(1);
            });

            paymentOptions.forEach(option => {
                option.addEventListener('click', async () => {
                    if (allTickets.length >= 999) {
                        const warningDiv = document.createElement('div');
                        warningDiv.className = 'mt-4 p-4 rounded-lg text-center';
                        warningDiv.style.backgroundColor = '#ef4444';
                        warningDiv.style.color = 'white';
                        warningDiv.textContent = 'Maaf, batas maksimal pembelian tiket telah tercapai (999 tiket).';
                        option.closest('.rounded-2xl').appendChild(warningDiv);
                        setTimeout(() => warningDiv.remove(), 5000);
                        return;
                    }

                    option.disabled = true;
                    option.style.opacity = '0.5';
                    option.textContent = 'Memproses...';

                    selectedPaymentMethod = option.getAttribute('data-method');
                    selectedPaymentAccount = option.getAttribute('data-account');

                    const paymentCode = generatePaymentCode();
                    const ticketId = `TICKET-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
                    const totalPrice = selectedTicketPrice * ticketQuantity;
                    const ticketLabel = selectedTicketType === 'early' ? 'Early Bird Ticket' : 'Regular Ticket';

                    const ticketData = {
                        id: ticketId,
                        name: buyerData.name,
                        institution: buyerData.institution,
                        phone: buyerData.phone,
                        email: buyerData.email,
                        ticket_type: selectedTicketType,
                        quantity: ticketQuantity,
                        unit_price: selectedTicketPrice,
                        total_price: totalPrice,
                        payment_method: selectedPaymentMethod,
                        payment_account: selectedPaymentAccount,
                        payment_code: paymentCode,
                        payment_status: 'pending',
                        created_at: new Date().toISOString()
                    };

                    const bankIcons = {
                        'bca': '🏦',
                        'bri': '🏦',
                        'dana': '💙',
                        'shopee': '🛍️'
                    };

                    // Function to display payment confirmation
                    const showPaymentConfirmation = () => {
                        document.getElementById('payment-code-display').textContent = paymentCode;
                        document.getElementById('final-ticket-type').textContent = ticketLabel;
                        document.getElementById('final-quantity').textContent = `${ticketQuantity} tiket`;
                        document.getElementById('final-name').textContent = buyerData.name;
                        document.getElementById('bank-name-display').textContent = selectedPaymentMethod.toUpperCase();
                        document.getElementById('bank-icon-display').textContent = bankIcons[selectedPaymentMethod] || '💳';
                        document.getElementById('account-number-display').textContent = selectedPaymentAccount;
                        document.getElementById('final-total-payment').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                        showStep(4);
                    };

                    if (window.dataSdk) {
                        const result = await window.dataSdk.create(ticketData);

                        if (result.isOk) {
                            showPaymentConfirmation();
                        } else {
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'mt-4 p-4 rounded-lg text-center';
                            errorDiv.style.backgroundColor = '#ef4444';
                            errorDiv.style.color = 'white';
                            errorDiv.textContent = 'Terjadi kesalahan saat membuat tiket. Silakan coba lagi.';
                            option.closest('.rounded-2xl').appendChild(errorDiv);

                            option.disabled = false;
                            option.style.opacity = '1';

                            setTimeout(() => errorDiv.remove(), 3000);
                        }
                    } else {
                        // Fallback: Store ticket locally and proceed without SDK
                        ticketData.__backendId = ticketId;
                        allTickets.push(ticketData);

                        // Save to localStorage as backup
                        try {
                            localStorage.setItem('paskibra_tickets', JSON.stringify(allTickets));
                        } catch (e) {
                            console.log('Could not save to localStorage');
                        }

                        renderTickets();
                        showPaymentConfirmation();
                    }
                });
            });

            const donePaymentBtn = document.getElementById('done-payment-btn');
            donePaymentBtn.addEventListener('click', () => {
                ticketForm.reset();
                selectedTicketType = null;
                selectedTicketPrice = 0;
                ticketQuantity = 1;
                selectedPaymentMethod = null;
                selectedPaymentAccount = null;
                buyerData = {};

                document.getElementById('ticket-quantity-display').textContent = '1';
                document.getElementById('quantity-selector').classList.add('hidden');
                document.getElementById('continue-to-form-btn').classList.add('hidden');

                ticketOptions.forEach(opt => {
                    opt.style.borderColor = window.elementSdk?.config?.secondary_action_color || defaultConfig.secondary_action_color;
                    opt.style.opacity = '0.7';
                });

                showStep(1);

                setTimeout(() => {
                    document.getElementById('tiket').scrollIntoView({ behavior: 'smooth', block: 'end' });
                }, 500);
            });

            donePaymentBtn.style.backgroundColor = window.elementSdk?.config?.primary_action_color || defaultConfig.primary_action_color;
            donePaymentBtn.style.color = window.elementSdk?.config?.text_color || defaultConfig.text_color;

            const ticketForm = document.getElementById('ticket-form');
            ticketForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(ticketForm);
                buyerData = {
                    name: formData.get('name'),
                    institution: formData.get('institution'),
                    phone: formData.get('phone'),
                    email: formData.get('email')
                };

                const totalPrice = selectedTicketPrice * ticketQuantity;
                const ticketLabel = selectedTicketType === 'early' ? 'Early Bird Ticket' : 'Regular Ticket';

                document.getElementById('total-payment-display').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                document.getElementById('ticket-type-display').textContent = ticketLabel;
                document.getElementById('ticket-qty-display').textContent = `${ticketQuantity} tiket`;

                showStep(3);
            });

            const backToFormBtn = document.getElementById('back-to-form-btn');
            backToFormBtn.addEventListener('click', () => {
                showStep(2);
            });

            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            const allNavLinks = document.querySelectorAll('a[href^="#"]');
            allNavLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = document.querySelector(link.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                        mobileMenu.classList.add('hidden');
                    }
                });
            });

            let lastScroll = 0;
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;

                if (currentScroll > 100) {
                    navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.3)';
                } else {
                    navbar.style.boxShadow = 'none';
                }

                lastScroll = currentScroll;
            });

            const contactForm = document.getElementById('contact-form');
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(contactForm);
                const name = formData.get('name');
                const email = formData.get('email');
                const message = formData.get('message');

                const messageDiv = document.createElement('div');
                messageDiv.className = 'mt-4 p-4 rounded-lg text-center';
                messageDiv.style.backgroundColor = window.elementSdk?.config?.primary_action_color || defaultConfig.primary_action_color;
                messageDiv.style.color = window.elementSdk?.config?.text_color || defaultConfig.text_color;
                messageDiv.textContent = `Terima kasih ${name}! Pesan Anda telah diterima. Kami akan segera menghubungi Anda.`;

                contactForm.appendChild(messageDiv);
                contactForm.reset();

                setTimeout(() => {
                    messageDiv.remove();
                }, 5000);
            });

            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
    <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'9b042e5b238fe78b',t:'MTc2NjExODc5OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
</body>

</html>