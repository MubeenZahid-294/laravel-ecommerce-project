@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #06b6d4 0%, #6366f1 100%);
        padding: 60px 0;
        margin-bottom: 40px;
    }
    .page-header h1 { font-size: 2.8rem; font-weight: 800; color: white; }
    .page-header p { color: rgba(255,255,255,0.85); }

    .order-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        margin-bottom: 24px;
        transition: all 0.3s;
    }
    .order-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }

    .order-header {
        background: #f8fafc;
        padding: 20px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #f1f5f9;
    }

    .order-id {
        font-weight: 800;
        color: #1e1b4b;
        font-size: 1.1rem;
    }

    .order-date {
        color: #6b7280;
        font-size: 0.85rem;
        margin-top: 4px;
    }

    .order-body { padding: 24px 28px; }

    .order-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .order-item:last-child { border-bottom: none; }

    .order-item-img {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .order-item-placeholder {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .order-footer {
        background: #f8fafc;
        padding: 16px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 2px solid #f1f5f9;
    }

    .order-total {
        font-weight: 800;
        font-size: 1.2rem;
        background: linear-gradient(90deg, #f97316, #ef4444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .empty-orders {
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
        <h1>📦 My Orders</h1>
        <p class="mb-0">Track and manage your orders</p>
    </div>
</div>

<div class="container mb-5">
    @if($orders->count() > 0)
        @foreach($orders as $order)
            <div class="order-card">

                {{-- ORDER HEADER --}}
                <div class="order-header">
                    <div>
                        <div class="order-id">Order #{{ $order->id }}</div>
                        <div class="order-date">
                            {{ $order->created_at->format('M d, Y - h:i A') }}
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        @php
                            $colors = [
                                'pending'    => ['bg'=>'#fff7ed','color'=>'#92400e'],
                                'processing' => ['bg'=>'#ede9fe','color'=>'#5b21b6'],
                                'shipped'    => ['bg'=>'#ecfdf5','color'=>'#065f46'],
                                'delivered'  => ['bg'=>'#d1fae5','color'=>'#064e3b'],
                                'cancelled'  => ['bg'=>'#fef2f2','color'=>'#991b1b'],
                            ];
                            $c = $colors[$order->status] ?? ['bg'=>'#f3f4f6','color'=>'#374151'];
                        @endphp
                        <span style="background:{{ $c['bg'] }}; color:{{ $c['color'] }}; padding:8px 20px; border-radius:20px; font-size:0.85rem; font-weight:700;">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                {{-- ORDER ITEMS --}}
                <div class="order-body">
                    @foreach($order->items as $item)
                        <div class="order-item">
                            @if($item->product && $item->product->image)
                                @if(str_starts_with($item->product->image, 'http'))
                                    <img src="{{ $item->product->image }}" class="order-item-img">
                                @else
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="order-item-img">
                                @endif
                            @else
                                <div class="order-item-placeholder">🛍️</div>
                            @endif
                            <div style="flex:1;">
                                <div style="font-weight:700; color:#1e1b4b;">
                                    {{ $item->product ? $item->product->name : 'Product Deleted' }}
                                </div>
                                <div style="color:#6b7280; font-size:0.85rem; margin-top:4px;">
                                    Qty: {{ $item->quantity }} ×
                                    Rs. {{ number_format($item->price, 0) }}
                                </div>
                            </div>
                            <div style="font-weight:800; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
                                Rs. {{ number_format($item->price * $item->quantity, 0) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- ORDER FOOTER --}}
                <div class="order-footer">
                    <div>
                        <span style="color:#6b7280; font-size:0.85rem;">Delivery Address:</span>
                        <span style="font-weight:600; color:#374151; margin-left:8px; font-size:0.85rem;">
                            {{ $order->address }}
                        </span>
                    </div>
                    <div class="order-total">
                        Total: Rs. {{ number_format($order->total, 0) }}
                    </div>
                </div>

            </div>
        @endforeach
    @else
        <div class="empty-orders">
            <div style="font-size:5rem;">📦</div>
            <h3 style="font-weight:800; color:#1e1b4b; margin-top:20px;">
                No Orders Yet!
            </h3>
            <p class="text-muted mt-2 mb-4">
                You haven't placed any orders yet. Start shopping!
            </p>
            <a href="{{ route('products.index') }}"
               style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:50px; padding:14px 40px; font-weight:700; text-decoration:none; box-shadow:0 8px 25px rgba(249,115,22,0.4);">
                Browse Products
            </a>
        </div>
    @endif
</div>

@endsection