@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')

<div class="row g-4">

    {{-- MESSAGES TABLE --}}
    <div class="{{ $message ? 'col-md-6' : 'col-md-12' }}">
        <div class="admin-card">
            <h5 style="font-weight:700; color:#1e1b4b; margin-bottom:24px;">
                ✉️ All Messages
            </h5>

            <div class="table-responsive">
                <table id="contactTable" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- REPLY PANEL --}}
    @if($message)
        <div class="col-md-6">
            <div class="admin-card">
                <h5 style="font-weight:700; color:#1e1b4b; margin-bottom:20px;">
                    💬 Message & Reply
                </h5>

                {{-- USER MESSAGE --}}
                <div style="background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:20px;">
                    <div class="d-flex justify-content-between mb-2">
                        <strong style="color:#1e1b4b;">{{ $message->user->name }}</strong>
                        <small class="text-muted">
                            {{ $message->created_at->format('M d, Y') }}
                        </small>
                    </div>
                    <p style="font-weight:600; color:#374151; margin-bottom:8px;">
                        📌 {{ $message->subject }}
                    </p>
                    <p style="color:#6b7280; margin:0;">{{ $message->message }}</p>
                </div>

                {{-- PREVIOUS REPLY --}}
                @if($message->is_replied)
                    <div style="background:#ecfdf5; border-radius:12px; padding:20px; margin-bottom:20px;">
                        <p style="font-weight:600; color:#065f46; margin-bottom:8px;">
                            ✅ Previous Reply Sent:
                        </p>
                        <p style="color:#374151; margin:0;">{{ $message->admin_reply }}</p>
                    </div>
                @endif

                {{-- REPLY FORM --}}
                <form action="{{ route('admin.contact.reply', $message->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label style="font-weight:600; color:#374151;" class="form-label">
                            Your Reply
                        </label>
                        <textarea name="reply"
                                  class="form-control @error('reply') is-invalid @enderror"
                                  style="border-radius:10px; border:2px solid #e5e7eb; padding:12px 16px;"
                                  rows="5"
                                  placeholder="Type your reply here...">{{ old('reply', $message->admin_reply) }}</textarea>
                        @error('reply')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary-custom">
                        📨 Send Reply
                    </button>
                </form>
            </div>
        </div>
    @endif

</div>

@push('scripts')
<script>
$('#contactTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.contact.index') }}",
    columns: [
        { data: 'id', width: '5%' },
        { data: 'user_name' },
        { data: 'subject' },
        {
            data: 'is_replied',
            render: function(data) {
                if (data) {
                    return '<span style="background:#ecfdf5;color:#065f46;padding:4px 12px;border-radius:20px;font-size:0.8rem;font-weight:600;">Replied</span>';
                } else {
                    return '<span style="background:#fff7ed;color:#92400e;padding:4px 12px;border-radius:20px;font-size:0.8rem;font-weight:600;">Pending</span>';
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