@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 48px 0;
        margin-bottom: 40px;
    }
    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
    }
    .page-header p { color: rgba(255,255,255,0.85); }

    .cart-table {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }
    .cart-table th {
        background: #f8fafc;
        color: #374151;
        font-weight: 700;
        padding: 18px 20px;
        border: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .cart-table td {
        padding: 20px;
        vertical-align: middle;
        border-color: #f1f5f9;
    }
    .cart-table tr:hover td { background: #fff7ed; }

    .product-thumb {
        width: 70px;
        height: 70px;
        border-radius: 14px;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .product-thumb-placeholder {
        width: 70px;
        height: 70px;
        border-radius: 14px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }

    .cart-summary {
        background: white;
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        position: sticky;
        top: 80px;
    }

    .summary-title {
        font-weight: 800;
        color: #1e1b4b;
        font-size: 1.2rem;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f1f5f9;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        font-size: 0.95rem;
    }

    .btn-checkout {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 40px;
        font-size: 1rem;
        font-weight: 700;
        transition: all 0.3s;
        text-decoration: none;
        display: block;
        text-align: center;
        box-shadow: 0 8px 25px rgba(249,115,22,0.4);
    }
    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(249,115,22,0.5);
        color: white;
    }

    .btn-remove {
        background: #fef2f2;
        color: #991b1b;
        border: none;
        border-radius: 20px;
        padding: 6px 16px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.2s;
        cursor: pointer;
    }
    .btn-remove:hover {
        background: #991b1b;
        color: white;
        transform: scale(1.05);
    }

    .qty-badge {
        background: linear-gradient(135deg, #ede9fe, #ddd6fe);
        color: #6366f1;
        padding: 6px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .empty-cart {
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
        <h1>🛒 Your Cart</h1>
        <p class="mb-0">Review your items before checkout</p>
    </div>
</div>

<div class="container mb-5">
    @if(count($cart) > 0)
        <div class="row g-4">

            {{-- CART ITEMS --}}
            <div class="col-md-8">
                <div class="cart-table">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if(isset($item['image']) && $item['image'])
                                                @if(str_starts_with($item['image'], 'http'))
                                                    <img src="{{ $item['image'] }}" class="product-thumb">
                                                @else
                                                    <img src="{{ asset('storage/' . $item['image']) }}" class="product-thumb">
                                                @endif
                                            @else
                                                <div class="product-thumb-placeholder">🛍️</div>
                                            @endif
                                            <div>
                                                <span style="font-weight:700; color:#1e1b4b; font-size:0.95rem;">
                                                    {{ $item['name'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color:#6b7280; font-weight:500;">
                                        Rs. {{ number_format($item['price'], 0) }}
                                    </td>
                                    <td>
                                        <span class="qty-badge">{{ $item['quantity'] }}</span>
                                    </td>
                                    <td style="font-weight:800; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
                                        Rs. {{ number_format($item['price'] * $item['quantity'], 0) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-remove">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="{{ route('products.index') }}"
                       style="color:#6366f1; font-weight:600; text-decoration:none;">
                        ← Continue Shopping
                    </a>
                </div>
            </div>

            {{-- ORDER SUMMARY --}}
            <div class="col-md-4">
                <div class="cart-summary">
                    <div class="summary-title">🧾 Order Summary</div>

                    @php
                        $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart));
                        $itemCount = array_sum(array_column($cart, 'quantity'));
                    @endphp

                    <div class="summary-row">
                        <span class="text-muted">Items ({{ $itemCount }})</span>
                        <span style="font-weight:600;">Rs. {{ number_format($total, 0) }}</span>
                    </div>
                    <div class="summary-row">
                        <span class="text-muted">Delivery</span>
                        <span style="color:#065f46; font-weight:700;">
                            {{ $total >= 2000 ? 'Free' : 'Rs. 200' }}
                        </span>
                    </div>

                    <hr style="border-color:#f1f5f9; margin: 16px 0;">

                    <div class="summary-row mb-4">
                        <span style="font-weight:800; color:#1e1b4b; font-size:1.1rem;">Total</span>
                        <span style="font-weight:800; font-size:1.4rem; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
                            Rs. {{ number_format($total >= 2000 ? $total : $total + 200, 0) }}
                        </span>
                    </div>

                    @if($total < 2000)
                        <div style="background:#fff7ed; border-radius:12px; padding:12px 16px; margin-bottom:16px; font-size:0.85rem; color:#92400e;">
                            🚚 Add Rs. {{ number_format(2000 - $total, 0) }} more for <strong>Free Delivery!</strong>
                        </div>
                    @else
                        <div style="background:#ecfdf5; border-radius:12px; padding:12px 16px; margin-bottom:16px; font-size:0.85rem; color:#065f46;">
                            🎉 <strong>You qualify for Free Delivery!</strong>
                        </div>
                    @endif

                    <a href="{{ route('checkout.index') }}" class="btn-checkout">
                        Proceed to Checkout →
                    </a>
                </div>
            </div>

        </div>
    @else
        <div class="empty-cart">
            <div style="font-size:6rem; margin-bottom:20px;">🛒</div>
            <h3 style="font-weight:800; color:#1e1b4b;">Your cart is empty!</h3>
            <p class="text-muted mt-2 mb-4">Looks like you haven't added anything yet.</p>
            <a href="{{ route('products.index') }}"
               style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:50px; padding:14px 40px; font-weight:700; text-decoration:none; box-shadow:0 8px 25px rgba(249,115,22,0.4);">
                Browse Products
            </a>
        </div>
    @endif
</div>

@endsection