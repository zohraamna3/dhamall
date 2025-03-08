<div id="personal-details" class="content-section {{ request('section') === 'profile' ? '' : 'd-none' }}">
    <div class="text-center mb-4">
        <h3 class="fw-bold rounded-1 p-2 pd-sm-3 p-md-4" style="background: #1a1a2e; color: #b3a31c;">Personal Information</h3>
    </div>

    <div class="text-center mb-4">
        <p class="fw-semibold">Hello, <span class="text-primary">{{ Auth::user()->name }}</span></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Email Address:</strong> <span class="text-muted">{{ Auth::user()->email }}</span></p>
            <p><strong>Phone Number:</strong> <span class="text-muted">{{ Auth::user()->phone ?? 'Not Set' }}</span></p>
        </div>
        <div class="col-md-6">
            <p><strong>Gender:</strong> <span class="text-muted">{{ Auth::user()->gender ?? 'Not Specified' }}</span></p>
            <p><strong>Date of Birth:</strong> <span class="text-muted">{{ Auth::user()->dob ?? 'Not Set' }}</span></p>
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
