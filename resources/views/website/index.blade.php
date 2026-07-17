<x-guest-layout>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1 class="hero-title">Discover the World with <span>Globeotrip</span></h1>
            <p class="hero-subtitle">Experience unforgettable journeys tailored just for you. Book your next adventure
                today.</p>

            <!-- Booking Widget -->
            <div class="booking-widget-wrapper">
                <!-- Tab Menu -->
                <div class="booking-tabs">
                    <button type="button" class="tab-btn active" data-target="form-flights">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.2-1.1.7l-1.2 3.6c-.1.4.1.9.5 1.1L8 14.5l-3.5 3.5-2.6-.9c-.3-.1-.7 0-.9.2L.2 18.2c-.3.3-.2.8.2.9l5.6 1.8 1.8 5.6c.1.4.6.5.9.2l1-1c.2-.2.3-.6.2-.9l-.9-2.6 3.5-3.5 2.9 5c.2.4.7.6 1.1.5l3.6-1.2c.5-.2.8-.6.7-1.1z" />
                        </svg>
                        <span>Flights</span>
                    </button>
                    <button type="button" class="tab-btn" data-target="form-packages">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 10V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v5" />
                            <path d="M21 16V10a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6" />
                            <path d="M3 14h18" />
                            <path d="M12 14v7" />
                            <path d="M16 21H8" />
                        </svg>
                        <span>Packages</span>
                    </button>
                    <button type="button" class="tab-btn" data-target="form-hotels">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        <span>Hotels</span>
                    </button>
                    <button type="button" class="tab-btn" data-target="form-cars">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9L3 10c0 0-2.7.6-4.5 1.1C-.3 11.3-1 12.1-1 13v3c0 .6.4 1 1 1h2" />
                            <circle cx="7" cy="17" r="2" />
                            <circle cx="17" cy="17" r="2" />
                        </svg>
                        <span>Cars</span>
                    </button>
                </div>

                <!-- Main Widget Container -->
                <div class="booking-widget-content">
                    <!-- Top Options -->
                    <div class="booking-options">
                        <select class="option-select">
                            <option>Round-trip</option>
                            <option>One-way</option>
                        </select>
                        <select class="option-select">
                            <option>1 Traveler</option>
                            <option>2 Travelers</option>
                        </select>
                        <select class="option-select">
                            <option>Coach</option>
                            <option>Business</option>
                            <option>First</option>
                        </select>
                    </div>

                    <!-- Flights Form -->
                    <form id="form-flights" class="tab-content active" action="#" method="POST">
                        <div class="form-row-horizontal">
                            <div class="input-field border-right">
                                <label class="input-label">From</label>
                                <input type="text" name="origin" placeholder="e.g. DEL" required>
                            </div>

                            <div class="swap-icon-container">
                                <button type="button" class="swap-icon" title="Swap Origin and Destination">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <polyline points="16 3 21 3 21 8" />
                                        <line x1="4" y1="14" x2="21" y2="3" />
                                        <polyline points="8 21 3 21 3 16" />
                                        <line x1="20" y1="10" x2="3" y2="21" />
                                    </svg>
                                </button>
                            </div>

                            <div class="input-field border-right pad-left">
                                <label class="input-label">To</label>
                                <input type="text" name="destination" placeholder="Anywhere" required>
                            </div>

                            <div class="input-field border-right">
                                <label class="input-label">Depart</label>
                                <input type="date" name="depart_date" required>
                            </div>

                            <div class="input-field">
                                <label class="input-label">Return</label>
                                <input type="date" name="return_date">
                            </div>

                            <button type="submit" class="btn btn-primary btn-submit-inquiry">Submit Inquiry</button>
                        </div>
                        <!-- Checkboxes bottom -->
                        <div class="booking-bottom-options">
                            <span class="bundle-save">Bundle & Save</span>
                            <label><input type="checkbox"> Add Hotel</label>
                            <label><input type="checkbox"> Add Car</label>
                        </div>
                    </form>

                    <!-- Hotels Form -->
                    <form id="form-hotels" class="tab-content" action="#" method="POST"
                        style="display: none;">
                        <div class="form-row-horizontal">
                            <div class="input-field border-right">
                                <label class="input-label">Going to</label>
                                <input type="text" name="city" placeholder="Destination" required>
                            </div>
                            <div class="input-field border-right">
                                <label class="input-label">Check-in</label>
                                <input type="date" name="checkin" required>
                            </div>
                            <div class="input-field border-right">
                                <label class="input-label">Check-out</label>
                                <input type="date" name="checkout" required>
                            </div>
                            <div class="input-field">
                                <label class="input-label">Travelers</label>
                                <input type="text" value="2 Travelers, 1 Room" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit-inquiry">Submit Inquiry</button>
                        </div>
                    </form>

                    <!-- Packages Form (Placeholder) -->
                    <form id="form-packages" class="tab-content" action="#" method="POST"
                        style="display: none;">
                        <div style="padding: 20px; color: #111;">Packages search coming soon!</div>
                    </form>

                    <!-- Cars Form (Placeholder) -->
                    <form id="form-cars" class="tab-content" action="#" method="POST" style="display: none;">
                        <div style="padding: 20px; color: #111;">Cars search coming soon!</div>
                    </form>

                    <!-- Success Message -->
                    <div id="inquiry-message"
                        style="display: none; padding: 20px; background: #d1fae5; color: #065f46; border-radius: 8px; margin-top: 15px; font-weight: 500; text-align: center;">
                        Thank you! Your inquiry has been submitted successfully. Our team will contact you shortly.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Destinations Section -->
    <section id="destinations" class="destinations">
        <div class="container">
            <div class="section-header">
                <h2>Popular Destinations</h2>
                <p>Explore our most loved travel spots</p>
            </div>

            <div class="row g-4 grid-cards justify-content-center">
                <!-- Card 1 -->
                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-img-wrapper">
                            <img src="/assets/images/dest_paris.png" alt="Paris, France">
                            <span class="badge position-absolute top-0 end-0 m-3"
                                style="background: var(--primary-color);">Top Rated</span>
                        </div>
                        <div class="card-content">
                            <h3>Paris, France</h3>
                            <p>Experience the city of love, fashion, and art.</p>
                            <div
                                class="card-footer bg-transparent border-top d-flex justify-content-between align-items-center pt-3">
                                <a href="tel:+1-888-354-2147"><button class="btn btn-primary">GET PRICE</button></a>
                                <a href="tel:+1-888-354-2147"><button class="btn btn-text">Book Now ➔</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-img-wrapper">
                            <img src="/assets/images/dest_maldives.png" alt="The Maldives">
                            <span class="badge position-absolute top-0 end-0 m-3"
                                style="background: var(--primary-color);">Popular</span>
                        </div>
                        <div class="card-content">
                            <h3>The Maldives</h3>
                            <p>Relax in crystal clear waters and overwater bungalows.</p>
                            <div
                                class="card-footer bg-transparent border-top d-flex justify-content-between align-items-center pt-3">
                                <a href="tel:+1-888-354-2147"><button class="btn btn-primary">GET PRICE</button></a>
                                <a href="tel:+1-888-354-2147"><button class="btn btn-text">Book Now ➔</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section (Image + Text) -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center gy-4 about-grid">
                <div class="col-12 col-md-6 about-image">
                    <img src="/assets/images/about_img.png" alt="Happy couple traveling"
                        class="img-fluid rounded shadow">
                </div>
                <div class="col-12 col-md-6 about-content">
                    <h2>Discover the World With Us</h2>
                    <p>We believe that travel is the ultimate investment in yourself. Our dedicated team works
                        tirelessly to
                        curate the most breathtaking experiences and destinations just for you.</p>
                    <p>Whether you're looking for a relaxing beach getaway, a thrilling mountain adventure, or a
                        cultural
                        city tour, Globeotrip is your trusted partner.</p>
                    <ul class="about-list">
                        <li>✔️ 10+ Years of Experience</li>
                        <li>✔️ Handpicked Destinations</li>
                        <li>✔️ 24/7 Customer Support</li>
                    </ul>
                    <button class="btn btn-primary">Learn More</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why-us" class="why-us" style="background: var(--light-bg);">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Globeotrip?</h2>
            </div>
            <div class="row g-4 grid-features">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box h-100">
                        <div class="feature-icon">🌍</div>
                        <h4>Global Coverage</h4>
                        <p>We offer destinations all over the globe, ensuring you can go wherever your heart desires.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box h-100">
                        <div class="feature-icon">💎</div>
                        <h4>Premium Experience</h4>
                        <p>From luxury resorts to first-class flights, we prioritize your comfort and experience.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="feature-box h-100">
                        <div class="feature-icon">🛡️</div>
                        <h4>Safe & Secure</h4>
                        <p>Travel with peace of mind knowing you are protected with our comprehensive travel insurance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services" style="background: var(--light-bg);">
        <div class="container">
            <div class="section-header">
                <h2>Our Services</h2>
                <p>What we provide for your perfect trip</p>
            </div>
            <div class="row g-4 grid-features">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box h-100" style="background: var(--white);">
                        <div class="feature-icon">✈️</div>
                        <h4>Flight Booking</h4>
                        <p>Get the best deals on flights to any destination around the world.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box h-100" style="background: var(--white);">
                        <div class="feature-icon">🏨</div>
                        <h4>Hotel Reservation</h4>
                        <p>Stay in top-rated hotels and resorts tailored to your budget.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="feature-box h-100" style="background: var(--white);">
                        <div class="feature-icon">🗺️</div>
                        <h4>Tour Packages</h4>
                        <p>All-inclusive tour packages with guided experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials" style="background: var(--white);">
        <div class="container">
            <div class="section-header">
                <h2>What Our Clients Say</h2>
                <p>Read the stories of our happy travelers</p>
            </div>
            <div class="row g-4 staggered-grid">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box testimonial-box h-100"
                        style="background: var(--light-bg); text-align: left;">
                        <div style="color: #fbbf24; font-size: 1.5rem; margin-bottom: 10px;">★★★★★</div>
                        <p style="font-style: italic; margin-bottom: 15px;">"The trip to Maldives was absolutely
                            breathtaking. Globeotrip took care of everything from flights to our beautiful overwater
                            bungalow."</p>
                        <h5 style="color: var(--dark-bg); font-weight: 600;">- Sarah Jenkins</h5>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box testimonial-box h-100"
                        style="background: var(--light-bg); text-align: left;">
                        <div style="color: #fbbf24; font-size: 1.5rem; margin-bottom: 10px;">★★★★★</div>
                        <p style="font-style: italic; margin-bottom: 15px;">"Excellent service and support throughout
                            our
                            European tour. Highly recommend Globeotrip to anyone looking for a stress-free vacation."
                        </p>
                        <h5 style="color: var(--dark-bg); font-weight: 600;">- Michael Chen</h5>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="feature-box testimonial-box h-100"
                        style="background: var(--light-bg); text-align: left;">
                        <div style="color: #fbbf24; font-size: 1.5rem; margin-bottom: 10px;">★★★★★</div>
                        <p style="font-style: italic; margin-bottom: 15px;">"They found us the best deals for our
                            family
                            trip to Paris. The kids loved the customized itinerary. We will definitely book again!"</p>
                        <h5 style="color: var(--dark-bg); font-weight: 600;">- The Thompson Family</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq-section" style="background: var(--light-bg);">
        <div class="container">
            <div class="row g-5 faq-split-layout">
                <div class="col-12 col-md-5 faq-left">
                    <div class="section-header" style="text-align: left; margin-bottom: 20px;">
                        <h2>Frequently Asked Questions</h2>
                        <p>Got questions? We've got answers.</p>
                    </div>
                    <p style="color: var(--text-light); margin-bottom: 20px;">Need more help? Our support team is
                        available 24/7 to assist you with any inquiries regarding our travel packages.</p>
                    <a href="tel:+1-888-354-2147" class="btn btn-primary">Contact Support</a>
                </div>
                <div class="col-12 col-md-7 faq-container">
                    <div class="faq-item">
                        <button class="faq-question">What is included in the tour packages? <span
                                class="faq-icon">+</span></button>
                        <div class="faq-answer">
                            <p>Our tour packages generally include flights, accommodations, guided tours, and some
                                meals. You can find detailed inclusions for each specific package on its dedicated page.
                            </p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Do I need travel insurance? <span
                                class="faq-icon">+</span></button>
                        <div class="faq-answer">
                            <p>While not mandatory, we highly recommend purchasing travel insurance to protect yourself
                                against unexpected cancellations, medical emergencies, or lost luggage.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question">Can I customize my itinerary? <span
                                class="faq-icon">+</span></button>
                        <div class="faq-answer">
                            <p>Absolutely! Our travel experts specialize in creating tailor-made itineraries to
                                perfectly match your preferences, budget, and travel style.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->

</x-guest-layout>
