@extends('layouts.admin')

@section('page-title', 'Customers')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 style="font-weight:700; color:#1e1b4b; margin:0;">👥 All Customers</h5>
    </div>

    <div class="table-responsive">
        <table id="usersTable" class="table table-hover w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
<script>
$('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.users.index') }}",
    columns: [
        { data: 'id', width: '5%' },
        { data: 'name' },
        { data: 'email' },
        { data: 'created_at' }
    ]
});
</script>
@endpush

@endsection