<x-guest-layout>

    <!-- Packages Banner -->
    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>Tour Packages</h1>
            <p>Book tailored packages and manage your journey.</p>
        </div>
    </section>

    <!-- Packages Layout Section -->
    <section class="packages-page-section py-5" style="background-color: var(--light-bg);">
        <div class="container py-4">

            <div class="row g-5">
                <!-- Sidebar Navigation -->
                <div class="col-12 col-lg-3">
                    <div class="nav flex-column nav-pills vertical-tabs" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <?php
                        $categories = [
                            [
                                'title' => 'Leisure / Holiday packages',
                                'desc' => 'Relax and unwind with our leisure packages designed for ultimate comfort and tranquility.',
                                'packages' => ['Paris & Swiss Highlights', 'Maldives Beach Retreat', 'Bali Tropical Escape', 'Dubai City & Desert Safari', 'Singapore & Malaysia Tour', 'Swiss Alps Adventure'],
                            ],
                            [
                                'title' => 'Adventure packages',
                                'desc' => 'Get your adrenaline pumping with thrilling activities like hiking, rafting, and wildlife safaris.',
                                'packages' => ['Amazon Rainforest Expedition', 'Himalayan Base Camp Trek', 'Costa Rica Zip-lining', 'African Safari Adventure', 'New Zealand Bungee & Skydiving', 'Patagonia Hiking Tour'],
                            ],
                            [
                                'title' => 'Honeymoon / romantic packages',
                                'desc' => 'Celebrate your love with intimate settings, luxury resorts, and unforgettable romantic experiences.',
                                'packages' => ['Santorini Sunset Getaway', 'Bora Bora Overwater Villas', 'Venice Gondola Romance', 'Maldives Honeymoon Special', 'Maui Couples Retreat', 'Amalfi Coast Escape'],
                            ],
                            [
                                'title' => 'Family packages',
                                'desc' => 'Create lifelong memories with kid-friendly itineraries, theme parks, and family resorts.',
                                'packages' => ['Orlando Theme Parks Tour', 'Hawaii Family Adventure', 'Tokyo Disneyland & Culture', 'Caribbean All-Inclusive Resort', 'London & Paris for Kids', 'Yellowstone National Park'],
                            ],
                            [
                                'title' => 'Group tour packages',
                                'desc' => 'Travel with friends or meet new people on our expertly guided, fun-filled group excursions.',
                                'packages' => ['Europe Grand Tour', 'Peru Machu Picchu Group Trek', 'Southeast Asia Explorer', 'Egypt Pyramids & Nile Cruise', 'Morocco Desert Safari', 'Japan Cherry Blossom Tour'],
                            ],
                            [
                                'title' => 'Solo travel packages',
                                'desc' => 'Discover yourself with safe, exciting, and highly social trips designed for solo travelers.',
                                'packages' => ['Bali Digital Nomad Retreat', 'Iceland Northern Lights Trek', 'Thailand Backpacking Route', 'Spain City & Culture Hop', 'New York City Solo Trip', 'Australia East Coast Adventure'],
                            ],
                            [
                                'title' => 'Luxury travel packages',
                                'desc' => "Indulge in 5-star hotels, private transfers, and VIP access to the world's finest destinations.",
                                'packages' => ['Monaco Grand Prix VIP', 'Dubai Burj Al Arab Stay', 'Private Island Maldives', 'Swiss Alps Chalet Retreat', 'French Riviera Yacht Tour', 'African Luxury Safari Lodge'],
                            ],
                            [
                                'title' => 'Budget / economy packages',
                                'desc' => 'Explore the world without breaking the bank with our affordable, high-value travel deals.',
                                'packages' => ['Vietnam Backpacker Special', 'Prague & Budapest Saver', 'Mexico City Budget Explorer', 'Lisbon & Porto Economy Tour', 'Bali Cheap Stays', 'Guatemala & Belize Route'],
                            ],
                            [
                                'title' => 'Pilgrimage / religious packages',
                                'desc' => 'Embark on a spiritual journey to sacred sites, ancient temples, and holy lands.',
                                'packages' => ['Jerusalem Holy Land Tour', 'Mecca Umrah Package', 'India Golden Triangle & Temples', 'Vatican City & Rome Tour', 'Camino de Santiago Trek', 'Japan Kyoto Temples Route'],
                            ],
                            [
                                'title' => 'Business / corporate travel packages',
                                'desc' => 'Seamless corporate travel with executive lounges, fast-track boarding, and premium stays.',
                                'packages' => ['Frankfurt Trade Fair Package', 'Hong Kong Business Hub', 'Silicon Valley Executive Tour', 'London Finance District Stay', 'Tokyo Corporate Retreat', 'Singapore MICE Package'],
                            ],
                            [
                                'title' => 'Educational / study tour packages',
                                'desc' => 'Expand your knowledge with historically rich tours, museum visits, and cultural immersion.',
                                'packages' => ['Rome Ancient History Tour', 'Athens & Greek Isles Study', 'Washington D.C. Civics Trip', 'London Literary Tour', 'Beijing & Great Wall History', 'Berlin WWII Historical Sites'],
                            ],
                            [
                                'title' => 'Cruise packages',
                                'desc' => 'Set sail on majestic oceans with all-inclusive dining, entertainment, and breathtaking ports.',
                                'packages' => ['Caribbean 7-Night Cruise', 'Alaskan Glacier Voyage', 'Mediterranean Wonders Cruise', 'Bahamas Weekend Getaway', 'Nile River Luxury Cruise', 'Norwegian Fjords Expedition'],
                            ],
                            [
                                'title' => 'Weekend getaway packages',
                                'desc' => 'Escape the daily grind with quick, refreshing, and action-packed 3-day weekend trips.',
                                'packages' => ['Las Vegas Casino Weekend', 'Miami Beach Quick Escape', 'Chicago City Break', 'New Orleans Jazz Weekend', 'Toronto City Tour', 'Nashville Country Music Getaway'],
                            ],
                            [
                                'title' => 'Customized / tailor-made packages',
                                'desc' => 'Build your dream vacation from scratch. You pick the dates and places; we do the rest.',
                                'packages' => ['Bespoke European Road Trip', 'Tailored New Zealand Drive', 'Custom Japan Rail Journey', 'Personalized South America Route', 'Design Your Own Safari', 'Custom Caribbean Island Hopping'],
                            ],
                            [
                                'title' => 'All-inclusive packages',
                                'desc' => 'Leave your wallet in the safe. Enjoy flights, stays, food, and drinks all for one price.',
                                'packages' => ['Cancun All-Inclusive Resort', 'Punta Cana Beach Bliss', 'Jamaica Montego Bay Stay', 'Antalya Turkey Resort', 'Mauritius Complete Package', 'Fiji Island All-Inclusive'],
                            ],
                        ];
                        
                        foreach ($categories as $index => $category) {
                            $id = 'cat-' . $index;
                            $activeClass = $index === 0 ? 'active' : '';
                            $ariaSelected = $index === 0 ? 'true' : 'false';
                            echo "<button class='nav-link {$activeClass}' id='v-pills-{$id}-tab' data-bs-toggle='pill' data-bs-target='#v-pills-{$id}' type='button' role='tab' aria-controls='v-pills-{$id}' aria-selected='{$ariaSelected}'>{$category['title']}</button>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-12 col-lg-9">
                    <div class="tab-content bg-white p-4 p-md-5 rounded shadow-sm border-0" id="v-pills-tabContent">

                        <?php
                    foreach ($categories as $index => $category) {
                        $id = 'cat-' . $index;
                        $activeClass = ($index === 0) ? 'show active' : '';
                        ?>

                        <div class="tab-pane fade <?php echo $activeClass; ?>" id="v-pills-<?php echo $id; ?>" role="tabpanel"
                            aria-labelledby="v-pills-<?php echo $id; ?>-tab" tabindex="0">

                            <!-- Overview -->
                            <h3 class="mb-4" style="color: var(--dark-bg); font-weight: 700;">Overview</h3>
                            <p style="color: var(--text-light); line-height: 1.8;">
                                <strong><?php echo $category['desc']; ?></strong> We offer handpicked itineraries and exclusive deals
                                to make your journey smooth and enjoyable. Explore top destinations, tailored
                                experiences, and seamless travel arrangements crafted specifically for your preferences.
                            </p>

                            <!-- Popular Packages -->
                            <hr class="my-5">
                            <h4 class="mb-4" style="font-weight: 700; color: var(--primary-color);">Popular <span
                                    style="color: var(--dark-bg);"><?php echo $category['title']; ?></span></h4>

                            <div class="row g-3">
                                <?php foreach ($category['packages'] as $pkg) { ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="p-3 border rounded shadow-sm bg-light h-100"
                                        style="font-size: 0.9rem; color: var(--text-light);">
                                        <ul class="mb-0 ps-3">
                                            <li><?php echo $pkg; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <!-- FAQ Section inside tab -->
                            <hr class="my-5">
                            <h4 class="mb-4" style="font-weight: 700; color: var(--dark-bg);">Frequently Asked
                                Questions</h4>

                            <div class="accordion" id="accordion-<?php echo $id; ?>">
                                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                                    <h2 class="accordion-header" id="headingOne-<?php echo $id; ?>">
                                        <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo $id; ?>"
                                            aria-expanded="false" aria-controls="collapseOne-<?php echo $id; ?>">
                                            What is included in these <?php echo strtolower($category['title']); ?>?
                                        </button>
                                    </h2>
                                    <div id="collapseOne-<?php echo $id; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne-<?php echo $id; ?>"
                                        data-bs-parent="#accordion-<?php echo $id; ?>">
                                        <div class="accordion-body text-muted">
                                            Our packages generally include flights, accommodations, guided tours, and
                                            some meals. You can find detailed inclusions for each specific package on
                                            its dedicated booking page.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                                    <h2 class="accordion-header" id="headingTwo-<?php echo $id; ?>">
                                        <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo-<?php echo $id; ?>"
                                            aria-expanded="false" aria-controls="collapseTwo-<?php echo $id; ?>">
                                            Can I customize my itinerary?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo-<?php echo $id; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo-<?php echo $id; ?>"
                                        data-bs-parent="#accordion-<?php echo $id; ?>">
                                        <div class="accordion-body text-muted">
                                            Absolutely! Our travel experts specialize in creating tailor-made
                                            itineraries to perfectly match your preferences, budget, and travel style.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                                    <h2 class="accordion-header" id="headingThree-<?php echo $id; ?>">
                                        <button class="accordion-button collapsed fw-semibold text-dark" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree-<?php echo $id; ?>" aria-expanded="false"
                                            aria-controls="collapseThree-<?php echo $id; ?>">
                                            What is the cancellation policy?
                                        </button>
                                    </h2>
                                    <div id="collapseThree-<?php echo $id; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree-<?php echo $id; ?>"
                                        data-bs-parent="#accordion-<?php echo $id; ?>">
                                        <div class="accordion-body text-muted">
                                            Cancellation policies vary by package and provider. Please refer to the
                                            specific terms and conditions provided during the booking process.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
