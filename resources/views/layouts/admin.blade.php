<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .sidebar {
            height: 100vh;
            background-color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            text-decoration: none;
            font-weight: bold;
            color: #333;
            padding: 10px;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .header {
            background-color: #fff;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content {
            padding: 20px;
        }
        .card {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }
        .dropdown-menu {
            min-width: 200px;
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <h2>Byaheng Bohol</h2>
            <a href="{{ route('superadmin.index') }}" class="{{ request()->is('superadmin') ? 'active' : '' }}">Dashboard</a>
            <a href="#" class="{{ request()->is('manage-users') ? 'active' : '' }}">Manage User Information</a>
            <a href="#" class="{{ request()->is('logs') ? 'active' : '' }}">View Logs</a>
        </div>
        

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <div class="header">
                @yield('header', 'DASHBOARD')
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
