<x-guest-layout>
    @php
        $state_name = isset($_GET['name']) ? $_GET['name'] : 'California';
        // List of cities
        $all_cities = [
            'Los Angeles',
            'San Diego',
            'San Jose',
            'San Francisco',
            'Fresno',
            'Sacramento',
            'Long Beach',
            'Oakland',
            'Bakersfield',
        ];

        // Pagination logic
        $items_per_page = 6;
        $total_items = count($all_cities);
        $total_pages = ceil($total_items / $items_per_page);
        $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($current_page < 1) {
            $current_page = 1;
        }
        if ($current_page > $total_pages) {
            $current_page = $total_pages;
        }

        $start_index = ($current_page - 1) * $items_per_page;
        $current_cities = array_slice($all_cities, $start_index, $items_per_page);
    @endphp

    <!-- Category Banner -->
    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>{{ $state_name }}</h1>
            <p>Explore top cities in {{ $state_name }}.</p>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-md-5">

            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-theme-primary text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/service-area"
                            class="text-theme-primary text-decoration-none">Service Area</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $state_name }}</li>
                </ol>
            </nav>

            <div class="text-center mb-5 fade-up-1">
                <span class="text-theme-primary fw-bold text-uppercase tracking-wide mb-2 d-block">Explore Cities</span>
                <h2 class="fw-bold text-theme-dark display-6">Cities in {{ $state_name }}</h2>
            </div>

            <div class="row g-4 mb-5">
                @foreach ($current_cities as $index => $city)
                    @php
                        // Generate a unique image for each city using its name as a seed
                        $image_seed = md5($city . 'city');
                        $image_url = "https://picsum.photos/seed/{$image_seed}/400/300";
                    @endphp
                    <div class="col-12 col-md-4 fade-up-{{ ($index % 3) + 2 }}">
                        <!-- Static Link to City Page -->
                        <a href="/city?state={{ urlencode($state_name) }}&name={{ urlencode($city) }}"
                            class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden feature-hover-card">
                                <img src="{{ $image_url }}" alt="{{ $city }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4 text-center bg-white position-relative">
                                    <h4 class="fw-bold text-theme-dark mb-3">{{ $city }}</h4>
                                    <p class="text-theme-muted mb-0">Discover top-rated locations in
                                        {{ $city }}.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($total_pages > 1)
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $current_page <= 1 ? 'disabled' : '' }}">
                            <a class="page-link"
                                href="?name={{ urlencode($state_name) }}&page={{ $current_page - 1 }}">Previous</a>
                        </li>

                        @for ($i = 1; $i <= $total_pages; $i++)
                            <li class="page-item {{ $i == $current_page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="?name={{ urlencode($state_name) }}&page={{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="page-item {{ $current_page >= $total_pages ? 'disabled' : '' }}">
                            <a class="page-link"
                                href="?name={{ urlencode($state_name) }}&page={{ $current_page + 1 }}">Next</a>
                        </li>
                    </ul>
                </nav>
            @endif

        </div>
    </section>

</x-guest-layout>
