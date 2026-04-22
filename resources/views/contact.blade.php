@extends('layouts.app')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 0;
        margin-bottom: 40px;
    }
    .page-header h1 { font-size: 2.8rem; font-weight: 800; color: white; }
    .page-header p { color: rgba(255,255,255,0.85); font-size: 1.1rem; }

    .contact-card {
        background: white;
        border-radius: 24px;
        padding: 44px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    }

    .section-heading {
        font-weight: 800;
        color: #1e1b4b;
        font-size: 1.3rem;
        margin-bottom: 28px;
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
    }
    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
    }
    .form-control[readonly] {
        background: #f8fafc;
        color: #6b7280;
    }

    .btn-send {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 16px 40px;
        font-size: 1rem;
        font-weight: 700;
        transition: all 0.3s;
        width: 100%;
        box-shadow: 0 8px 25px rgba(102,126,234,0.4);
    }
    .btn-send:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102,126,234,0.5);
        color: white;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: all 0.3s;
    }
    .info-card:hover {
        transform: translateX(6px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .info-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .info-card h6 {
        font-weight: 700;
        color: #1e1b4b;
        margin-bottom: 4px;
    }

    .info-card p {
        color: #6b7280;
        margin: 0;
        font-size: 0.9rem;
    }

    .login-prompt {
        background: white;
        border-radius: 24px;
        padding: 60px 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        text-align: center;
    }

    .login-prompt h4 {
        font-weight: 800;
        color: #1e1b4b;
        margin-top: 20px;
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <div class="container">
        <h1>📩 Contact Us</h1>
        <p class="mb-0">We would love to hear from you!</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">

        {{-- CONTACT FORM --}}
        <div class="col-md-7">
            @auth
                <div class="contact-card">
                    <div class="section-heading">
                        💬 Send us a Message
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Your Email</label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Subject <span style="color:#ef4444;">*</span>
                            </label>
                            <input type="text"
                                   name="subject"
                                   class="form-control @error('subject') is-invalid @enderror"
                                   placeholder="What is this about?"
                                   value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Message <span style="color:#ef4444;">*</span>
                            </label>
                            <textarea name="message"
                                      class="form-control @error('message') is-invalid @enderror"
                                      rows="6"
                                      placeholder="Write your message here...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn-send">
                            📨 Send Message
                        </button>
                    </form>
                </div>
            @else
                <div class="login-prompt">
                    <div style="font-size:5rem;">🔒</div>
                    <h4>Login Required</h4>
                    <p class="text-muted mt-2 mb-4">
                        You need to be logged in to send us a message.
                    </p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('login') }}"
                           style="background:linear-gradient(135deg,#f97316,#ef4444); color:white; border-radius:50px; padding:14px 36px; font-weight:700; text-decoration:none; box-shadow:0 8px 25px rgba(249,115,22,0.4);">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           style="background:linear-gradient(135deg,#667eea,#764ba2); color:white; border-radius:50px; padding:14px 36px; font-weight:700; text-decoration:none; box-shadow:0 8px 25px rgba(102,126,234,0.4);">
                            Register
                        </a>
                    </div>
                </div>
            @endauth
        </div>

        {{-- CONTACT INFO --}}
        <div class="col-md-5">
            <div class="info-card">
                <div class="info-icon" style="background:linear-gradient(135deg,#fff7ed,#fed7aa);">
                    📧
                </div>
                <div>
                    <h6>Email Us</h6>
                    <p>support@zyvora.com</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon" style="background:linear-gradient(135deg,#ecfdf5,#6ee7b7);">
                    📞
                </div>
                <div>
                    <h6>Call Us</h6>
                    <p>+92 300 0000000</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon" style="background:linear-gradient(135deg,#ede9fe,#c4b5fd);">
                    📍
                </div>
                <div>
                    <h6>Location</h6>
                    <p>Lahore, Pakistan</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon" style="background:linear-gradient(135deg,#fef3c7,#fcd34d);">
                    🕐
                </div>
                <div>
                    <h6>Working Hours</h6>
                    <p>Mon - Sat: 9am to 6pm</p>
                </div>
            </div>

            {{-- FAQ --}}
            <div style="background:white; border-radius:20px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.07); margin-top:16px;">
                <h6 style="font-weight:800; color:#1e1b4b; margin-bottom:20px;">
                    ❓ Quick FAQ
                </h6>
                <div style="margin-bottom:16px;">
                    <p style="font-weight:700; color:#374151; margin-bottom:4px; font-size:0.9rem;">
                        How long does delivery take?
                    </p>
                    <p style="color:#6b7280; font-size:0.85rem; margin:0;">
                        Usually 2-5 business days across Pakistan.
                    </p>
                </div>
                <div style="margin-bottom:16px;">
                    <p style="font-weight:700; color:#374151; margin-bottom:4px; font-size:0.9rem;">
                        Can I return a product?
                    </p>
                    <p style="color:#6b7280; font-size:0.85rem; margin:0;">
                        Yes! We have a 7 day easy return policy.
                    </p>
                </div>
                <div>
                    <p style="font-weight:700; color:#374151; margin-bottom:4px; font-size:0.9rem;">
                        Is Cash on Delivery available?
                    </p>
                    <p style="color:#6b7280; font-size:0.85rem; margin:0;">
                        Yes! We offer COD across all of Pakistan.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection