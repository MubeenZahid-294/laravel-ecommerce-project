@extends('layouts.app')

@section('content')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<style>
   /* Hero Slider */
.swiper { width: 100%; height: 600px; }
.swiper-slide {
    display: flex;
    align-items: center;
    padding: 0 100px;
    position: relative;
    overflow: hidden;
}
.slide-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.slide-2 { background: linear-gradient(135deg, #f97316 0%, #ef4444 100%); }
.slide-3 { background: linear-gradient(135deg, #06b6d4 0%, #6366f1 100%); }

.slide-content { z-index: 2; }
.slide-content h1 {
    font-size: 3.5rem;
    font-weight: 800;
    color: white;
    line-height: 1.2;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
}
.slide-content p {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.9);
    margin: 20px 0 32px;
}
.btn-slider {
    background: white;
    color: #6366f1;
    border: none;
    padding: 14px 36px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}
.btn-slider:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
    color: #6366f1;
}
.slide-emoji {
    font-size: 16rem;
    position: absolute;
    right: 60px;
    opacity: 0.15;
    animation: float 3s ease-in-out infinite;
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}
.swiper-pagination-bullet {
    background: white !important;
    opacity: 0.5;
    width: 10px;
    height: 10px;
}
.swiper-pagination-bullet-active {
    opacity: 1 !important;
    width: 30px;
    border-radius: 5px;
}

/* Section Title */
.section-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1e1b4b;
    position: relative;
    display: inline-block;
    margin-bottom: 8px;
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #f97316, #ef4444);
    border-radius: 2px;
}

/* Product Cards */
.product-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    background: white;
}
.product-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}
.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.4s;
}
.product-card:hover img { transform: scale(1.05); }
.product-card .no-image {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, #fff7ed, #fed7aa);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
}
.product-card .card-body { padding: 20px; }
.product-card .card-title {
    font-weight: 700;
    font-size: 1rem;
    color: #1e1b4b;
    margin-bottom: 6px;
}
.product-price {
    font-size: 1.3rem;
    font-weight: 800;
    background: linear-gradient(90deg, #f97316, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.btn-add-cart {
    background: linear-gradient(135deg, #f97316, #ef4444);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 24px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(249,115,22,0.4);
}
.btn-add-cart:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(249,115,22,0.5);
    color: white;
}

/* Features Section */
.feature-card {
    background: white;
    border-radius: 20px;
    padding: 36px 24px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    transition: all 0.3s;
    border-bottom: 4px solid transparent;
}
.feature-card:hover {
    transform: translateY(-6px);
    border-bottom-color: #f97316;
}
.feature-icon {
    font-size: 2.8rem;
    margin-bottom: 16px;
    display: block;
}
.feature-card h5 {
    font-weight: 700;
    color: #1e1b4b;
    margin-bottom: 8px;
}
.feature-card p {
    color: #6b7280;
    font-size: 0.9rem;
    margin: 0;
}

/* Promo Banner */
.promo-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 24px;
    padding: 60px 48px;
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.promo-banner::before {
    content: '🛒';
    position: absolute;
    font-size: 20rem;
    opacity: 0.05;
    right: -50px;
    top: -50px;
}
.promo-banner h2 {
    font-weight: 800;
    font-size: 2.5rem;
}
.btn-white {
    background: white;
    color: #6366f1;
    border: none;
    border-radius: 50px;
    padding: 14px 40px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    margin-top: 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}
.btn-white:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
    color: #6366f1;
}
</style>
@endpush

{{-- HERO SLIDER --}}
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-1">
            <div class="slide-content">
                <h1>Fresh Deals,<br>Every Day 🔥</h1>
                <p>Discover amazing products at unbeatable prices.<br>Shop smarter with Zyvora.</p>
                <a href="{{ route('products.index') }}" class="btn-slider">
                    Shop Now <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="slide-emoji">🛍️</div>
        </div>
        <div class="swiper-slide slide-2">
            <div class="slide-content">
                <h1>Top Quality<br>Products ⭐</h1>
                <p>Handpicked items from trusted sellers.<br>Quality you can count on.</p>
                <a href="{{ route('products.index') }}" class="btn-slider">
                    Explore <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="slide-emoji">✨</div>
        </div>
        <div class="swiper-slide slide-3">
            <div class="slide-content">
                <h1>Fast & Secure<br>Checkout 🚀</h1>
                <p>Easy ordering process with secure payment.<br>Delivered right to your door.</p>
                <a href="{{ route('register') }}" class="btn-slider">
                    Get Started <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="slide-emoji">🚀</div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

{{-- FEATURES --}}
<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h5>Free Delivery</h5>
                <p>On all orders above Rs. 2000</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h5>Secure Payment</h5>
                <p>100% secure transactions</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <div class="feature-icon">↩️</div>
                <h5>Easy Returns</h5>
                <p>7 day return policy</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h5>24/7 Support</h5>
                <p>Always here to help you</p>
            </div>
        </div>
    </div>
</div>

{{-- FEATURED PRODUCTS --}}
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="section-title">Featured Products</h2>
            <p class="text-muted mt-3">Handpicked just for you</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn-primary-custom">
            View All <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>

    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="product-card">
                        @if($product->image)
    @if(str_starts_with($product->image, 'http'))
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    @else
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    @endif
@else
    <div class="no-image">🛍️</div>
@endif
                        <div class="card-body">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="text-muted small mb-2">{{ Str::limit($product->description, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rs. {{ number_format($product->price, 0) }}</span>
                                <a href="{{ route('products.show', $product->id) }}" class="btn-add-cart">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div style="font-size: 4rem;">🛍️</div>
            <h4 class="text-muted mt-3">No products yet</h4>
            <p class="text-muted">Check back soon!</p>
        </div>
    @endif
</div>

{{-- PROMO BANNER --}}
<div class="container my-5">
    <div class="promo-banner">
        <h2>Ready to Start Shopping? 🛒</h2>
        <p style="font-size: 1.1rem; opacity: 0.9;">
            Join thousands of happy customers on Zyvora
        </p>
        <a href="{{ route('products.index') }}" class="btn-white">
            Browse All Products
        </a>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    new Swiper('.swiper', {
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
    });
</script>
@endpush

@endsection