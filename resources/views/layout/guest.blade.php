<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Book your dream vacation with our premium travel agency. Discover the world with exclusive deals on destinations like Paris and Maldives.">
    <title>Globeotrip | Book Your Dream Vacation</title>
    <meta name="robots" content="noindex, nofollow">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" sizes="40x40" href="/assets/images/favicon.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    
    
    <header class="navbar <?php echo isset($isInnerPage) && $isInnerPage ? 'inner-page-navbar' : ''; ?>">
        <div class="container nav-container">
            <a href="/" class="logo"><img src="/assets/images/globeotrip.png" alt="Travel Agency Logo" class="logo-img"></a>

            <nav class="nav-links">
                <div class="mobile-menu-header">
                    <img src="/assets/images/globeotrip.png" alt="Travel Agency Logo" class="mobile-logo">
                    <span class="close-menu">&times;</span>
                </div>
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/services">Services</a>
                <a href="/deals">Travel Deals</a>
                <a href="/contact">Contact</a>
            </nav>
            <div class="nav-buttons">
                <a href="tel:+1-888-354-2147"><button class="btn btn-primary">+1-888-354-2147</button></a>
            </div>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

    </header>



    <main>
        @yield('content')
    </main>

    <!-- footer -->
         <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
    </button>

    <footer id="contact" class="footer">
        <div class="container">
            <div class="row g-4 footer-grid">
                <div class="col-12 col-md-4 footer-col">
                   <a href="/"> <img src="/assets/images/globeotrip.png" alt="Travel Agency Logo" class="footer-logo"></a>
                    <p>Your premium partner for unforgettable journeys and experiences around the world.</p>
                </div>
                <div class="col-12 col-md-2 footer-col">
                    <h4>Quick Links</h4>
                    <a href="/">Home</a>
                    <a href="/services">Services</a>
                    <a href="/about">About Us</a>
                    <a href="/deals">Deals</a>
                    <a href="/service-area">Service Area</a>
                </div>
                <div class="col-12 col-md-2 footer-col">
                    <h4>Support</h4>
                    <a href="/terms">Terms of Service</a>
                    <a href="/privacy">Privacy Policy</a>
                    <a href="tel:+1-888-354-2147" class="mt-2 d-inline-block font-weight-bold text-theme-primary"><i class="fas fa-phone-alt"></i> +1-888-354-2147</a>
                </div>
                <div class="col-12 col-md-4 footer-col">
                    <h4>Newsletter</h4>
                    <p>Subscribe for updates and exclusive offers.</p>
                    <div class="newsletter d-flex gap-2">
                        <input type="email" placeholder="Your email" class="form-control">
                        <button class="btn btn-primary">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Globeotrip Agency. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>