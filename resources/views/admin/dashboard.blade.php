@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<!-- STAT CARDS -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff7ed;">🛍️</div>
            <div class="stat-info">
                <h3>{{ $totalProducts }}</h3>
                <p>Total Products</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#ede9fe;">📦</div>
            <div class="stat-info">
                <h3>{{ $totalOrders }}</h3>
                <p>Total Orders</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#ecfdf5;">👥</div>
            <div class="stat-info">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Customers</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef3c7;">✉️</div>
            <div class="stat-info">
                <h3>{{ $totalMessages }}</h3>
                <p>Total Messages</p>
            </div>
        </div>
    </div>
</div>

<!-- RECENT ORDERS -->
<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 style="font-weight:700; color:#1e1b4b; margin:0;">
            🕐 Recent Orders
        </h5>
        <a href="{{ route('admin.orders.index') }}" class="btn-primary-custom">
            View All
        </a>
    </div>

    @if($recentOrders->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="background:#f9fafb; padding:14px; border:none;">Order ID</th>
                        <th style="background:#f9fafb; padding:14px; border:none;">Customer</th>
                        <th style="background:#f9fafb; padding:14px; border:none;">Total</th>
                        <th style="background:#f9fafb; padding:14px; border:none;">Status</th>
                        <th style="background:#f9fafb; padding:14px; border:none;">Date</th>
                        <th style="background:#f9fafb; padding:14px; border:none;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr>
                            <td style="padding:14px; vertical-align:middle;">
                                <strong>#{{ $order->id }}</strong>
                            </td>
                            <td style="padding:14px; vertical-align:middle;">
                                {{ $order->user->name }}
                            </td>
                            <td style="padding:14px; vertical-align:middle; color:#f97316; font-weight:700;">
                                Rs. {{ number_format($order->total, 0) }}
                            </td>
                            <td style="padding:14px; vertical-align:middle;">
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
                                <span style="background:{{ $c['bg'] }}; color:{{ $c['color'] }}; padding:4px 12px; border-radius:20px; font-size:0.8rem; font-weight:600;">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td style="padding:14px; vertical-align:middle; color:#6b7280;">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>
                            <td style="padding:14px; vertical-align:middle;">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-edit">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-4">
            <div style="font-size:3rem;">📦</div>
            <p class="text-muted mt-2">No orders yet</p>
        </div>
    @endif
</div>

@endsection