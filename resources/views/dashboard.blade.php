<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    @endpush

    <div class="header">
        <img src="{{ asset('https://i.redd.it/w21xp8c9u7wc1.jpeg') }}" alt="Background Image">
        <div class="overlay">
            <div class="title-bar">
                <div class="title">Byaheng Bohol</div>
                <div class="search-container">
                    <input type="text" placeholder="Search">
                    <button type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="auth-links flex items-center">
                    <!-- User Menu Trigger -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white flex items-center">
                            {{ Auth::user()->name }}
                            <svg class="fill-current h-4 w-4 inline ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Plain Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                {{ __('Profile') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu">
                <a href="#">Countryside Tour</a>
                <a href="#">Island Hopping</a>
                <a href="#">Diving Experience</a>
                <a href="#">Historical Tour</a>
                <a href="#">Food Tour</a>
                <a href="#">Nature Trekking</a>
            </div>
            <div class="content">
                <h2>AWAY FROM MONOTONOUS LIFE</h2>
                <h1>BYAHE NA BAI</h1>
                <p>Book now for a better lifestyle. Lorem ipsum blah blah blah</p>
                <div class="button-container">
                    <button>Book Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="search-filter">
            <h3>Search Filter</h3>
            <div class="filter-group">
                <label>Rating</label>
                <div class="rating">
                    <span>★★★★★</span><br>
                    <span>★★★★☆</span><br>
                    <span>★★★☆☆</span><br>
                    <span>★★☆☆☆</span><br>
                    <span>★☆☆☆☆</span>
                </div>
            </div>
            <div class="filter-group">
                <label>Price Range</label>
                <input type="range" min="0" max="5000" value="2500">
            </div>
        </div>

        <div class="tour-section">
            <div class="filter-horizontal">
                <div class="filter-box">
                    <button>Category</button>
                </div>
                <div class="filter-box">
                    <button>Price</button>
                </div>
            </div>
            <div class="tour-card">
                <img src="{{ asset('images/bohol-land-tour.jpg') }}" alt="Bohol Land Tour">
                <div class="tour-info">
                    <h2>BOHOL LAND TOUR</h2>
                    <p>You will visit the picturesque chocolate hills, the stunning man-made Mahogany forest in Loboc, the world-famous tarsier sanctuary and more...</p>
                    <p class="price">₱3500</p>
                    <p class="rating">★★★★☆ (56 reviews)</p>
                </div>
            </div>
        
            <div class="tour-card">
                <img src="{{ asset('images/pump-boat-for-rent.jpg') }}" alt="Pump Boat for Rent">
                <div class="tour-info">
                    <h2>PUMP BOAT FOR RENT</h2>
                    <p>You will visit the picturesque chocolate hills, the stunning man-made Mahogany forest in Loboc, the world-famous tarsier sanctuary and more...</p>
                    <p class="price">₱1500</p>
                    <p class="rating">★★★☆☆</p>
                </div>
            </div>
        
            <div class="tour-card">
                <img src="{{ asset('images/van-for-rent.jpg') }}" alt="Van for Rent">
                <div class="tour-info">
                    <h2>VAN FOR RENT</h2>
                    <p>You will visit the picturesque chocolate hills, the stunning man-made Mahogany forest in Loboc, the world-famous tarsier sanctuary and more...</p>
                    <p class="price">₱2500</p>
                    <p class="rating">★★★★☆</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
