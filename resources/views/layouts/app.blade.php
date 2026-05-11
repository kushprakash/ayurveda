<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayurveda Health Research Center')</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Ayurveda Health Research Center">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    
                    <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About us</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('career') ? 'active' : '' }}" href="{{ url('/career') }}">Career</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('location') ? 'active' : '' }}" href="{{ url('/location') }}">Contact</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ url('/booking') }}" class="btn btn-primary">Login / SignUp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-4" style="height: 60px; filter: brightness(0) invert(1);">
                    <p class="mb-4">Premium Ayurvedic solutions for modern health challenges. Rooted in tradition, proven by science.</p>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h5>Quick Links</h5>
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/shop') }}">Shop Remedies</a>
                    <a href="{{ url('/consultation') }}">Consult Doctors</a>
                    <a href="{{ url('/about') }}">About Us</a>
                    <a href="{{ url('/blog') }}">Blog</a>
                </div>
                <div class="col-6 col-lg-2">
                    <h5>Legal</h5>
                    <a href="{{ url('/privacy') }}">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Shipping Policy</a>
                    <a href="#">Refund Policy</a>
                </div>
                <div class="col-lg-4">
                    <h5>Contact Us</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Rishikul, Opposit Sanskrit School, Haridwar - 249410</p>
                    <p class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i> info@ayurvedahealth.com</p>
                    <p class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i> +91 98765 43210</p>
                </div>
            </div>
            <hr class="my-5 opacity-10">
            <div class="text-center">
                <p class="mb-0">&copy; 2026 Ayurveda Health Research Center. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true, easing: 'ease-in-out' });
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('shadow-sm');
                document.querySelector('.navbar').style.padding = '10px 0';
            } else {
                document.querySelector('.navbar').classList.remove('shadow-sm');
                document.querySelector('.navbar').style.padding = '20px 0';
            }
        });
    </script>
</body>
</html>
