<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= csrf_meta() ?>
    <title>Paskibraku - Pasukan Pengibar Bendera</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #0B2447; /* Dark Navy Blue */
            --secondary-color: #19376D; /* Lighter Navy */
            --accent-color: #576CBC; /* Soft Blue */
            --light-bg: #F8F9FA;
            --dark-text: #212529;
            --light-text: #FFFFFF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

        /* Navbar Transparan & Scrolled */
        .navbar-custom {
            background-color: transparent;
            transition: all 0.4s ease-in-out;
            padding: 1rem 0;
        }
        .navbar-custom.scrolled {
            background-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            padding: 0.5rem 0;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: var(--light-text);
            font-weight: 600;
        }
        .navbar-custom .nav-link {
            position: relative;
            margin: 0 0.5rem;
        }
        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--accent-color);
            transition: all 0.3s ease;
        }
        .navbar-custom .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* Hero Section Full 100vh */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--light-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding-top: 80px; /* Offset for absolute navbar */
        }
        .hero-section h1 {
            font-weight: 800;
            font-size: 4rem;
            letter-spacing: -1px;
        }
        
        /* Scroll Down Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            color: rgba(255,255,255,0.7);
            font-size: 2rem;
            text-decoration: none;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }

        /* Section Titles */
        .section-title {
            color: var(--primary-color);
            font-weight: 800;
            margin-bottom: 2.5rem;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Buttons */
        .btn-custom-primary {
            background-color: var(--accent-color);
            color: var(--light-text);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(87, 108, 188, 0.4);
        }
        .btn-custom-primary:hover {
            background-color: #4a5db3;
            color: var(--light-text);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(87, 108, 188, 0.5);
        }

        /* Clean Modern Cards (Traveloka Style) */
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            background-color: #fff;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.08);
        }

        /* Mega Footer */
        .mega-footer {
            background-color: var(--primary-color);
            color: var(--light-text);
            padding: 60px 0 20px;
            border-top: 5px solid var(--accent-color);
        }
        .footer-heading {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 10px;
        }
        .social-links a:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }
        
        .timeline { border-left: 2px solid var(--accent-color); padding-left: 20px; margin-left: 10px; }
        .timeline-item { position: relative; margin-bottom: 30px; }
        .timeline-item::before { content: ''; position: absolute; left: -29px; top: 5px; width: 16px; height: 16px; border-radius: 50%; background-color: var(--accent-color); border: 3px solid var(--light-bg); }
        
        /* Clean Ticket Boxes */
        .ticket-box {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
        }
        .ticket-box:hover {
            border-color: var(--accent-color);
            background-color: #f8faff;
            box-shadow: 0 4px 15px rgba(87, 108, 188, 0.1);
        }
        .ticket-box.selected {
            border-color: var(--accent-color);
            background-color: #f0f4ff;
            box-shadow: 0 0 0 4px rgba(87, 108, 188, 0.15);
        }
        
        /* Floating form inputs */
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(87, 108, 188, 0.2);
            border-color: var(--accent-color);
        }
    </style>
</head>
<body>