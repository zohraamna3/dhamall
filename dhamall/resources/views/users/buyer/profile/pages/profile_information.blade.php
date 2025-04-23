<div id="personal-details" class="content-section {{ request('section') === 'profile' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">Personal Information</h3>
    </div>

    <div class="text-center mb-4">
        <img src="{{ $user->getImageUrl() }}" class="rounded-circle" width="100" height="100" alt="Profile Image">
        <p class="fw-semibold mt-2">Hello, <span class="text-primary">{{ $user->Name }}</span></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Email Address:</strong> <span class="text-muted">{{ $user->EmailAddress }}</span></p>
            <p><strong>Phone Number:</strong> <span class="text-muted">{{ $user->PhoneNumber ?? 'Not Set' }}</span></p>
        </div>
        <div class="col-md-6">
            <p><strong>Gender:</strong> <span class="text-muted">{{ $user->Gender ?? 'Not Specified' }}</span></p>
            <p><strong>Date of Birth:</strong> <span class="text-muted">{{ $user->DateOfBirth ? $user->DateOfBirth->format('d M Y') : 'Not Set' }}</span></p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center w-100">
        <p class="mb-0"><strong>Password:</strong> ********</p>
        <button class="btn btn-sm btn-outline-primary">Change Password</button>
    </div>

    <div class="text-center mt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Sign Out</button>
        </form>
    </div>
</div>
