@extends('layouts.admin')

@section('page-title', 'Order Detail')

@section('content')

<div class="row g-4">

    {{-- ORDER INFO --}}
    <div class="col-md-8">
        <div class="admin-card mb-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="{{ route('admin.orders.index') }}"
                   style="color:#6366f1; text-decoration:none; font-weight:600;">
                    ← Back
                </a>
                <h5 style="font-weight:700; color:#1e1b4b; margin:0;">
                    📦 Order #{{ $order->id }}
                </h5>
            </div>

            {{-- ORDER ITEMS --}}
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="background:#f9fafb; padding:14px; border:none;">Product</th>
                            <th style="background:#f9fafb; padding:14px; border:none;">Price</th>
                            <th style="background:#f9fafb; padding:14px; border:none;">Qty</th>
                            <th style="background:#f9fafb; padding:14px; border:none;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td style="padding:14px; vertical-align:middle;">
                                    <div class="d-flex align-items-center gap-3">
                                        @if($item->product->image)
    @if(str_starts_with($item->product->image, 'http'))
        <img src="{{ $item->product->image }}"
             style="width:50px; height:50px; object-fit:cover; border-radius:10px;">
    @else
        <img src="{{ asset('storage/' . $item->product->image) }}"
             style="width:50px; height:50px; object-fit:cover; border-radius:10px;">
    @endif
@else
    <div style="width:50px; height:50px; background:#fff7ed; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">🛍️</div>
@endif
                                        <span style="font-weight:600; color:#1e1b4b;">
                                            {{ $item->product->name }}
                                        </span>
                                    </div>
                                </td>
                                <td style="padding:14px; vertical-align:middle;">
                                    Rs. {{ number_format($item->price, 0) }}
                                </td>
                                <td style="padding:14px; vertical-align:middle;">
                                    <span style="background:#f3f4f6; padding:4px 12px; border-radius:20px; font-weight:600;">
                                        {{ $item->quantity }}
                                    </span>
                                </td>
                                <td style="padding:14px; vertical-align:middle; color:#f97316; font-weight:700;">
                                    Rs. {{ number_format($item->price * $item->quantity, 0) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"
                                style="padding:14px; text-align:right; font-weight:700; color:#1e1b4b;">
                                Total
                            </td>
                            <td style="padding:14px; font-weight:700; color:#f97316; font-size:1.1rem;">
                                Rs. {{ number_format($order->total, 0) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    {{-- ORDER SIDEBAR --}}
    <div class="col-md-4">

        {{-- CUSTOMER INFO --}}
        <div class="admin-card mb-4">
            <h6 style="font-weight:700; color:#1e1b4b; margin-bottom:16px;">
                👤 Customer Info
            </h6>
            <div style="background:#f9fafb; border-radius:12px; padding:16px;">
                <p class="mb-1">
                    <strong>Name:</strong> {{ $order->user->name }}
                </p>
                <p class="mb-1">
                    <strong>Email:</strong> {{ $order->user->email }}
                </p>
                <p class="mb-0">
                    <strong>Address:</strong> {{ $order->address }}
                </p>
            </div>
        </div>

        {{-- UPDATE STATUS --}}
        <div class="admin-card">
            <h6 style="font-weight:700; color:#1e1b4b; margin-bottom:16px;">
                🔄 Update Status
            </h6>

            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <select name="status"
                        class="form-control mb-3"
                        style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;">
                    @foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
                        <option value="{{ $status }}"
                            {{ $order->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-primary-custom w-100 text-center">
                    💾 Update Status
                </button>
            </form>
        </div>

    </div>
</div>

@endsection