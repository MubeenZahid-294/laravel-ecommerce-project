@extends('layouts.admin')

@section('page-title', 'Orders')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 style="font-weight:700; color:#1e1b4b; margin:0;">📦 All Orders</h5>
    </div>

    <div class="table-responsive">
        <table id="ordersTable" class="table table-hover w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
<script>
$('#ordersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
        { data: 'id', width: '5%' },
        { data: 'user_name' },
        {
            data: 'total',
            render: function(data) {
                return 'Rs. ' + parseInt(data).toLocaleString();
            }
        },
        {
            data: 'status',
            render: function(data) {
                const colors = {
                    pending:    { bg: '#fff7ed',  color: '#92400e' },
                    processing: { bg: '#ede9fe',  color: '#5b21b6' },
                    shipped:    { bg: '#ecfdf5',  color: '#065f46' },
                    delivered:  { bg: '#d1fae5',  color: '#064e3b' },
                    cancelled:  { bg: '#fef2f2',  color: '#991b1b' },
                };
                const c = colors[data] || { bg: '#f3f4f6', color: '#374151' };
                return `<span style="background:${c.bg};color:${c.color};padding:4px 12px;border-radius:20px;font-size:0.8rem;font-weight:600;">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
            }
        },
        { data: 'created_at' },
        { data: 'action', orderable: false, searchable: false }
    ]
});
</script>
@endpush

@endsection