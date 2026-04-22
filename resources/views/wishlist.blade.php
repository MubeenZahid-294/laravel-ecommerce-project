@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        padding: 60px 0;
        margin-bottom: 40px;
    }
    .page-header h1 { font-size: 2.8rem; font-weight: 800; color: white; }
    .page-header p { color: rgba(255,255,255,0.85); }

    .wishlist-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: all 0.3s;
    }
    .wishlist-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }
    .wishlist-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .wishlist-card:hover img { transform: scale(1.05); }
    .no-image {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }
    .empty-wishlist {
        text-align: center;
        padding: 80px 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <div class="container">
        <h1>❤️ My Wishlist</h1>
        <p class="mb-0">Your saved favourite products</p>
    </div>
</div>

<div class="container mb-5">
    @if($wishlist->count() > 0)
        <div class="row g-4">
            @foreach($wishlist as $item)
                <div class="col-md-3">
                    <div class="wishlist-card">
                        @if($item->product->image)
                            @if(str_starts_with($item->product->image, 'http'))
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}">
                            @else
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                            @endif
                        @else
                            <div class="no-image">🛍️</div>
                        @endif

                        <div class="p-3">
                            <h6 style="font-weight:700; color:#1e1b4b; margin-bottom:6px;">
                                {{ $item->product->name }}
                            </h6>
                            <div style="font-weight:800; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent; margin-bottom:12px;">
                                Rs. {{ number_format($item->product->price, 0) }}
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('products.show', $item->product->id) }}"
                                   style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:25px; padding:8px 16px; font-size:0.8rem; font-weight:600; text-decoration:none; flex:1; text-align:center;">
                                    View
                                </a>
                                <form action="{{ route('wishlist.remove', $item->product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background:#fef2f2; color:#991b1b; border:none; border-radius:25px; padding:8px 16px; font-size:0.8rem; font-weight:600; cursor:pointer; transition:all 0.2s;">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-wishlist">
            <div style="font-size:5rem;">❤️</div>
            <h3 style="font-weight:800; color:#1e1b4b; margin-top:20px;">
                Your Wishlist is Empty!
            </h3>
            <p class="text-muted mt-2 mb-4">
                Save your favourite products here!
            </p>
            <a href="{{ route('products.index') }}"
               style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:50px; padding:14px 40px; font-weight:700; text-decoration:none; box-shadow:0 8px 25px rgba(249,115,22,0.4);">
                Browse Products
            </a>
        </div>
    @endif
</div>

@endsection