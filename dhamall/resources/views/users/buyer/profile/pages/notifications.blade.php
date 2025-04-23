<div id="notifications" class="content-section {{ request('section') === 'notifications' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">Notifications</h3>
    </div>

    @if ($notifications->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-bell fa-3x text-muted"></i>
            <p class="text-muted mt-3">No notifications found.</p>
        </div>
    @else
        <div class="list-group">
            @foreach ($notifications as $notification)
                <div class="list-group-item mb-2 {{ $notification->Status == 'Unread' ? 'bg-light' : '' }}">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="mb-1">{{ $notification->Type }}</h5>
                            <p class="mb-1">{{ $notification->Text }}</p>
                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        @if($notification->Status == 'Unread')
                            <button class="btn btn-sm btn-success mark-as-read" data-id="{{ $notification->id }}">
                                <i class="fas fa-check"></i> Mark as Read
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.mark-as-read').forEach(button => {
            button.addEventListener('click', function() {
                const notificationId = this.getAttribute('data-id');
                fetch(`/notifications/${notificationId}/mark-as-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            this.closest('.list-group-item').classList.remove('bg-light');
                            this.remove();
                        }
                    });
            });
        });
    });
</script>
