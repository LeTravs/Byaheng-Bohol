<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Agency Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .sidebar {
            width: 250px;
            background-color: #758d6b;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
            color: white;
        }
        .sidebar .logo {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            font-size: 18px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #6b8d5a;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f5f5f5;
        }
        .header .title {
            font-size: 24px;
            font-weight: bold;
        }
        .header .user {
            font-size: 18px;
            position: relative;
            cursor: pointer;
        }
        .header .user .dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            z-index: 1000;
        }
        .header .user .dropdown a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
        }
        .header .user .dropdown a:hover {
            background-color: #f0f0f0;
        }
        .header .user:hover .dropdown {
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            BYAHENG BOHOL
        </div>
        <ul>
            <li><a href="{{ route('touragency.index') }}" class="{{ request()->is('touragency') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="#">Tour Packages</a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Rate & Reviews</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="title">@yield('header')</div>
            <div class="user">
                {{ Auth::user()->name }} <span class="caret">&#9660;</span>
                <div class="dropdown">
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>        

        @yield('content')
        
    </div>
</body>
</html>
