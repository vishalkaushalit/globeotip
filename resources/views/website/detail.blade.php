<x-guest-layout>
    @php
        $state = isset($_GET['state']) ? $_GET['state'] : 'California';
        $city = isset($_GET['city']) ? $_GET['city'] : 'Los Angeles';
        $neighborhood = isset($_GET['neighborhood']) ? $_GET['neighborhood'] : 'Hollywood';
    @endphp
    <!-- Detail Banner -->
    <section class="page-banner inner-banner"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://picsum.photos/seed/<?php echo md5($neighborhood . 'banner'); ?>/1920/600') center/cover;">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center text-white">
            <h1><?php echo htmlspecialchars($neighborhood); ?> Package</h1>
            <p>A beautiful getaway in <?php echo htmlspecialchars($city); ?>, California</p>
        </div>
    </section>

    <!-- Heading & Price Section -->
    <section class="v-heading-sec py-4 bg-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center shadow-sm rounded-4 p-4"
                        style="background-color: #f8f9fa;">
                        <div class="box-left">
                            <h2 class="fw-bold mb-2 text-theme-dark">
                                Explore <?php echo htmlspecialchars($neighborhood); ?>, <?php echo htmlspecialchars($city); ?>
                            </h2>
                            <div class="v-locatin-nights text-theme-muted fw-semibold">
                                <span class="me-3">
                                    <i class="fa-solid fa-calendar-days text-theme-primary"></i> 4 Days - 3 Nights
                                </span>
                                <span class="text-warning">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </span>
                            </div>
                        </div>
                        <div class="box-right text-end">
                            <div class="price-share mb-3">
                                <p class="mb-0 fs-3 fw-bold text-theme-primary">$199.00 <span
                                        class="fs-6 text-theme-muted fw-normal">/ Per Person</span></p>
                            </div>
                            <div class="facility">
                                <button class="btn btn-theme-primary rounded-pill px-4 fw-bold shadow-sm">Book
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Details Section -->
    <section class="v-pkg-details py-5 bg-white">
        <div class="container">

            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"
                            class="text-theme-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="/service-area"
                            class="text-theme-primary text-decoration-none">Service Area</a></li>
                    <li class="breadcrumb-item"><a href="/state?name={{ urlencode($state) }}"
                            class="text-theme-primary text-decoration-none">{{ $state }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="/city?state={{ urlencode($state) }}&name={{ urlencode($city) }}"
                            class="text-theme-primary text-decoration-none">{{ $city }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $neighborhood }}</li>
                </ol>
            </nav>

            <div class="row g-4">
                <div class="col-lg-9">
                    <!-- Gallery Section -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <img src="https://picsum.photos/seed/<?php echo md5($neighborhood . '1'); ?>/800/400"
                                class="img-fluid rounded-4 shadow-sm w-100" style="object-fit:cover; height: 400px;"
                                alt="Main View">
                        </div>
                        <div class="col-md-4 d-flex flex-column gap-3">
                            <img src="https://picsum.photos/seed/<?php echo md5($neighborhood . '2'); ?>/400/190"
                                class="img-fluid rounded-4 shadow-sm w-100" style="object-fit:cover; height: 190px;"
                                alt="Side View 1">
                            <img src="https://picsum.photos/seed/<?php echo md5($neighborhood . '3'); ?>/400/190"
                                class="img-fluid rounded-4 shadow-sm w-100" style="object-fit:cover; height: 192px;"
                                alt="Side View 2">
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 bg-theme-light">
                        <h3 class="fw-bold mb-3 text-theme-dark">Package Description</h3>
                        <p class="text-theme-muted mb-0" style="line-height: 1.8;">
                            Experience the ultimate comfort and excitement in <?php echo htmlspecialchars($neighborhood); ?>. This exclusive
                            package offers top-tier accommodations, immersive local tours, and a chance to truly
                            experience the culture of <?php echo htmlspecialchars($city); ?>. Perfect for weekend getaways, family
                            vacations, or romantic escapes.
                        </p>
                    </div>

                    <!-- Nav Tabs -->
                    <ul class="nav nav-pills mb-4 d-flex flex-wrap gap-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold active rounded-pill px-4" data-bs-toggle="tab"
                                data-bs-target="#Overview" type="button">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold rounded-pill px-4 bg-light text-dark" data-bs-toggle="tab"
                                data-bs-target="#TourPlan" type="button"
                                onclick="this.classList.remove('bg-light','text-dark');">Tour Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold rounded-pill px-4 bg-light text-dark" data-bs-toggle="tab"
                                data-bs-target="#Highlight" type="button"
                                onclick="this.classList.remove('bg-light','text-dark');">Highlights</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold rounded-pill px-4 bg-light text-dark" data-bs-toggle="tab"
                                data-bs-target="#Inclusion" type="button"
                                onclick="this.classList.remove('bg-light','text-dark');">Inclusions</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="myTabContent">

                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="Overview" role="tabpanel">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-3">Overview of <?php echo htmlspecialchars($neighborhood); ?></h4>
                                    <p class="text-theme-muted" style="line-height: 1.8;">
                                        <?php echo htmlspecialchars($neighborhood); ?> in <?php echo htmlspecialchars($city); ?>, California, is a vibrant and
                                        culturally rich destination blending historic architecture with modern
                                        attractions. It's an ideal location for travelers seeking unique experiences.
                                    </p>
                                    <p class="text-theme-muted mb-0" style="line-height: 1.8;">
                                        Whether you are walking down the main streets, enjoying local cuisines, or
                                        exploring hidden gems, this package ensures you get the most out of your stay
                                        without the hassle of planning every detail.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Tour Plan Tab -->
                        <div class="tab-pane fade" id="TourPlan" role="tabpanel">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">Tour Itinerary</h4>
                                    <div class="accordion" id="tourAccordion">
                                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-light fw-bold" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#day1">
                                                    Day 1: Arrival & Check-In
                                                </button>
                                            </h2>
                                            <div id="day1" class="accordion-collapse collapse show"
                                                data-bs-parent="#tourAccordion">
                                                <div class="accordion-body text-theme-muted">
                                                    Arrive in <?php echo htmlspecialchars($city); ?> and head directly to your premium
                                                    hotel in <?php echo htmlspecialchars($neighborhood); ?>. Check in, relax, and enjoy a
                                                    complimentary welcome dinner.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed bg-light fw-bold"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#day2">
                                                    Day 2: City Exploration
                                                </button>
                                            </h2>
                                            <div id="day2" class="accordion-collapse collapse"
                                                data-bs-parent="#tourAccordion">
                                                <div class="accordion-body text-theme-muted">
                                                    Enjoy a guided walking tour of <?php echo htmlspecialchars($neighborhood); ?>'s top
                                                    attractions, including historic monuments and local shopping
                                                    districts.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item border-0 rounded-4 shadow-sm overflow-hidden">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed bg-light fw-bold"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#day3">
                                                    Day 3: Leisure & Departure
                                                </button>
                                            </h2>
                                            <div id="day3" class="accordion-collapse collapse"
                                                data-bs-parent="#tourAccordion">
                                                <div class="accordion-body text-theme-muted">
                                                    Spend the morning at your leisure. Enjoy breakfast, do some
                                                    last-minute shopping, and head to the airport for your departure.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Highlights Tab -->
                        <div class="tab-pane fade" id="Highlight" role="tabpanel">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-3">Key Highlights</h4>
                                    <ul class="list-group list-group-flush border-0">
                                        <li
                                            class="list-group-item border-0 px-0 d-flex align-items-center text-theme-muted">
                                            <i class="fa-solid fa-circle-check text-success me-3 fs-5"></i> 3 Nights
                                            Accommodation in a 4-Star Hotel
                                        </li>
                                        <li
                                            class="list-group-item border-0 px-0 d-flex align-items-center text-theme-muted">
                                            <i class="fa-solid fa-circle-check text-success me-3 fs-5"></i> Daily
                                            Complimentary Breakfast
                                        </li>
                                        <li
                                            class="list-group-item border-0 px-0 d-flex align-items-center text-theme-muted">
                                            <i class="fa-solid fa-circle-check text-success me-3 fs-5"></i> Guided
                                            Walking Tour of <?php echo htmlspecialchars($neighborhood); ?>
                                        </li>
                                        <li
                                            class="list-group-item border-0 px-0 d-flex align-items-center text-theme-muted">
                                            <i class="fa-solid fa-circle-check text-success me-3 fs-5"></i> Airport
                                            Transfers Included
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Inclusions Tab -->
                        <div class="tab-pane fade" id="Inclusion" role="tabpanel">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="fw-bold text-success mb-3"><i
                                                    class="fa-solid fa-check me-2"></i> Inclusions</h4>
                                            <ul class="text-theme-muted" style="line-height: 2;">
                                                <li>Hotel stay for 3 nights</li>
                                                <li>All local taxes and fees</li>
                                                <li>Sightseeing tours as mentioned</li>
                                                <li>24/7 on-ground assistance</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 mt-4 mt-md-0">
                                            <h4 class="fw-bold text-danger mb-3"><i
                                                    class="fa-solid fa-xmark me-2"></i> Exclusions</h4>
                                            <ul class="text-theme-muted" style="line-height: 2;">
                                                <li>International/Domestic Flights</li>
                                                <li>Personal expenses (laundry, tips)</li>
                                                <li>Meals not explicitly mentioned</li>
                                                <li>Travel Insurance</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 position-sticky" style="top: 100px;">
                        <h4 class="fw-bold text-theme-dark mb-4 text-center">Need Help Booking?</h4>
                        <p class="text-theme-muted text-center small mb-4">Our travel experts are ready to assist you
                            with your <?php echo htmlspecialchars($city); ?> trip.</p>

                        <a href="tel:+1-833-610-7654"
                            class="btn btn-outline-theme-primary w-100 rounded-pill mb-3 fw-bold d-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-phone"></i> +1-833-610-7654
                        </a>

                        <a href="/contact"
                            class="btn btn-theme-primary w-100 rounded-pill fw-bold d-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-envelope"></i> Request a Quote
                        </a>

                        <hr class="my-4 text-muted">

                        <h5 class="fw-bold mb-3 fs-6">Quick Details</h5>
                        <ul class="list-unstyled mb-0 small text-theme-muted">
                            <li class="mb-2 d-flex justify-content-between">
                                <strong>State:</strong> <span>California</span>
                            </li>
                            <li class="mb-2 d-flex justify-content-between">
                                <strong>City:</strong> <span><?php echo htmlspecialchars($city); ?></span>
                            </li>
                            <li class="mb-0 d-flex justify-content-between">
                                <strong>Location:</strong> <span class="text-end ms-2"><?php echo htmlspecialchars($neighborhood); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Include required JS for Tabs -->
    <script>
        // Simple script to toggle pill colors
        const tabLinks = document.querySelectorAll('#myTab .nav-link');
        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                tabLinks.forEach(l => {
                    l.classList.remove('bg-theme-primary', 'text-white');
                    l.classList.add('bg-light', 'text-dark');
                });
                this.classList.remove('bg-light', 'text-dark');
                this.classList.add('bg-theme-primary', 'text-white');
            });
        });
    </script>


</x-guest-layout>
