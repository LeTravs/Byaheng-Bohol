<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byaheng Bohol</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="header">
        <img src="https://i.redd.it/w21xp8c9u7wc1.jpeg" alt="Background Image">
        <div class="overlay">
            <div class="title-bar">
                <div class="title">Byaheng Bohol</div>
                <div class="search-container">
                    <input type="text" placeholder="Search">
                    <button type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="auth-links">
                    <a href="{{ route('register.tour') }}">Post your business</a>
                
                    @if (Route::has('login'))
                        @auth
                            <!-- Show the correct dashboard link based on the user's role -->
                            @if(Auth::user()->hasRole('superAdmin'))
                                <a href="{{ route('superadmin.index') }}">My Dashboard</a>
                            @elseif(Auth::user()->hasRole('tourAgencyAdmin'))
                                <a href="{{ route('touragency.index') }}">My Dashboard</a>
                            @elseif(Auth::user()->hasRole('transportOperatorAdmin'))
                                <a href="{{ route('transportoperator.index') }}">My Dashboard</a>
                            @else
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            @endif
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
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
</body>
</html>
