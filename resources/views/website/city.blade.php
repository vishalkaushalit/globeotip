<x-guest-layout>
@php
$state_name = isset($_GET['state']) ? $_GET['state'] : 'California';
$city_name = isset($_GET['name']) ? $_GET['name'] : 'Los Angeles';
</x-guest-layout>
// Updated List of Neighborhoods
$all_neighborhoods = [
    "Hollywood", "Westlake", "Van Nuys", "North Hollywood", "Pacoima", 
    "Koreatown", "Boyle Heights", "Canoga Park", "Northridge", 
    "South Los Angeles", "Reseda", "West Adams", "Sun Valley", "Sylmar", 
    "Panorama City", "San Pedro", "Wilmington", "Westchester", "Venice", 
    "Echo Park", "Highland Park", "Harbor Gateway", "Sherman Oaks", "Encino", 
    "Westwood", "Baldwin Hills / Crenshaw", "Brentwood", "Eagle Rock", 
    "Palms", "Woodland Hills", "Chatsworth", "Tarzana", "Mar Vista", 
    "Los Feliz", "Mid-Wilshire", "Bel Air", "Studio City", "Silver Lake", 
    "Glassell Park", "Atwater Village", "Porter Ranch", "Valley Village", 
    "Granada Hills", "Mission Hills", "Lincoln Heights", "El Sereno", 
    "Jefferson Park", "Leimert Park", "Cypress Park", "Toluca Lake"
];

// Pagination logic
$items_per_page = 6;
$total_items = count($all_neighborhoods);
$total_pages = ceil($total_items / $items_per_page);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) $current_page = 1;
if ($current_page > $total_pages) $current_page = $total_pages;

$start_index = ($current_page - 1) * $items_per_page;
$current_neighborhoods = array_slice($all_neighborhoods, $start_index, $items_per_page);
@endphp

<!-- City Banner -->
<section class="page-banner inner-banner">
    <div class="banner-overlay"></div>
    <div class="container banner-content text-center">
        <h1>{{ $city_name }}</h1>
        <p>Explore top neighborhoods in {{ $city_name }}.</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-md-5">
        
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-theme-primary text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/state?name={{ urlencode($state_name) }}" class="text-theme-primary text-decoration-none">{{ $state_name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $city_name }}</li>
            </ol>
        </nav>

        <div class="text-center mb-5 fade-up-1">
            <span class="text-theme-primary fw-bold text-uppercase tracking-wide mb-2 d-block">Explore Neighborhoods</span>
            <h2 class="fw-bold text-theme-dark display-6">Neighborhoods in {{ $city_name }}</h2>
        </div>

        <div class="row g-4 mb-5">
            @foreach($current_neighborhoods as $index => $neighborhood)
            @php 
                // Generate a unique image for each neighborhood using its name as a seed
                $image_seed = md5($neighborhood . "neighborhood");
                $image_url = "https://picsum.photos/seed/{$image_seed}/400/300";
            @endphp
            <div class="col-12 col-md-4 fade-up-{{ ($index % 3) + 2 }}">
                <!-- Link to Detail Page -->
                <a href="/detail?state={{ urlencode($state_name) }}&city={{ urlencode($city_name) }}&neighborhood={{ urlencode($neighborhood) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden feature-hover-card">
                        <img src="{{ $image_url }}" alt="{{ $neighborhood }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4 text-center bg-white position-relative">
                            <h4 class="fw-bold text-theme-dark mb-3">{{ $neighborhood }}</h4>
                            <p class="text-theme-muted mb-0">Discover amazing places in {{ $neighborhood }}.</p>
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
                <li class="page-item {{ ($current_page <= 1) ? 'disabled' : '' }}">
                    <a class="page-link" href="?state={{ urlencode($state_name) }}&name={{ urlencode($city_name) }}&page={{ $current_page - 1 }}">Previous</a>
                </li>
                
                @for ($i = 1; $i <= $total_pages; $i++)
                    <li class="page-item {{ ($i == $current_page) ? 'active' : '' }}">
                        <a class="page-link" href="?state={{ urlencode($state_name) }}&name={{ urlencode($city_name) }}&page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor
                
                <li class="page-item {{ ($current_page >= $total_pages) ? 'disabled' : '' }}">
                    <a class="page-link" href="?state={{ urlencode($state_name) }}&name={{ urlencode($city_name) }}&page={{ $current_page + 1 }}">Next</a>
                </li>
            </ul>
        </nav>
        @endif

    </div>
</section>

</x-guest-layout>
