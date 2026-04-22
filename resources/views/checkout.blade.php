@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #06b6d4 0%, #6366f1 100%);
        padding: 48px 0;
        margin-bottom: 40px;
    }
    .page-header h1 { font-size: 2.5rem; font-weight: 800; color: white; }
    .page-header p { color: rgba(255,255,255,0.85); }

    .checkout-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }

    .section-heading {
        font-weight: 800;
        color: #1e1b4b;
        font-size: 1.2rem;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f1f5f9;
    }

    .form-label { font-weight: 600; color: #374151; margin-bottom: 8px; }

    .form-control {
        border-radius: 14px;
        border: 2px solid #e5e7eb;
        padding: 14px 18px;
        transition: all 0.3s;
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
    }
    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
    }
    .form-control[readonly] {
        background: #f8fafc;
        color: #6b7280;
    }

    .payment-badge {
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .payment-badge span {
        font-weight: 700;
        color: #92400e;
        font-size: 1rem;
    }

    .btn-place-order {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 40px;
        font-size: 1.1rem;
        font-weight: 700;
        transition: all 0.3s;
        width: 100%;
        box-shadow: 0 8px 25px rgba(249,115,22,0.4);
    }
    .btn-place-order:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(249,115,22,0.5);
        color: white;
    }

    .order-summary-card {
        background: white;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        position: sticky;
        top: 80px;
    }

    .summary-item {
        background: #f8fafc;
        border-radius: 14px;
        padding: 16px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .summary-item-name {
        font-weight: 700;
        color: #1e1b4b;
        font-size: 0.9rem;
    }

    .summary-item-qty {
        color: #6b7280;
        font-size: 0.8rem;
        margin-top: 2px;
    }

    .summary-item-price {
        font-weight: 800;
        background: linear-gradient(90deg, #f97316, #ef4444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .step-indicator {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 32px;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .step-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .step.done .step-circle {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .step.active .step-circle {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
    }

    .step-line {
        flex: 1;
        height: 2px;
        background: #e5e7eb;
        border-radius: 2px;
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <div class="container">
        <h1>💳 Checkout</h1>
        <p class="mb-0">Almost there! Complete your order</p>
    </div>
</div>

<div class="container mb-5">

    {{-- STEP INDICATOR --}}
    <div class="step-indicator mb-5">
        <div class="step done">
            <div class="step-circle">✓</div>
            <span style="color:#10b981;">Cart</span>
        </div>
        <div class="step-line"></div>
        <div class="step active">
            <div class="step-circle">2</div>
            <span style="color:#f97316;">Checkout</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-circle" style="background:#f1f5f9; color:#6b7280;">3</div>
            <span style="color:#6b7280;">Complete</span>
        </div>
    </div>

    <div class="row g-4">

        {{-- CHECKOUT FORM --}}
        <div class="col-md-7">
            <div class="checkout-card">
                <div class="section-heading">
                    📦 Delivery Information
                </div>

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text"
                               class="form-control"
                               value="{{ auth()->user()->name }}"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email"
                               class="form-control"
                               value="{{ auth()->user()->email }}"
                               readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Delivery Address <span style="color:#ef4444;">*</span>
                        </label>
                        <textarea name="address"
                                  class="form-control @error('address') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Enter your full delivery address including city and postal code...">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="payment-badge mb-4">
                        <span style="font-size:2rem;">💵</span>
                        <div>
                            <span>Cash on Delivery</span>
                            <p style="margin:0; color:#92400e; font-size:0.85rem; font-weight:500;">
                                Pay when your order arrives
                            </p>
                        </div>
                    </div>

                    <button type="submit" class="btn-place-order">
                        ✅ Place Order Now
                    </button>
                </form>
            </div>
        </div>

        {{-- ORDER SUMMARY --}}
        <div class="col-md-5">
            <div class="order-summary-card">
                <div class="section-heading">🧾 Order Summary</div>

                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <div class="summary-item">
                        <div>
                            <div class="summary-item-name">{{ $item['name'] }}</div>
                            <div class="summary-item-qty">Qty: {{ $item['quantity'] }}</div>
                        </div>
                        <div class="summary-item-price">
                            Rs. {{ number_format($item['price'] * $item['quantity'], 0) }}
                        </div>
                    </div>
                @endforeach

                <hr style="border-color:#f1f5f9; margin:20px 0;">

                <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                    <span class="text-muted">Subtotal</span>
                    <span style="font-weight:600;">Rs. {{ number_format($total, 0) }}</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
                    <span class="text-muted">Delivery</span>
                    <span style="color:#065f46; font-weight:700;">
                        {{ $total >= 2000 ? 'Free' : 'Rs. 200' }}
                    </span>
                </div>

                <hr style="border-color:#f1f5f9; margin:0 0 20px;">

                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-weight:800; color:#1e1b4b; font-size:1.1rem;">Total</span>
                    <span style="font-weight:800; font-size:1.5rem; background:linear-gradient(90deg,#f97316,#ef4444); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
                        Rs. {{ number_format($total >= 2000 ? $total : $total + 200, 0) }}
                    </span>
                </div>

                @if($total < 2000)
                    <div style="background:#fff7ed; border-radius:12px; padding:12px 16px; margin-top:16px; font-size:0.85rem; color:#92400e;">
                        🚚 Add Rs. {{ number_format(2000 - $total, 0) }} more for <strong>Free Delivery!</strong>
                    </div>
                @else
                    <div style="background:#ecfdf5; border-radius:12px; padding:12px 16px; margin-top:16px; font-size:0.85rem; color:#065f46;">
                        🎉 <strong>You qualify for Free Delivery!</strong>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection