<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Yayasan Astagina Adi Cahya')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
        }

        /* Navigation */
        .navbar {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-top: 3px solid #2196F3;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            padding: 10px 0;
            transition: transform 0.3s;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
            margin: 0;
        }

        .nav-menu li {
            margin: 0;
        }

        .nav-menu a {
            color: #fff;
            text-decoration: none;
            padding: 1.2rem 1.8rem;
            display: block;
            transition: all 0.3s;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 0.5px;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: #2196F3;
            transition: width 0.3s;
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 80%;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background: rgba(255, 255, 255, 0.1);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #fff;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 3px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        .main-content {
            margin-top: 63px;
            min-height: calc(100vh - 183px);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
            color: #fff;
            padding: 3rem 0 1.5rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #64B5F6;
        }

        .footer-section p, .footer-section a {
            color: rgba(255,255,255,0.8);
            line-height: 1.8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: #64B5F6;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #64B5F6;
            transform: translateY(-3px);
        }

        .footer-bottom {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem 2rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: rgba(255,255,255,0.6);
        }

        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 63px;
                flex-direction: column;
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
                width: 100%;
                transition: 0.3s;
                padding: 0;
                box-shadow: 0 5px 10px rgba(0,0,0,0.2);
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu li {
                width: 100%;
            }

            .nav-menu a {
                padding: 1rem;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }

            .nav-menu a::after {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #2196F3;
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.4);
            transition: all 0.3s;
            z-index: 999;
        }

        .scroll-top:hover {
            background: #1976D2;
            transform: translateY(-5px);
        }

        .scroll-top.show {
            display: flex;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Astagina Adi Cahya">
                </a>
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('programs.index') }}" class="{{ request()->routeIs('programs.*') ? 'active' : '' }}">Program</a></li>
                <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}">Galeri</a></li>
                <li><a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">Kontak</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Yayasan Astagina Adi Cahya</h3>
                <p>Membantu anak-anak yang memerlukan perhatian khusus untuk mendapatkan kehidupan yang lebih layak melalui pendidikan dan keterampilan.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('programs.index') }}">Program</a>
                <a href="{{ route('news.index') }}">Berita</a>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Merah Delima No 27, Malang</p>
                <p><i class="fas fa-phone"></i> 0341-234567</p>
                <p><i class="fas fa-envelope"></i> info@astagina.ac.id</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Yayasan Astagina Adi Cahya. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scroll to top button -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const hamburger = document.getElementById('hamburger');
            const navMenu = document.getElementById('navMenu');

            if (hamburger) {
                hamburger.addEventListener('click', () => {
                    navMenu.classList.toggle('active');
                    hamburger.classList.toggle('active');
                });

                // Close menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                    }
                });

                // Close menu when clicking on a link
                navMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                    });
                });
            }

            // Scroll to top button
            const scrollTop = document.getElementById('scrollTop');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    scrollTop.classList.add('show');
                } else {
                    scrollTop.classList.remove('show');
                }
            });

            scrollTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
