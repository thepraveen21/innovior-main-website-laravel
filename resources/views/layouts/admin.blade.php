<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Innovior')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { 
            margin: 0; 
            font-family: system-ui, -apple-system, sans-serif; 
            background: #f5f5f5;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background: #2c3e50;
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar-header {
            padding: 20px;
            background: #34495e;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 1px solid #34495e;
        }
        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
        }
        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        .sidebar-menu a:hover {
            background: #34495e;
            border-left-color: #3498db;
        }
        .sidebar-menu a.active {
            background: #34495e;
            border-left-color: #3498db;
        }
        .sidebar-footer {
            padding: 20px;
            background: #34495e;
            border-top: 1px solid #2c3e50;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
        }
        .user-name {
            font-size: 14px;
            font-weight: 500;
        }
        .logout-btn {
            width: 100%;
            padding: 8px;
            background: #e74c3c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background: #c0392b;
        }
        .main-content {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                Admin Panel
            </div>
            
            <div class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.sliders.index') }}" class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    🎨 Home Sliders
                </a>
                <a href="{{ route('admin.home-content.index') }}" class="{{ request()->routeIs('admin.home-content.*') ? 'active' : '' }}">
                    🏠 Home Content
                </a>
                <a href="{{ route('admin.services-content.index') }}" class="{{ request()->routeIs('admin.services-content.*') ? 'active' : '' }}">
                    🔧 Services Content
                </a>
                <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                    📄 Pages
                </a>
            </div>
            
            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-name">
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
