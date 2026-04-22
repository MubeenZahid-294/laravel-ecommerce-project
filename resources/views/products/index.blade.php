@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%);
        padding: 48px 0;
        margin-bottom: 40px;
    }
    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e1b4b;
    }
    .product-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        background: white;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }
    .product-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .no-image {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }
    .product-price {
        font-size: 1.2rem;
        font-weight: 700;
        color: #f97316;
    }
    .btn-view {
        background: #f97316;
        color: white;
        border: none;
        border-radius: 25px;
        padding: 8px 20px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s;
        text-decoration: none;
    }
    .btn-view:hover {
        background: #ea580c;
        color: white;
        transform: translateY(-1px);
    }
    .stock-badge {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 20px;
    }
    .category-btn {
    padding: 8px 20px;
    border-radius: 25px;
    background: white;
    color: #374151;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.85rem;
    border: 2px solid #e5e7eb;
    transition: all 0.3s;
}
.category-btn:hover,
.category-btn.active {
    background: #f97316;
    color: white;
    border-color: #f97316;
}
.search-bar {
    background: white;
    border-radius: 50px;
    padding: 6px 6px 6px 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    display: flex;
    align-items: center;
    max-width: 500px;
    border: 2px solid #f3f4f6;
    transition: all 0.3s;
}
.search-bar:focus-within {
    border-color: #f97316;
    box-shadow: 0 4px 20px rgba(249,115,22,0.15);
}
.search-bar input {
    border: none;
    outline: none;
    flex: 1;
    font-size: 0.95rem;
    background: transparent;
    font-family: 'Poppins', sans-serif;
}
.search-bar button {
    background: linear-gradient(135deg, #f97316, #ef4444);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 10px 24px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s;
}
.search-bar button:hover {
    transform: scale(1.05);
}
.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 60px 0;
    margin-bottom: 40px;
}
.page-header h1 {
    font-size: 2.8rem;
    font-weight: 800;
    color: white;
}
.page-header p { color: rgba(255,255,255,0.85); }
.category-btn {
    padding: 10px 22px;
    border-radius: 50px;
    background: white;
    color: #374151;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    border: 2px solid #e5e7eb;
    transition: all 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.category-btn:hover,
.category-btn.active {
    background: linear-gradient(135deg, #f97316, #ef4444);
    color: white;
    border-color: transparent;
    box-shadow: 0 4px 15px rgba(249,115,22,0.4);
    transform: translateY(-2px);
}
.product-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    background: white;
    height: 100%;
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
.no-image {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, #fff7ed, #fed7aa);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
}
.product-price {
    font-size: 1.2rem;
    font-weight: 800;
    background: linear-gradient(90deg, #f97316, #ef4444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.btn-view {
    background: linear-gradient(135deg, #f97316, #ef4444);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 24px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s;
    text-decoration: none;
    display: block;
    text-align: center;
    box-shadow: 0 4px 15px rgba(249,115,22,0.3);
}
.btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(249,115,22,0.5);
    color: white;
}
.stock-badge {
    font-size: 0.75rem;
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 600;
}
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<div class="page-header">
    <div class="container">
        <h1>🛍️ All Products</h1>
        <p class="mb-4">Discover our wide range of quality products</p>
        <div class="search-bar">
            <input type="text"
                   id="searchInput"
                   placeholder="Search for products...">
            <button onclick="searchProducts()">
                🔍 Search
            </button>
        </div>
    </div>
</div>

{{-- CATEGORY FILTER --}}
<div class="container mb-4">
    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('products.index') }}"
           class="category-btn {{ !request('category') ? 'active' : '' }}">
            All
        </a>
        @foreach(['Fashion','Electronics','Sports','Home & Kitchen','Beauty','Books','Toys','Food & Drinks','Jewelry & Accessories','Hair Care'] as $cat)
            <a href="{{ route('products.index', ['category' => $cat]) }}"
               class="category-btn {{ request('category') == $cat ? 'active' : '' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>
</div>

{{-- PRODUCTS GRID --}}
<div class="container mb-5">
    @if($products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-4 col-lg-3">
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
                        <div class="p-3">
                            <h6 class="fw-600 mb-1" style="color:#1e1b4b; font-weight:600;">
                                {{ $product->name }}
                            </h6>
                            <p class="text-muted small mb-2">
                                {{ Str::limit($product->description, 60) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="product-price">Rs. {{ number_format($product->price, 0) }}</span>
                                @if($product->stock > 0)
                                    <span class="badge stock-badge" style="background:#ecfdf5; color:#065f46;">
                                        In Stock
                                    </span>
                                @else
                                    <span class="badge stock-badge" style="background:#fef2f2; color:#991b1b;">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn-view w-100 text-center d-block">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>

    @else
        <div class="text-center py-5">
            <div style="font-size: 5rem;">🛍️</div>
            <h3 class="text-muted mt-3">No Products Yet</h3>
            <p class="text-muted">Check back soon for amazing products!</p>
        </div>
    @endif
</div>
@push('scripts')
<script>
function searchProducts() {
    const query = document.getElementById('searchInput').value;
    window.location.href = '{{ route("products.index") }}?search=' + query;
}

document.getElementById('searchInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') searchProducts();
});
</script>
@endpush
@endsection