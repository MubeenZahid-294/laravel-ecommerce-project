@extends('layouts.app')

@push('styles')
<style>
    .breadcrumb-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 16px 0;
    }
    .breadcrumb-item a { color: rgba(255,255,255,0.8); text-decoration: none; }
    .breadcrumb-item.active { color: white; }
    .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.5); }

    .product-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        transition: transform 0.4s;
    }
    .product-image:hover { transform: scale(1.02); }

    .no-image-large {
        width: 100%;
        height: 450px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8rem;
    }

    .product-detail-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }

    .product-category-badge {
        background: linear-gradient(135deg, #ede9fe, #ddd6fe);
        color: #6366f1;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 16px;
    }

    .product-name {
        font-size: 2rem;
        font-weight: 800;
        color: #1e1b4b;
        line-height: 1.3;
    }

    .product-price-large {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #f97316, #ef4444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 16px 0;
    }

    .product-description {
        color: #6b7280;
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 24px;
    }

    .info-row {
        background: #f8fafc;
        border-radius: 14px;
        padding: 16px 20px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .info-label { font-weight: 600; color: #374151; }

    .btn-add-cart-large {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 48px;
        font-size: 1.1rem;
        font-weight: 700;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 8px 25px rgba(249,115,22,0.4);
    }
    .btn-add-cart-large:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(249,115,22,0.5);
        color: white;
    }

    .btn-outline-back {
        border: 2px solid #e5e7eb;
        color: #374151;
        border-radius: 50px;
        padding: 16px 48px;
        font-size: 1.1rem;
        font-weight: 700;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-outline-back:hover {
        background: #1e1b4b;
        color: white;
        border-color: #1e1b4b;
        transform: translateY(-3px);
    }

    .related-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        background: white;
    }
    .related-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }
    .related-card img { width: 100%; height: 180px; object-fit: cover; }
    .related-no-image {
        width: 100%;
        height: 180px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }

    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        gap: 4px;
    }
    .star-rating input { display: none; }
    .star-rating label {
        font-size: 2rem;
        color: #d1d5db;
        cursor: pointer;
        transition: color 0.2s;
    }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f59e0b;
    }
</style>
@endpush

@section('content')

