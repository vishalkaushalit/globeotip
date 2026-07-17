<x-guest-layout>

    <!-- About Us Banner -->
    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>About Us</h1>
            <p>Discover our journey, our mission, and why travelers love us.</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="about-story-section py-5 bg-white overflow-hidden">
        <div class="container py-md-5">
            <div class="row g-5 align-items-center">

                <!-- Left Column: Image with floating animation -->
                <div class="col-12 col-lg-6 position-relative">
                    <div class="about-img-wrapper fade-up-1">
                        <img src="/assets/images/about_img.png" alt="Travel Journey"
                            class="img-fluid rounded-4 shadow-lg float-anim"
                            style="object-fit: cover; width: 100%; height: auto; max-height: 500px;">
                        <!-- Decorative element -->
                        <div
                            class="about-decorative-box bg-theme-primary text-white p-4 rounded-3 shadow-lg position-absolute bottom-0 end-0 translate-middle-y me-n4 d-none d-lg-block">
                            <h3 class="fw-bold mb-0">15+</h3>
                            <p class="mb-0 small text-uppercase fw-semibold">Years Experience</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Text Content -->
                <div class="col-12 col-lg-6">
                    <div class="about-text-wrapper ps-lg-4 slide-in-right">
                        <span class="text-theme-primary fw-bold text-uppercase tracking-wide mb-2 d-block">Our
                            Story</span>
                        <h2 class="fw-bold text-theme-dark mb-4 display-6">Making Your Travel Dreams a Reality</h2>
                        <p class="text-theme-muted mb-4 fs-5" style="line-height: 1.8;">
                            Globeotrip was founded with a simple yet powerful vision: to make world-class travel
                            experiences accessible, seamless, and deeply memorable for everyone.
                        </p>
                        <p class="text-theme-muted mb-4" style="line-height: 1.8;">
                            Over the years, we've grown from a small passionate team into a leading travel agency,
                            partnering with the world's best airlines, luxury hotels, and expert local guides. We
                            believe that travel is more than just visiting a place—it's about connecting with new
                            cultures, discovering breathtaking landscapes, and creating stories that last a lifetime.
                        </p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex align-items-center mb-3 text-theme-dark fw-semibold">
                                <span class="bg-theme-primary-light text-theme-primary rounded-circle p-2 me-3"><svg
                                        width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg></span> Personalized Itineraries
                            </li>
                            <li class="d-flex align-items-center mb-3 text-theme-dark fw-semibold">
                                <span class="bg-theme-primary-light text-theme-primary rounded-circle p-2 me-3"><svg
                                        width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg></span> 24/7 Customer Support
                            </li>
                            <li class="d-flex align-items-center text-theme-dark fw-semibold">
                                <span class="bg-theme-primary-light text-theme-primary rounded-circle p-2 me-3"><svg
                                        width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg></span> Best Price Guarantee
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="about-stats-section py-5 text-white position-relative"
        style="background: linear-gradient(135deg, var(--dark-bg), #1a252f);">
        <div class="container py-4">
            <div class="row g-4 text-center justify-content-center">
                <div class="col-6 col-md-3 fade-up-1">
                    <h2 class="display-4 fw-bold text-theme-primary mb-2"><span class="counter-val"
                            data-target="15">0</span>k+</h2>
                    <p class="mb-0 text-uppercase tracking-wide small">Happy Travelers</p>
                </div>
                <div class="col-6 col-md-3 fade-up-2">
                    <h2 class="display-4 fw-bold text-theme-primary mb-2"><span class="counter-val"
                            data-target="50">0</span>+</h2>
                    <p class="mb-0 text-uppercase tracking-wide small">Destinations</p>
                </div>
                <div class="col-6 col-md-3 fade-up-3">
                    <h2 class="display-4 fw-bold text-theme-primary mb-2"><span class="counter-val"
                            data-target="300">0</span>+</h2>
                    <p class="mb-0 text-uppercase tracking-wide small">Tour Packages</p>
                </div>
                <div class="col-6 col-md-3 fade-up-4">
                    <h2 class="display-4 fw-bold text-theme-primary mb-2"><span class="counter-val" data-target="4.9"
                            data-decimal="true">4.2</span></h2>
                    <p class="mb-0 text-uppercase tracking-wide small">Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter-val');
            const speed = 100;

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = +counter.getAttribute('data-target');
                        const isDecimal = counter.getAttribute('data-decimal') === 'true';

                        const updateCount = () => {
                            const current = +counter.innerText;
                            const increment = target / speed;

                            if (current < target) {
                                if (isDecimal) {
                                    counter.innerText = (current + increment).toFixed(1);
                                } else {
                                    counter.innerText = Math.ceil(current + increment);
                                }
                                setTimeout(updateCount, 20);
                            } else {
                                counter.innerText = target;
                            }
                        };

                        updateCount();
                        observer.unobserve(counter);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>

    <!-- Why Choose Us Visual Grid -->
    <section class="why-choose-section py-5 bg-theme-light">
        <div class="container py-md-5">
            <div class="text-center mb-5 fade-up-1">
                <span class="text-theme-primary fw-bold text-uppercase tracking-wide mb-2 d-block">Why Travel With
                    Us</span>
                <h2 class="fw-bold text-theme-dark display-6">Experience the Extraordinary</h2>
            </div>

            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-4 fade-up-2">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden feature-hover-card">
                        <img src="/assets/images/dest_paris.png" alt="Expert Guides" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4 text-center bg-white position-relative">
                            <div class="feature-icon-float bg-theme-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg mx-auto mb-3"
                                style="width: 60px; height: 60px; margin-top: -40px; font-size: 1.5rem;">
                                🗺️
                            </div>
                            <h4 class="fw-bold text-theme-dark mb-3">Expert Local Guides</h4>
                            <p class="text-theme-muted mb-0">Our passionate guides are locals who know the hidden gems
                                and secret spots that make every destination truly special.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 fade-up-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden feature-hover-card">
                        <img src="/assets/images/dest_maldives.png" alt="Luxury Stays" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4 text-center bg-white position-relative">
                            <div class="feature-icon-float bg-theme-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg mx-auto mb-3"
                                style="width: 60px; height: 60px; margin-top: -40px; font-size: 1.5rem;">
                                🏨
                            </div>
                            <h4 class="fw-bold text-theme-dark mb-3">Handpicked Luxury</h4>
                            <p class="text-theme-muted mb-0">We partner with the world's finest resorts and boutique
                                hotels to ensure your stay is as breathtaking as the journey.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 fade-up-4 mx-auto">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden feature-hover-card">
                        <img src="/assets/images/contact_img.png" alt="Seamless Planning" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4 text-center bg-white position-relative">
                            <div class="feature-icon-float bg-theme-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg mx-auto mb-3"
                                style="width: 60px; height: 60px; margin-top: -40px; font-size: 1.5rem;">
                                ✈️
                            </div>
                            <h4 class="fw-bold text-theme-dark mb-3">Seamless Planning</h4>
                            <p class="text-theme-muted mb-0">From booking flights to arranging transfers, we handle
                                every detail so you can simply relax and enjoy the vacation.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-guest-layout>
