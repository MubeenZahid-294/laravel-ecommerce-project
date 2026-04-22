@extends('layouts.admin')

@section('page-title', 'Add Product')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="admin-card">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="{{ route('admin.products.index') }}"
                   style="color:#6366f1; text-decoration:none; font-weight:600;">
                    ← Back
                </a>
                <h5 style="font-weight:700; color:#1e1b4b; margin:0;">
                    ➕ Add New Product
                </h5>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-600" style="font-weight:600;">Product Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                           value="{{ old('name') }}"
                           placeholder="Enter product name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-weight:600;">Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                              rows="4"
                              placeholder="Enter product description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="font-weight:600;">Price (Rs.)</label>
                        <input type="number"
                               name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                               value="{{ old('price') }}"
                               placeholder="0">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" style="font-weight:600;">Stock Quantity</label>
                        <input type="number"
                               name="stock"
                               class="form-control @error('stock') is-invalid @enderror"
                               style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                               value="{{ old('stock') }}"
                               placeholder="0">
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label" style="font-weight:600;">Product Image</label>
                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                           accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-primary-custom">
                    💾 Save Product
                </button>
            </form>
        </div>
    </div>
</div>

@endsection