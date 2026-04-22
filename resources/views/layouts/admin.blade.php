<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyvora Admin - {{ $title ?? 'Dashboard' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        * { font-family: 'Poppins', sans-serif; }

:root {
    --primary: #f97316;
    --primary-dark: #ea580c;
    --secondary: #6366f1;
    --sidebar-bg: #0f0c29;
    --sidebar-width: 260px;
}

body { background: #f1f5f9; }

/* Sidebar */
.sidebar {
    width: var(--sidebar-width);
    background: linear-gradient(180deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    transition: all 0.3s;
    box-shadow: 4px 0 20px rgba(0,0,0,0.3);
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.2) transparent;
}

.sidebar-brand {
    padding: 28px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

.sidebar-brand h4 {
    color: white;
    font-weight: 800;
    font-size: 1.6rem;
    margin: 0;
}

.sidebar-brand span { color: #f97316; }

.sidebar-brand small {
    color: rgba(255,255,255,0.4);
    font-size: 0.75rem;
    display: block;
    margin-top: 4px;
}

.sidebar-menu { padding: 20px 0; }

.menu-label {
    color: rgba(255,255,255,0.3);
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 16px 24px 6px;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 24px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s;
    border-left: 3px solid transparent;
    margin: 2px 0;
}

.sidebar-link:hover,
.sidebar-link.active {
    color: white;
    background: rgba(255,255,255,0.08);
    border-left-color: #f97316;
}

.sidebar-link.active {
    background: linear-gradient(90deg, rgba(249,115,22,0.15), transparent);
}

.sidebar-link i {
    width: 20px;
    text-align: center;
    font-size: 1rem;
}

/* Main Content */
.main-content {
    margin-left: var(--sidebar-width);
    min-height: 100vh;
}

/* Top Bar */
.topbar {
    background: white;
    padding: 18px 32px;
    box-shadow: 0 2px 20px rgba(0,0,0,0.06);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 99;
}

.topbar h5 {
    margin: 0;
    font-weight: 700;
    color: #1e1b4b;
    font-size: 1.2rem;
}

.topbar-user {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #374151;
    font-weight: 500;
}

.user-avatar {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, #f97316, #ef4444);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    box-shadow: 0 4px 15px rgba(249,115,22,0.4);
}

/* Page Content */
.page-content { padding: 32px; }

/* Admin Card */
.admin-card {
    background: white;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    border: none;
}

/* Stat Cards */
.stat-card {
    background: white;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s;
    border-bottom: 4px solid transparent;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.1);
}

.stat-card:nth-child(1) { border-bottom-color: #f97316; }
.stat-card:nth-child(2) { border-bottom-color: #6366f1; }
.stat-card:nth-child(3) { border-bottom-color: #10b981; }
.stat-card:nth-child(4) { border-bottom-color: #f59e0b; }

.stat-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
}

.stat-info h3 {
    font-size: 2rem;
    font-weight: 800;
    color: #1e1b4b;
    margin: 0;
}

.stat-info p {
    color: #6b7280;
    margin: 0;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Alerts */
.alert-success {
    background: #ecfdf5;
    border: 1px solid #6ee7b7;
    color: #065f46;
    border-radius: 12px;
}

.alert-danger {
    background: #fef2f2;
    border: 1px solid #fca5a5;
    color: #991b1b;
    border-radius: 12px;
}

/* Buttons */
.btn-primary-custom {
    background: linear-gradient(135deg, #f97316, #ef4444);
    color: white;
    border: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(249,115,22,0.3);
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(249,115,22,0.4);
    color: white;
}

.btn-edit {
    background: #ede9fe;
    color: #6366f1;
    border: none;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-edit:hover {
    background: #6366f1;
    color: white;
    transform: translateY(-1px);
}

.btn-delete {
    background: #fef2f2;
    color: #991b1b;
    border: none;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-delete:hover {
    background: #991b1b;
    color: white;
    transform: translateY(-1px);
}

/* Table */
.dataTables_wrapper .dataTables_filter input {
    border: 2px solid #e5e7eb;
    border-radius: 25px;
    padding: 8px 16px;
    outline: none;
    transition: all 0.3s;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #f97316;
}

.dataTables_wrapper .dataTables_length select {
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    padding: 6px 10px;
}

table.dataTable thead th {
    background: #f8fafc;
    color: #374151;
    font-weight: 700;
    border-bottom: 2px solid #e5e7eb;
    padding: 14px 16px;
}

table.dataTable tbody tr:hover {
    background: #fff7ed !important;
}

.page-item.active .page-link {
    background: linear-gradient(135deg, #f97316, #ef4444);
    border-color: transparent;
}

.page-link { color: #f97316; }

/* Form Controls */
.form-control {
    border-radius: 12px;
    border: 2px solid #e5e7eb;
    padding: 12px 16px;
    transition: all 0.3s;
    font-family: 'Poppins', sans-serif;
}

.form-control:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249,115,22,0.1);
}
    </style>

    @stack('styles')
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        <h4>Zy<span>vora</span> ⚙️</h4>
        <small style="color:rgba(255,255,255,0.4); font-size:0.75rem;">Admin Panel</small>
    </div>

    <div class="sidebar-menu">
        <div class="menu-label">Main</div>
        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>

        <div class="menu-label">Store</div>
        <a href="{{ route('admin.products.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Products
        </a>
        <a href="{{ route('admin.orders.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="fas fa-shopping-bag"></i> Orders
        </a>

        <div class="menu-label">Users</div>
        <a href="{{ route('admin.users.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Customers
        </a>

        <div class="menu-label">Support</div>
        <a href="{{ route('admin.contact.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> Messages
        </a>

        <div class="menu-label">Account</div>
        <a href="{{ route('home') }}" class="sidebar-link">
            <i class="fas fa-store"></i> View Store
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-link w-100 text-start"
                    style="background:none; border:none; cursor:pointer;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    <!-- Top Bar -->
    <div class="topbar">
        <h5>@yield('page-title', 'Dashboard')</h5>
        <div class="topbar-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <span>{{ auth()->user()->name }}</span>
        </div>
    </div>

    <!-- Alerts -->
    <div class="page-content pb-0">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Page Content -->
    <div class="page-content">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

@stack('scripts')
</body>
</html>