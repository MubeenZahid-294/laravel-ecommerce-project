@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 style="font-weight:700; color:#1e1b4b; margin:0;">🛍️ All Products</h5>
        <a href="{{ route('admin.products.create') }}" class="btn-primary-custom">
            + Add Product
        </a>
    </div>

    <div class="table-responsive">
        <table id="productsTable" class="table table-hover w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
<script>
$('#productsTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.products.index') }}",
    columns: [
        { data: 'id', width: '5%' },
        { data: 'name' },
        {
            data: 'price',
            render: function(data) {
                return 'Rs. ' + parseInt(data).toLocaleString();
            }
        },
        {
            data: 'stock',
            render: function(data) {
                if (data > 0) {
                    return '<span style="background:#ecfdf5;color:#065f46;padding:4px 10px;border-radius:20px;font-size:0.8rem;font-weight:600;">' + data + ' left</span>';
                } else {
                    return '<span style="background:#fef2f2;color:#991b1b;padding:4px 10px;border-radius:20px;font-size:0.8rem;font-weight:600;">Out of stock</span>';
                }
            }
        },
        { data: 'created_at' },
        { data: 'action', orderable: false, searchable: false }
    ]
});
</script>
@endpush

@endsection