{{-- BREADCRUMB --}}
<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index', ['category' => $product->category]) }}">
                        {{ $product->category }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

{{-- MAIN CONTENT --}}
<div class="container my-5">

    {{-- PRODUCT DETAIL --}}
    <div class="row g-5">

        {{-- PRODUCT IMAGE --}}
        <div class="col-md-6">
            @if($product->image)
                @if(str_starts_with($product->image, 'http'))
                    <img src="{{ $product->image }}"
                         alt="{{ $product->name }}"
                         class="product-image">
                @else
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="product-image">
                @endif
            @else
                <div class="no-image-large">🛍️</div>
            @endif
        </div>

        {{-- PRODUCT DETAILS --}}
        <div class="col-md-6">
            <div class="product-detail-card">
                <span class="product-category-badge">
                    {{ $product->category }}
                </span>

                <h1 class="product-name">{{ $product->name }}</h1>

                <div class="product-price-large">
                    Rs. {{ number_format($product->price, 0) }}
                </div>

                <p class="product-description">{{ $product->description }}</p>

                <div class="info-row">
                    <span class="info-label">📦 Availability</span>
                    @if($product->stock > 0)
                        <span style="color:#065f46; font-weight:700; background:#ecfdf5; padding:6px 16px; border-radius:20px;">
                            ✅ In Stock ({{ $product->stock }} left)
                        </span>
                    @else
                        <span style="color:#991b1b; font-weight:700; background:#fef2f2; padding:6px 16px; border-radius:20px;">
                            ❌ Out of Stock
                        </span>
                    @endif
                </div>

                <div class="info-row">
                    <span class="info-label">🚚 Delivery</span>
                    <span style="color:#065f46; font-weight:600;">Free on orders above Rs. 2000</span>
                </div>

                <div class="info-row">
                    <span class="info-label">↩️ Returns</span>
                    <span style="color:#374151; font-weight:600;">7 day easy return policy</span>
                </div>

                <div class="mt-4 d-flex gap-3 flex-wrap">

                    {{-- WISHLIST BUTTON --}}
                    @auth
                        <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
                            @csrf
                            @php
                                $inWishlist = App\Models\Wishlist::where('user_id', auth()->id())
                                    ->where('product_id', $product->id)
                                    ->exists();
                            @endphp
                            <button type="submit"
                                    style="background:{{ $inWishlist ? 'linear-gradient(135deg,#ef4444,#dc2626)' : 'white' }}; color:{{ $inWishlist ? 'white' : '#ef4444' }}; border:2px solid #ef4444; border-radius:50px; padding:16px 32px; font-size:1rem; font-weight:700; cursor:pointer; transition:all 0.3s;">
                                {{ $inWishlist ? '❤️ Wishlisted' : '🤍 Add to Wishlist' }}
                            </button>
                        </form>
                    @endauth

                    {{-- ADD TO CART BUTTON --}}
                    @if($product->stock > 0)
                        @auth
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-add-cart-large">
                                    🛒 Add to Cart
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn-add-cart-large">
                                🔒 Login to Buy
                            </a>
                        @endauth
                    @endif

                    <a href="{{ route('products.index') }}" class="btn-outline-back">
                        ← Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- RELATED PRODUCTS --}}
    @php
        $related = App\Models\Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
    @endphp

    @if($related->count() > 0)
        <div class="mt-5">
            <h3 style="font-weight:800; color:#1e1b4b; margin-bottom:8px;">
                Related Products
            </h3>
            <div style="width:60px; height:4px; background:linear-gradient(90deg,#f97316,#ef4444); border-radius:2px; margin-bottom:32px;"></div>

            <div class="row g-4">
                @foreach($related as $item)
                    <div class="col-md-3">
                        <div class="related-card">
                            @if($item->image)
                                @if(str_starts_with($item->image, 'http'))
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
                                @else
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                @endif
                            @else
                                <div class="related-no-image">🛍️</div>
                            @endif
                            <div class="p-3">
                                <h6 style="font-weight:700; color:#1e1b4b; margin-bottom:6px;">
                                    {{ $item->name }}
                                </h6>
                                <div style="font-weight:800; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent; margin-bottom:12px;">
                                    Rs. {{ number_format($item->price, 0) }}
                                </div>
                                <a href="{{ route('products.show', $item->id) }}"
                                   style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:25px; padding:8px 20px; font-size:0.85rem; font-weight:600; text-decoration:none; display:block; text-align:center;">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- REVIEWS SECTION --}}
    <div class="mt-5">
        <h3 style="font-weight:800; color:#1e1b4b; margin-bottom:8px;">
            ⭐ Customer Reviews
        </h3>
        <div style="width:60px; height:4px; background:linear-gradient(90deg,#f97316,#ef4444); border-radius:2px; margin-bottom:32px;"></div>

        <div class="row g-4">

            {{-- REVIEW FORM --}}
            <div class="col-md-4">
                <div style="background:white; border-radius:20px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.07);">
                    <h5 style="font-weight:800; color:#1e1b4b; margin-bottom:20px;">
                        Write a Review
                    </h5>

                    @auth
                        <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label style="font-weight:600; color:#374151; display:block; margin-bottom:8px;">
                                    Your Rating
                                </label>
                                <div class="star-rating">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}">
                                        <label for="star{{ $i }}">★</label>
                                    @endfor
                                </div>
                                @error('rating')
                                    <div style="color:#ef4444; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label style="font-weight:600; color:#374151; display:block; margin-bottom:8px;">
                                    Your Review
                                </label>
                                <textarea name="comment"
                                          style="border-radius:14px; border:2px solid #e5e7eb; padding:14px; width:100%; font-family:Poppins,sans-serif; resize:none; transition:all 0.3s;"
                                          rows="4"
                                          placeholder="Share your experience...">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <div style="color:#ef4444; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"
                                    style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border:none; border-radius:50px; padding:14px 32px; font-weight:700; width:100%; font-size:0.95rem; cursor:pointer; box-shadow:0 8px 25px rgba(249,115,22,0.4); transition:all 0.3s;">
                                Submit Review ⭐
                            </button>
                        </form>
                    @else
                        <div style="text-align:center; padding:20px;">
                            <div style="font-size:3rem; margin-bottom:12px;">🔒</div>
                            <p style="color:#6b7280; margin-bottom:16px;">Login to write a review</p>
                            <a href="{{ route('login') }}"
                               style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:50px; padding:12px 28px; font-weight:700; text-decoration:none;">
                                Login
                            </a>
                        </div>
                    @endauth
                </div>

                {{-- RATING SUMMARY --}}
                @php
                    $avgRating = $product->averageRating();
                    $totalReviews = $product->reviews()->count();
                @endphp
                @if($totalReviews > 0)
                    <div style="background:white; border-radius:20px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.07); margin-top:16px; text-align:center;">
                        <div style="font-size:3rem; font-weight:800; color:#1e1b4b;">
                            {{ number_format($avgRating, 1) }}
                        </div>
                        <div style="color:#f59e0b; font-size:1.5rem; margin:8px 0;">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= round($avgRating) ? '★' : '☆' }}
                            @endfor
                        </div>
                        <div style="color:#6b7280; font-size:0.9rem;">
                            Based on {{ $totalReviews }} review{{ $totalReviews > 1 ? 's' : '' }}
                        </div>
                    </div>
                @endif
            </div>

            {{-- REVIEWS LIST --}}
            <div class="col-md-8">
                @php $reviews = $product->reviews()->with('user')->latest()->get(); @endphp

                @if($reviews->count() > 0)
                    @foreach($reviews as $review)
                        <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 15px rgba(0,0,0,0.06); margin-bottom:16px;">
                            <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div style="width:44px; height:44px; background:linear-gradient(135deg,#f97316,#ef4444); border-radius:50%; display:flex; align-items:center; justify-content:center; color:white; font-weight:800; font-size:1.1rem;">
                                        {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:700; color:#1e1b4b;">
                                            {{ $review->user->name }}
                                        </div>
                                        <div style="color:#6b7280; font-size:0.8rem;">
                                            {{ $review->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div style="color:#f59e0b; font-size:1.2rem;">
                                    @for($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '★' : '☆' }}
                                    @endfor
                                </div>
                            </div>
                            <p style="color:#374151; margin:0; line-height:1.7;">
                                {{ $review->comment }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <div style="background:white; border-radius:16px; padding:40px; box-shadow:0 4px 15px rgba(0,0,0,0.06); text-align:center;">
                        <div style="font-size:3rem; margin-bottom:12px;">⭐</div>
                        <h5 style="font-weight:700; color:#1e1b4b;">No reviews yet</h5>
                        <p style="color:#6b7280;">Be the first to review this product!</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

</div>

@endsection