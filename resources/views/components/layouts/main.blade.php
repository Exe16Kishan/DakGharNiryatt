<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Dak Ghar Niryat Kendra</title>
    
    {{-- Meta Tags --}}
    <meta name="title" content="Dak Ghar Niryat Kendra">
    <meta name="description" content="Official portal for Dak Ghar Niryat Kendra - Facilitating exports through India Post">
    <meta name="keywords" content="Dak Ghar, Niryat Kendra, India Post, Exports, Postal Services">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Jacob Prunkl">
    <meta name="theme-color" content="#208336">
    
    {{-- Favicons --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicons/16x16.png') }}" sizes="16x16" />
    
    {{-- Bootstrap 5.2.1 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    {{-- Bunny Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:300,400,500,600,700|poppins:400,500,600,700" rel="stylesheet" />
    
    {{-- FontAwesome 6.4.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    {{-- AOS Animation Library --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    {{-- Livewire CSS --}}
    <livewire:styles />
    
    {{-- Custom CSS --}}
    <style>
    :root {
    --primary: #208336;
    --primary-dark: #176a29;
    --primary-light: #2ba045;
    --secondary: #ff9933;
    --accent: #138808;
    --light: #f8f9fa;
    --dark: #212529;
    --white: #ffffff;
    --gray-100: #f8f9fa;
    --gray-200: #e9ecef;
    --gray-300: #dee2e6;
    --gray-400: #ced4da;
    --gray-500: #adb5bd;
    --gray-600: #6c757d;
    --gray-700: #495057;
    --gray-800: #343a40;
    --gray-900: #212529;
    --blue: #1e40af;
}

body {
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    background-color: #f9f9fd;
    overflow-x: hidden;
    line-height: 1.6;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    margin-bottom: 1.25rem;
    line-height: 1.3;
}

/* Improved Container Spacing */
.container {
    padding-left: 2rem;
    padding-right: 2rem;
}

/* Navbar Styles */
.navbar {
    padding: 1rem 0;
    transition: all 0.4s ease;
    background-color: rgba(255, 255, 255, 0.98) !important;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
    height: 80px;
}

.navbar-brand {
    padding: 0;
}

.navbar-brand img {
    transition: all 0.3s ease;
    height: 50px;
    width: auto;
}

.navbar-nav {
    margin-left: 2rem;
}

.navbar-nav .nav-item {
    padding: 0 0.85rem;
}

.navbar-nav .nav-link {
    color: var(--gray-700);
    font-weight: 600;
    position: relative;
    transition: all 0.3s ease;
    font-size: 1rem;
    padding: 0.75rem 0.5rem !important;
    letter-spacing: 0.01em;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: var(--primary);
}

.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background-color: var(--primary);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover::after,
.navbar-nav .nav-link.active::after {
    width: 70%;
}

.navbar .btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
    padding: 0.65rem 1.75rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    letter-spacing: 0.03em;
}

.navbar .btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(32, 131, 54, 0.25);
}

/* Hero Section */
.hero-section {
    padding: 180px 0 120px;
    position: relative;
    background-color: var(--white);
    overflow: hidden;
    min-height: 90vh;
    display: flex;
    align-items: center;
}

.hero-section::before {
    content: '';
    position: absolute;
    width: 200%;
    height: 200%;
    top: -50%;
    left: -10%;
    z-index: 0;
    background: linear-gradient(135deg, rgba(32, 131, 54, 0.05) 0%, rgba(19, 136, 8, 0.1) 100%);
    transform: rotate(-5deg);
}

.hero-section::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100px;
    bottom: -50px;
    left: 0;
    background-color: #fafafa;
    transform: skewY(-3deg);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    margin-bottom: 3rem;
}

.hero-title {
    font-size: 3.75rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 1.75rem;
    line-height: 1.2;
    animation: fadeInUp 1s ease;
}

.hero-subtitle {
    font-size: 1.35rem;
    color: var(--gray-600);
    margin-bottom: 3rem;
    max-width: 90%;
    line-height: 1.6;
    animation: fadeInUp 1.2s ease;
}

.hero-cta {
    display: flex;
    gap: 1.25rem;
    animation: fadeInUp 1.4s ease;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
    padding: 0.85rem 2.25rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 5px 15px rgba(32, 131, 54, 0.2);
    position: relative;
    overflow: hidden;
    letter-spacing: 0.03em;
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(32, 131, 54, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
    box-shadow: 0 3px 10px rgba(32, 131, 54, 0.2);
}

.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
    padding: 0.85rem 2.25rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.4s ease;
    letter-spacing: 0.03em;
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    color: var(--white);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(32, 131, 54, 0.2);
}

.btn-outline-primary:active {
    transform: translateY(0);
    box-shadow: 0 3px 10px rgba(32, 131, 54, 0.1);
}

/* Features Section */
.features-section {
    padding: 120px 0;
    background-color: #fafafa;
    position: relative;
    z-index: 2;
}

.section-title {
    font-size: 2.75rem;
    font-weight: 700;
    margin-bottom: 3rem;
    text-align: center;
    position: relative;
    padding-bottom: 1.5rem;
}

.section-title:after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: var(--primary);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
}

.feature-card {
    padding: 2.5rem;
    border-radius: 16px;
    background-color: var(--white);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
    transition: all 0.4s ease;
    height: 100%;
    border: 1px solid rgba(0, 0, 0, 0.03);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin-bottom: 30px;
}

.feature-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
    border-color: rgba(32, 131, 54, 0.1);
}

.feature-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background-color: rgba(32, 131, 54, 0.1);
    color: var(--primary);
    font-size: 2rem;
    border-radius: 50%;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    background-color: var(--primary);
    color: var(--white);
    transform: scale(1.1);
}

.feature-title {
    font-size: 1.5rem;
    margin-bottom: 1.25rem;
    color: var(--gray-800);
    transition: all 0.3s ease;
}

.feature-card:hover .feature-title {
    color: var(--primary);
}

.feature-description {
    color: var(--gray-600);
    margin-bottom: 0;
    font-size: 1.05rem;
    line-height: 1.6;
}

/* Footer */
.footer {
    background-color: var(--gray-800);
    color: var(--gray-300);
    padding: 100px 0 40px;
    position: relative;
    margin-top: 6rem;
}

.footer::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100px;
    top: -50px;
    left: 0;
    background-color: var(--gray-800);
    transform: skewY(-3deg);
    z-index: 0;
}

.footer .container {
    position: relative;
    z-index: 1;
}

.footer-logo {
    margin-bottom: 2rem;
    display: block;
}

.footer-logo img {
    width: 180px;
    filter: brightness(0) invert(1);
    transition: all 0.3s ease;
}

.footer-logo:hover img {
    transform: scale(1.05);
}

.footer-description {
    color: var(--gray-400);
    margin-bottom: 2.5rem;
    max-width: 320px;
    font-size: 1.05rem;
    line-height: 1.6;
}

.footer-heading {
    font-size: 1.35rem;
    color: var(--white);
    margin-bottom: 1.75rem;
    font-weight: 600;
    position: relative;
    padding-bottom: 0.75rem;
}

.footer-heading::after {
    content: '';
    position: absolute;
    width: 40px;
    height: 3px;
    background: var(--primary);
    bottom: 0;
    left: 0;
    border-radius: 10px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 1rem;
}

.footer-links a {
    color: var(--gray-400);
    text-decoration: none;
    transition: all 0.3s ease;
    display: block;
    font-size: 1.05rem;
}

.footer-links a:hover {
    color: var(--white);
    transform: translateX(8px);
}

.footer-links a i {
    margin-right: 10px;
    font-size: 0.8rem;
    color: var(--primary);
    transition: all 0.3s ease;
}

.footer-links a:hover i {
    transform: translateX(3px);
}

.footer-contact-info {
    color: var(--gray-400);
    margin-bottom: 1.25rem;
    display: flex;
    align-items: flex-start;
    font-size: 1.05rem;
}

.footer-contact-info i {
    width: 20px;
    margin-right: 15px;
    color: var(--primary);
    font-size: 1.1rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--white);
    transition: all 0.4s ease;
    font-size: 1.1rem;
}

.social-links a:hover {
    background-color: var(--primary);
    transform: translateY(-6px) rotate(8deg);
    box-shadow: 0 10px 20px rgba(32, 131, 54, 0.2);
}

.footer-bottom {
    padding-top: 40px;
    margin-top: 60px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
    color: var(--gray-500);
    font-size: 0.95rem;
}

.footer-bottom a {
    color: var(--primary-light);
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer-bottom a:hover {
    color: var(--white);
}

/* Animation Classes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.8s ease;
}

/* Responsive Improvements */
@media (max-width: 1199.98px) {
    .hero-section {
        padding: 160px 0 100px;
        min-height: 85vh;
    }
    
    .hero-title {
        font-size: 3.25rem;
    }
    
    .features-section {
        padding: 100px 0;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 991.98px) {
    .navbar {
        padding: 0.85rem 0;
        height: 70px;
    }
    
    .hero-section {
        padding: 140px 0 80px;
        min-height: 80vh;
    }
    
    .hero-title {
        font-size: 2.85rem;
        margin-bottom: 1.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        max-width: 100%;
        margin-bottom: 2.5rem;
    }
    
    .section-title {
        font-size: 2.25rem;
        margin-bottom: 2.5rem;
    }
    
    .features-section {
        padding: 90px 0;
    }
    
    .feature-card {
        padding: 2rem;
    }

    .footer {
        padding: 90px 0 40px;
    }
}

@media (max-width: 767.98px) {
    .navbar {
        height: auto;
    }
    
    .navbar-collapse {
        background-color: var(--white);
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: 1rem;
    }
    
    .navbar-nav .nav-link::after {
        left: 0;
        transform: none;
    }
    
    .navbar-nav .nav-link:hover::after, 
    .navbar-nav .nav-link.active::after {
        width: 30px;
    }
    
    .hero-section {
        padding: 120px 0 60px;
        text-align: center;
        min-height: auto;
    }
    
    .hero-title {
        font-size: 2.4rem;
    }
    
    .hero-subtitle {
        margin-left: auto;
        margin-right: auto;
        font-size: 1.1rem;
    }
    
    .hero-cta {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .features-section {
        padding: 70px 0;
    }
    
    .feature-card {
        padding: 1.75rem;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .footer {
        padding: 80px 0 30px;
        text-align: center;
    }
    
    .footer-widget {
        margin-bottom: 2.5rem;
    }
    
    .footer-description {
        margin-left: auto;
        margin-right: auto;
    }
    
    .footer-heading::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .footer-contact-info {
        justify-content: center;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .footer-links a:hover {
        transform: none;
    }
}

@media (max-width: 575.98px) {
    .container {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
    
    .hero-section {
        padding: 100px 0 50px;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 1.25rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
        margin-bottom: 2rem;
    }
    
    .btn-primary, 
    .btn-outline-primary {
        padding: 0.75rem 1.75rem;
        font-size: 0.95rem;
    }
    
    .section-title {
        font-size: 1.75rem;
        margin-bottom: 2rem;
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
    }
    
    .feature-title {
        font-size: 1.3rem;
    }
    
    .feature-description {
        font-size: 1rem;
    }
}
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/dakghar.png') }}" width="150" alt="Dak Ghar Niryat Kendra Logo">
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- {{-- Main Content --}} -->
    <main>
        {{ $slot }}
    </main>
    
    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <a href="#" class="footer-logo">
                        <img src="{{ asset('img/dakghar.png') }}" width="150" alt="Dak Ghar Niryat Kendra">
                    </a>
                    <p class="footer-description">
                        Facilitating exports through the extensive network of India Post, making international shipping accessible to all.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 footer-widget">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-angle-right"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Services</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Track Package</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> FAQs</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-widget">
                    <h3 class="footer-heading">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-angle-right"></i> International Shipping</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Customs Clearance</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Export Documentation</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Packaging Solutions</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i> Advisory Services</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 footer-widget">
                    <h3 class="footer-heading">Contact Us</h3>
                    <div class="footer-contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>Department of Posts, Dak Bhawan, Sansad Marg, New Delhi - 110001</div>
                    </div>
                    <div class="footer-contact-info">
                        <i class="fas fa-phone"></i>
                        <div>+91 11 2309 6055</div>
                    </div>
                    <div class="footer-contact-info">
                        <i class="fas fa-envelope"></i>
                        <div>info@dakgharniryatkendra.gov.in</div>
                    </div>
                    <div class="footer-contact-info">
                        <i class="fas fa-clock"></i>
                        <div>Monday - Friday: 9:00 AM - 5:30 PM</div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2025 Dak Ghar Niryat Kendra. All rights reserved. | Designed by <a href="#" class="text-white">Jacob Prunkl</a></p>
            </div>
        </div>
    </footer>
    
    {{-- Bootstrap 5.2.1 JS w/ Popper.js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    
    {{-- AOS Animation Library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
    
    {{-- Livewire JS --}}
    <livewire:scripts />
</body>
</html>