@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="text-center py-5">
        <div style="font-size:6rem;">🎉</div>
        <h1 style="font-weight:700; color:#1e1b4b; margin-top:20px;">
            Order Placed Successfully!
        </h1>
        <p class="text-muted mt-3" style="font-size:1.1rem;">
            Thank you for shopping with Zyvora!<br>
            Your order has been received and is being processed.
        </p>

        <div style="background:#ecfdf5; border-radius:16px; padding:24px; max-width:400px; margin:32px auto;">
            <p style="color:#065f46; font-weight:600; margin:0;">
                ✅ You will receive your order soon!
            </p>
        </div>

        <div class="d-flex gap-3 justify-content-center mt-4">
            <a href="{{ route('products.index') }}"
               style="background:#f97316; color:white; border-radius:25px; padding:12px 32px; font-weight:600; text-decoration:none;">
                Continue Shopping
            </a>
            <a href="{{ route('home') }}"
               style="background:#6366f1; color:white; border-radius:25px; padding:12px 32px; font-weight:600; text-decoration:none;">
                Go Home
            </a>
        </div>
    </div>
</div>

@endsection