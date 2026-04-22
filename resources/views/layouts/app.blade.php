<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyvora - {{ $title ?? 'Shop Everything' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        * { font-family: 'Poppins', sans-serif; }

        :root {
            --primary: #f97316;
            --primary-dark: #ea580c;
            --secondary: #6366f1;
            --light-bg: #fff7ed;
        }

        body { background: #fafafa; }

        /* Navbar */
        .navbar {
            background: #ffffff;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 14px 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand span { color: var(--secondary); }

        .nav-link {
            font-weight: 500;
            color: #374151 !important;
            margin: 0 4px;
            transition: color 0.2s;
        }

        .nav-link:hover { color: var(--primary) !important; }

        .btn-primary-custom {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
        }

        .cart-badge {
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            padding: 1px 6px;
            font-size: 0.7rem;
            margin-left: 2px;
        }

        /* Footer */
        footer {
            background: #1e1b4b;
            color: #a5b4fc;
            padding: 40px 0 20px;
            margin-top: 80px;
        }

        footer h5 { color: white; font-weight: 600; }
        footer a { color: #a5b4fc; text-decoration: none; }
        footer a:hover { color: white; }

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
    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            Zy<span>vora</span> 🛒
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fas fa-store me-1"></i>Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">
                        <i class="fas fa-envelope me-1"></i>Contact
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center">
                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-badge">
                                {{ count(session()->get('cart', [])) }}
                            </span>
                        </a>
                    </li>

                    @if(auth()->user()->is_admin)
                        <li class="nav-item me-2">
                            <a class="btn-primary-custom" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-cog me-1"></i>Admin
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
    <li>
        <a href="{{ route('orders.my') }}" class="dropdown-item">
            <i class="fas fa-box me-2"></i>My Orders
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
    </li>
</ul>
                    </li>
                @else
                    <li class="nav-item me-2">
    <a class="nav-link" href="{{ route('wishlist.index') }}" title="Wishlist">
        <i class="fas fa-heart" style="color:#ef4444;"></i>
        <span class="cart-badge" style="background:#ef4444;">
            {{ App\Models\Wishlist::where('user_id', auth()->id())->count() }}
        </span>
    </a>
</li>
<li class="nav-item me-2">
    <a class="nav-link" href="{{ route('cart.index') }}">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-badge">
            {{ count(session()->get('cart', [])) }}
        </span>
    </a>
</li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Flash Messages -->
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close"
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
@yield('content')

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Zyvora 🛒</h5>
                <p>Zyvora — your premium destination for everything you love.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">Products</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Contact</h5>
                <p><i class="fas fa-envelope me-2"></i>support@carthive.com</p>
                <p><i class="fas fa-phone me-2"></i>+92 300 0000000</p>
            </div>
        </div>
        <hr style="border-color: #3730a3;">
        <p class="text-center mb-0" style="font-size: 0.85rem;">
            © 2024 Zyvora. All rights reserved.
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>