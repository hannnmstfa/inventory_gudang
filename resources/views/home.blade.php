<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistic - Smart Stays, Seamless Service</title>
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0a0f;
            color: #fff;
            overflow-x: hidden;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .accent {
            color: #f5a623;
        }

        .tag {
            display: inline-block;
            background: rgba(245, 166, 35, 0.15);
            color: #f5a623;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 20px;
            margin-bottom: 12px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(10, 10, 15, 0.94);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 18px 0;
            transition: all 0.3s ease;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .navbar-brand .logo {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .navbar-brand .logo .accent {
            color: #f5a623;
        }

        .navbar-brand .logo:hover {
            color: #f5a623;
        }

        .navbar-menu {
            display: flex;
            list-style: none;
            gap: 28px;
            align-items: center;
        }

        .navbar-menu li a {
            font-size: 15px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.78);
            transition: color 0.25s ease;
            position: relative;
            padding-bottom: 5px;
        }

        .navbar-menu li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #f5a623;
            transition: width 0.25s ease;
        }

        .navbar-menu li a:hover::after,
        .navbar-menu li a.active::after {
            width: 100%;
        }

        .navbar-menu li a:hover,
        .navbar-menu li a.active {
            color: #f5a623;
        }

        .navbar-menu li a.active {
            color: #f5a623;
        }

        /* Sign Up Button */
        .btn-signup {
            display: inline-block;
            padding: 10px 28px;
            background: linear-gradient(135deg, #f5a623, #e8961a);
            color: #0a0a0f !important;
            font-weight: 700;
            font-size: 13px;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-signup::after {
            display: none !important;
        }

        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 166, 35, 0.35);
            color: #0a0a0f !important;
        }

        /* Navbar Toggler (Mobile) */
        .navbar-toggler {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .navbar-toggler span {
            display: block;
            width: 28px;
            height: 2.5px;
            background: #fff;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .navbar-toggler.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 6px);
        }

        .navbar-toggler.active span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -6px);
        }

        /* ===== HERO / HOME ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 120px 60px 80px;
            background: linear-gradient(135deg, #0a0a0f 0%, #1a1a2e 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 166, 35, 0.08), transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            flex: 1;
            max-width: 580px;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(245, 166, 35, 0.15);
            color: #f5a623;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 64px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero h1 .highlight {
            background: linear-gradient(135deg, #f5a623, #f7c948);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 40px;
            background: linear-gradient(135deg, #f5a623, #e8961a);
            color: #0a0a0f;
            font-weight: 700;
            font-size: 15px;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(245, 166, 35, 0.35);
        }

        .hero-visual {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 32px;
            padding: 50px 40px;
            text-align: center;
            max-width: 400px;
            position: relative;
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }

        .main-card .bg-icon {
            font-size: 80px;
            opacity: 0.05;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .main-card .icon-big {
            font-size: 64px;
            margin-bottom: 16px;
        }

        .main-card .quote {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
        }

        .main-card .quote .accent {
            color: #f5a623;
        }

        .main-card .sub-quote {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 1px;
        }

        /* ===== INTRODUCE ===== */
        .introduce-section {
            padding: 80px 60px;
            background: #0f0f1a;
        }

        .introduce-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: center;
        }

        .introduce-text h2 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .introduce-text p {
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.8;
        }

        .btn-learn {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 36px;
            border: 2px solid #f5a623;
            color: #f5a623;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-learn:hover {
            background: #f5a623;
            color: #0a0a0f;
        }

        .introduce-visual {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
            backdrop-filter: blur(8px);
        }

        .introduce-visual .icon {
            font-size: 56px;
            margin-bottom: 12px;
        }

        .introduce-visual h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .introduce-visual p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        /* ===== VISION & MISSION ===== */
        .vision-section {
            padding: 80px 60px;
            background: #0a0a0f;
        }

        .vision-header,
        .facilities-header,
        .team-header,
        .service-header,
        .portfolio-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 48px;
        }

        .vision-header h2,
        .facilities-header h2,
        .team-header h2,
        .service-header h2,
        .portfolio-header h2 {
            font-size: 40px;
            font-weight: 800;
        }

        .vision-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .vision-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 40px;
            transition: all 0.3s ease;
        }

        .vision-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 166, 35, 0.3);
        }

        .vision-card .icon {
            font-size: 40px;
            margin-bottom: 12px;
        }

        .vision-card h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .vision-card p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        /* ===== FACILITIES ===== */
        .facilities-section {
            padding: 80px 60px;
            background: #0f0f1a;
        }

        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .facility-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 36px;
            transition: all 0.3s ease;
        }

        .facility-card:hover {
            border-color: rgba(245, 166, 35, 0.3);
            transform: translateY(-4px);
        }

        .facility-card .number {
            font-size: 13px;
            color: #f5a623;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .facility-card h5 {
            font-size: 20px;
            font-weight: 700;
            margin: 12px 0 8px;
        }

        .facility-card p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        /* ===== TEAM ===== */
        .team-section {
            padding: 80px 60px;
            background:
                radial-gradient(circle at 70% 10%, rgba(245, 166, 35, 0.10), transparent 30%),
                linear-gradient(135deg, #0a0a0f 0%, #15151d 100%);
        }

        .team-header {
            max-width: 760px;
        }

        .team-header .tag {
            margin-bottom: 20px;
        }

        .team-header h2 {
            font-size: 40px;
            font-weight: 800;
            line-height: 1.16;
            color: #fff;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .team-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 28px;
            padding: 38px 34px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 340px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .team-card::before {
            content: '';
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 1px solid rgba(245, 166, 35, 0.3);
            top: -70px;
            right: -18px;
        }

        .team-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 166, 35, 0.60);
            box-shadow: 0 20px 45px rgba(245, 166, 35, 0.10);
        }

        .team-card .avatar {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 38px;
            background: linear-gradient(135deg, rgba(245, 166, 35, 0.2), rgba(255,255,255,0.05));
            border: 1px solid rgba(255,255,255,0.1);
        }

        .team-card h5 {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 12px;
            line-height: 1.2;
            color: #fff;
            letter-spacing: 0.02em;
        }

        .team-card .role {
            font-size: 15px;
            color: #f5a623;
            font-weight: 700;
            margin-bottom: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .team-card p {
            color: rgba(255, 255, 255, 0.58);
            line-height: 1.8;
            font-size: 14px;
            margin-top: 6px;
        }

        .team-card .role-bar {
            width: 52px;
            height: 3px;
            background: linear-gradient(135deg, #f5a623, #ffcf73);
            border-radius: 99px;
            margin: 0 auto 16px;
        }

        /* ===== SERVICE ===== */
        .service-section {
            padding: 80px 60px;
            background: #0f0f1a;
        }

        .service-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 36px;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            border-color: rgba(245, 166, 35, 0.3);
            transform: translateY(-4px);
        }

        .service-card .number {
            font-size: 13px;
            color: #f5a623;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .service-card h5 {
            font-size: 20px;
            font-weight: 700;
            margin: 12px 0 8px;
        }

        .service-card p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        /* ===== PORTFOLIO ===== */
        .portfolio-section {
            padding: 80px 60px;
            background: #0a0a0f;
        }

        .portfolio-header p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
            margin-top: 12px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 36px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .portfolio-item:hover {
            border-color: rgba(245, 166, 35, 0.3);
            transform: translateY(-4px);
        }

        .portfolio-item .icon {
            font-size: 40px;
            margin-bottom: 8px;
        }

        .portfolio-item h5 {
            font-size: 18px;
            font-weight: 700;
        }

        .portfolio-item p {
            color: rgba(255, 255, 255, 0.4);
            font-size: 14px;
        }

        /* ===== CONTACT ===== */
        .contact-section {
            padding: 80px 60px;
            background: #0f0f1a;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: center;
        }

        .contact-info h2 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .contact-info p {
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .contact-detail {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .contact-detail .label {
            color: rgba(255, 255, 255, 0.4);
            font-weight: 600;
            font-size: 14px;
        }

        .contact-detail .value {
            color: #fff;
            font-size: 14px;
            text-align: right;
            line-height: 1.6;
        }

        .contact-visual {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
        }

        .contact-visual .icon {
            font-size: 56px;
            margin-bottom: 12px;
        }

        .contact-visual h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-visual p {
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        /* ===== THANK YOU ===== */
        .thankyou-section {
            padding: 80px 60px 100px;
            text-align: center;
            background: #0a0a0f;
            border-top: 1px solid rgba(255, 255, 255, 0.03);
        }

        .thankyou-section h2 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .thankyou-section p {
            max-width: 700px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.8;
        }

        .site-footer {
            padding: 20px 0 40px;
            text-align: center;
            background: #0a0a0f;
        }

        .site-footer .container {
            color: rgba(255, 255, 255, 0.55);
            font-size: 14px;
            letter-spacing: 0.02em;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 18px;
        }

        .site-footer .container a {
            color: #f5a623;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .hero {
                flex-direction: column;
                padding: 120px 40px 60px;
                text-align: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero h1 {
                font-size: 48px;
            }

            .introduce-grid {
                grid-template-columns: 1fr;
            }

            .facilities-grid,
            .team-grid,
            .portfolio-grid {
                grid-template-columns: 1fr 1fr;
            }

            .service-grid,
            .vision-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .navbar-toggler {
                display: flex;
            }

            .navbar-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(10, 10, 15, 0.98);
                padding: 20px 40px;
                gap: 16px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .navbar-menu.open {
                display: flex;
            }

            .navbar-menu li {
                width: 100%;
                text-align: center;
            }

            .btn-signup {
                display: inline-block;
                width: auto;
                padding: 10px 28px;
                margin-top: 4px;
            }

            .hero {
                padding: 100px 24px 40px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero-visual {
                margin-top: 40px;
            }

            .main-card {
                padding: 30px 24px;
            }

            .introduce-section,
            .vision-section,
            .facilities-section,
            .team-section,
            .service-section,
            .portfolio-section,
            .contact-section {
                padding: 60px 24px;
            }

            .introduce-text h2,
            .contact-info h2 {
                font-size: 32px;
            }

            .vision-header h2,
            .facilities-header h2,
            .team-header h2,
            .service-header h2,
            .portfolio-header h2 {
                font-size: 30px;
            }

            .facilities-grid,
            .team-grid,
            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .thankyou-section h2 {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="#home" class="logo">Gudang <span class="accent">TK. Farida</span></a>
            </div>
            <button class="navbar-toggler" id="navbarToggler" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="/dashboard" class="btn-signup">Sign Up</a></li>
            </ul>
        </div>
    </nav>

    <!-- ===== HERO / HOME ===== -->
    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-badge">Gudang Minuman TK. Farida</div>
            <h1>
                <span class="highlight">Gudang Minuman Terpercaya untuk Distribusi Cepat</span>
            </h1>
            <p class="hero-desc">
                Menyediakan penyimpanan aman, stok terkontrol, dan distribusi produk minuman yang cepat serta efisien untuk toko, minimarket, restoran, dan pelaku usaha. Kami hadir untuk memastikan setiap kebutuhan pasokan Anda selalu terpenuhi dengan kualitas terbaik.
            </p>
            <div class="hero-actions">
                <a href="#service" class="btn-primary">Explore Now</a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="main-card">
                <div class="bg-icon">🚛</div>
                <div class="icon-big">📦</div>
                <div class="quote">
                    Smart Stays, <span class="accent">Seamless</span> Service
                </div>
                <div class="sub-quote">— WARNER &amp; SPENCER logistics</div>
            </div>
        </div>
    </section>

    <!-- ===== INTRODUCE LOGISTIC ===== -->
    <section id="about" class="introduce-section">
        <div class="introduce-grid">
            <div class="introduce-text">
                <div class="tag">About Us</div>
                <h2>INTRODUCE <span class="accent">OUR</span> Gudang TK. Farida</h2>
                <p>
                     Gudang TK. Farida merupakan distributor minuman terpercaya yang berlokasi di Desa Jleper, Kecamatan Mijen, Kabupaten Demak. Dengan komitmen terhadap kualitas pelayanan, kami menyediakan solusi penyimpanan, pengelolaan stok, dan distribusi berbagai produk minuman secara cepat, aman, dan efisien. Didukung oleh sistem pengelolaan gudang yang modern dan tenaga kerja yang berpengalaman, kami memastikan setiap produk tersimpan dengan baik sehingga kualitasnya tetap terjaga hingga sampai ke tangan pelanggan. Kami melayani berbagai kebutuhan distribusi untuk toko kelontong, minimarket, supermarket, restoran, kafe, serta berbagai pelaku usaha lainnya dengan mengutamakan ketepatan waktu dan kepuasan pelanggan.
                </p>
                <p style="margin-top: 16px;">
<!-- ===== isi chat box ===== -->
 Gudang TK. Farida terus berkomitmen menjadi mitra distribusi yang dapat diandalkan melalui pelayanan yang profesional, stok yang selalu terjaga, serta proses pengiriman yang efektif dan efisien. Kepercayaan pelanggan merupakan prioritas utama kami, sehingga setiap proses operasional dilakukan dengan standar kualitas yang tinggi, mulai dari penerimaan barang, penyimpanan, hingga pendistribusian. Dengan pengalaman, dedikasi, dan semangat untuk terus berkembang, Gudang TK. Farida siap memberikan solusi terbaik bagi kebutuhan distribusi minuman di Kabupaten Demak dan wilayah sekitarnya.
                </p>
                <a href="#service" class="btn-learn">Learn More</a>
            </div>
            <div class="introduce-visual">
                <div class="icon">🚛</div>
                <h4>About Us</h4>
                <p>
                    Gudang TK. Farida adalah perusahaan distributor minuman yang berkomitmen menyediakan layanan penyimpanan, pengelolaan stok, dan distribusi produk secara profesional. Berlokasi di Desa Jleper, Kecamatan Mijen, Kabupaten Demak, kami hadir untuk memenuhi kebutuhan pasokan minuman bagi toko, minimarket, restoran, kafe, hingga berbagai pelaku usaha dengan pelayanan yang cepat, aman, dan terpercaya.

Dengan mengutamakan kualitas pelayanan, ketepatan distribusi, dan ketersediaan stok, Gudang TK. Farida terus membangun kepercayaan pelanggan melalui sistem kerja yang efisien serta didukung oleh tim yang berpengalaman. Kami percaya bahwa pelayanan terbaik dan hubungan kerja sama yang berkelanjutan merupakan kunci dalam memberikan kepuasan kepada setiap pelanggan dan menjadi mitra distribusi minuman yang terpercaya di wilayah Demak dan sekitarnya.
                </p>
            </div>
        </div>
    </section>

    <!-- ===== VISION & MISSION ===== -->
    <section class="vision-section">
        <div class="vision-header">
            <div class="tag">VISION AND MISSION</div>
            <h2>Our Vision &amp; Mission</h2>
        </div>
        <div class="vision-grid">
            <div class="vision-card">
                <div class="icon">👁️</div>
                <h4>Our Vision</h4>
                <p>
                   Menjadi perusahaan distributor minuman yang terpercaya, profesional, dan inovatif dalam memberikan layanan penyimpanan serta distribusi produk berkualitas. Kami berkomitmen untuk membangun hubungan jangka panjang dengan pelanggan melalui pelayanan terbaik, pengelolaan stok yang efisien, serta distribusi yang tepat waktu guna mendukung pertumbuhan bisnis di wilayah Demak dan sekitarnya.
                </p>
            </div>
            <div class="vision-card">
                <div class="icon">🎯</div>
                <h4>Our Mission</h4>
                <p>
                   Menyediakan berbagai produk minuman berkualitas dengan stok yang selalu terjaga.
Memberikan layanan distribusi yang cepat, aman, dan tepat waktu kepada setiap pelanggan.
Menerapkan sistem pengelolaan gudang yang modern, efektif, dan efisien untuk menjaga kualitas produk.
Membangun kerja sama yang saling menguntungkan dengan pelanggan, pemasok, dan mitra bisnis.
Terus meningkatkan kualitas pelayanan, profesionalisme, dan inovasi untuk memenuhi kebutuhan pasar serta memberikan kepuasan maksimal kepada pelanggan.
                </p>
            </div>
        </div>
    </section>

    <!-- ===== NEW FACILITIES ===== -->
    <section class="facilities-section">
        <div class="facilities-header">
            <div class="tag">OUR NEW FACILITIES</div>
            <h2>Our New Facilities</h2>
        </div>
        <div class="facilities-grid">
            <div class="facility-card">
                <span class="number">01. Warehouse Storage</span>
                <h5>Facilities</h5>
                <p>
                    Gudang penyimpanan yang luas, bersih, dan tertata rapi untuk menjaga kualitas berbagai produk minuman. Setiap produk disimpan sesuai standar agar tetap aman, higienis, dan mudah dikelola selama proses distribusi.
                </p>
            </div>
            <div class="facility-card">
                <span class="number">02. Inventory Management</span>
                <h5>Facilities</h5>
                <p>
                    Didukung sistem pengelolaan stok yang terstruktur untuk memantau ketersediaan barang secara akurat. Proses pencatatan barang masuk dan keluar dilakukan secara efisien sehingga meminimalkan kesalahan dan memastikan stok selalu terkontrol.
                </p>
            </div>
            <div class="facility-card">
                <span class="number">03. Distribution Service</span>
                <h5>Facilities</h5>
                <p>
                    Layanan distribusi yang cepat, aman, dan tepat waktu dengan armada yang siap mengantarkan produk kepada pelanggan. Kami berkomitmen memberikan pelayanan terbaik agar kebutuhan pasokan minuman dapat terpenuhi secara optimal..
                </p>
            </div>
        </div>
    </section>

    <!-- ===== BEST TEAM ===== -->
    <section class="team-section">
        <div class="team-header">
            <div class="tag">MEET OUR BEST TEAM</div>
            <h2>Meet Our Best Team</h2>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="avatar">👤</div>
                <div class="role-bar"></div>
                <h5>MOHAMMAD QOMARUZZAMAN</h5>
                <div class="role">CEO &amp; Founder</div>
                <p>
                    Menyusun arah bisnis, mengawasi operasional gudang, dan menjaga hubungan baik dengan pelanggan serta mitra usaha.
                </p>
            </div>
            <div class="team-card">
                <div class="avatar">👤</div>
                <div class="role-bar"></div>
                <h5>yazid alwani</h5>
                <div class="role">Web Developer</div>
                <p>
                    Membangun, mengelola, dan merawat website Gudang TK. Farida agar sistem informasi dan pelayanan digital berjalan dengan optimal.
                </p>
            </div>
        </div>
    </section>

    <!-- ===== BEST SERVICE ===== -->
    <section id="service" class="service-section">
        <div class="service-header">
            <div class="tag">OUR BEST SERVICE</div>
            <h2>Our Best Service</h2>
        </div>
        <div class="service-grid">
            <div class="service-card">
                <span class="number">01. Warehouse Management</span>
                <h5>Service</h5>
                <p>
                    Kami menyediakan layanan pengelolaan gudang yang profesional dengan sistem penyimpanan yang tertata rapi dan terorganisir. Setiap produk minuman dikelola dengan baik untuk menjaga kualitas, memudahkan proses pencarian stok, serta memastikan ketersediaan barang selalu terpantau secara akurat.
                </p>
            </div>
            <div class="service-card">
                <span class="number">02. Service</span>
                <h5>Service</h5>
                <p>
                    Gudang TK. Farida memberikan layanan distribusi yang cepat, aman, dan tepat waktu kepada pelanggan. Didukung oleh tim yang berpengalaman, kami memastikan setiap pesanan diproses secara efisien sehingga produk sampai ke tujuan dalam kondisi terbaik dan sesuai dengan kebutuhan pelanggan.
                </p>
            </div>
        </div>
    </section>

    <!-- ===== PORTFOLIO ===== -->
    <section id="portfolio" class="portfolio-section">
        <div class="portfolio-header">
            <div class="tag">OUR BEST PORTFOLIO</div>
            <h2>Our Best Portfolio</h2>
            <p>
                Gudang TK. Farida telah dipercaya sebagai mitra distribusi minuman bagi berbagai toko, minimarket, warung, restoran, dan pelaku usaha di wilayah Demak dan sekitarnya. Dengan pengalaman dalam pengelolaan stok serta distribusi yang profesional, kami terus berkomitmen memberikan pelayanan terbaik melalui proses kerja yang cepat, aman, dan efisien.
            </p>
        </div>
        <div class="portfolio-grid">
            <div class="portfolio-item">
                <div class="icon">📋</div>
                <h5>Project 01</h5>
                <p>Logistic Solutions</p>
            </div>
            <div class="portfolio-item">
                <div class="icon">📋</div>
                <h5>Project 02</h5>
                <p>Supply Chain</p>
            </div>
            <div class="portfolio-item">
                <div class="icon">📋</div>
                <h5>Project 03</h5>
                <p>Warehouse Management</p>
            </div>
        </div>
    </section>

    <!-- ===== GET IN TOUCH ===== -->
    <section id="contact" class="contact-section">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>GET IN <span class="accent">TOUCH</span></h2>
                <p>
                    Kami siap membantu memenuhi kebutuhan distribusi minuman Anda dengan pelayanan yang cepat, ramah, dan profesional. Jangan ragu untuk menghubungi Gudang TK. Farida apabila Anda memerlukan informasi mengenai produk, pemesanan, kerja sama, maupun layanan distribusi. Tim kami akan memberikan solusi terbaik untuk memastikan kebutuhan bisnis Anda terpenuhi dengan pelayanan yang berkualitas.

                    Kami percaya bahwa komunikasi yang baik merupakan awal dari kerja sama yang sukses. Oleh karena itu, Gudang TK. Farida selalu siap memberikan respon yang cepat, informasi yang jelas, serta pelayanan terbaik demi membangun hubungan jangka panjang dengan setiap pelanggan dan mitra bisnis.
                </p>
                <div class="contact-detail">
                    <span class="label">Phone</span>
                    <span class="value">+62 821-3518-1255</span>
                </div>
                <div class="contact-detail">
                    <span class="label">Website</span>
                    <span class="value"><a href="https://inventory.hanstd.com" target="_blank" rel="noopener noreferrer">https://inventory.hanstd.com</a></span>
                </div>
            </div>
            <div class="contact-visual">
                <div class="icon">📞</div>
                <h4>Get In Touch</h4>
                <p>
                    Kami siap membantu kebutuhan distribusi minuman Anda dengan layanan yang cepat, aman, dan terpercaya. Hubungi Gudang TK. Farida untuk informasi produk, pemesanan, maupun kerja sama bisnis.
                </p>
            </div>
        </div>
    </section>

    <!-- ===== THANK YOU ===== -->
    <section class="thankyou-section">
        <h2>THANK <span class="accent">YOU</span></h2>
        <p>
            Terima kasih telah mengunjungi website Gudang TK. Farida. Kami menghargai kepercayaan Anda dan siap menjadi mitra terpercaya dalam penyediaan serta distribusi berbagai produk minuman. Kepuasan pelanggan adalah prioritas utama kami, dan kami berkomitmen untuk terus memberikan pelayanan terbaik.
        </p>
    </section>

    <footer class="site-footer">
        <div class="container">
            Website Designed & Developed by <span class="accent">Yazid alwani</span>
        </div>
    </footer>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // Navbar Toggler
        const toggler = document.getElementById('navbarToggler');
        const menu = document.getElementById('navbarMenu');

        toggler.addEventListener('click', function() {
            this.classList.toggle('active');
            menu.classList.toggle('open');
        });

        // Close menu when clicking a link (mobile)
        document.querySelectorAll('.navbar-menu a').forEach(link => {
            link.addEventListener('click', function() {
                toggler.classList.remove('active');
                menu.classList.remove('open');
            });
        });

        // Navbar scroll effect & active link
        const navbar = document.getElementById('navbar');
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.navbar-menu a:not(.btn-signup)');

        window.addEventListener('scroll', function() {
            // Navbar background
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(10, 10, 15, 0.95)';
            } else {
                navbar.style.background = 'rgba(10, 10, 15, 0.92)';
            }

            // Active link
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>
</html>