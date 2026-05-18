@extends('layouts.app')

@section('title', 'Applicant Dashboard - Ayurveda Health Revolution')

@section('content')
<div class="bg-light min-vh-100">
    <!-- Dashboard Header -->
    <section class="py-5 bg-success text-white shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="text-warning fw-bold text-uppercase small mb-2">Member Portal</h6>
                    <h1 class="fw-bold mb-1">Namaste, {{ auth()->user()->name }}</h1>
                    <p class="opacity-75 mb-0">Track your contribution to the Ayurveda Health Revolution.</p>
                </div>
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <a href="{{ route('career') }}" class="btn btn-warning rounded-pill px-4 shadow-sm fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> New Application
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Dashboard Content -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Left Column: Summary & Applications -->
                <div class="col-lg-8">
                    <!-- Stats Cards -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <div class="bg-white p-4 rounded-5 shadow-sm border-start border-success border-5">
                                <h6 class="text-muted small fw-bold text-uppercase mb-1">Applications</h6>
                                <h2 class="fw-bold mb-0 text-success">{{ $applications->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white p-4 rounded-5 shadow-sm border-start border-warning border-5">
                                <h6 class="text-muted small fw-bold text-uppercase mb-1">In Review</h6>
                                <h2 class="fw-bold mb-0 text-warning">{{ $applications->where('status', 'submitted')->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white p-4 rounded-5 shadow-sm border-start border-info border-5">
                                <h6 class="text-muted small fw-bold text-uppercase mb-1">KYC Status</h6>
                                <h2 class="fw-bold mb-0 text-info">Verified</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Application List -->
                    <h5 class="fw-bold mb-4 d-flex align-items-center gap-2">
                        <i class="bi bi-list-stars text-success"></i> Recent Applications
                    </h5>
                    @forelse($applications as $app)
                    <div class="bg-white p-4 rounded-5 shadow-sm mb-4 transition-hover border">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="badge bg-success-subtle text-success mb-2 rounded-pill px-3">{{ $app->application_no }}</div>
                                <h5 class="fw-bold mb-1">{{ $app->vacancy->post->name }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ $app->state->name }} @if($app->district) > {{ $app->district->name }} @endif 
                                    @if($app->village) > <span class="text-success fw-bold">{{ $app->village->name }}</span> @endif
                                </p>
                            </div>
                            <div class="col-md-3 text-md-center my-3 my-md-0">
                                <span class="badge rounded-pill px-3 py-2 
                                    @if($app->status == 'submitted') bg-info-subtle text-info 
                                    @elseif($app->status == 'approved') bg-success-subtle text-success 
                                    @elseif($app->status == 'rejected') bg-danger-subtle text-danger 
                                    @else bg-secondary-subtle text-secondary @endif">
                                    <i class="bi bi-dot"></i> {{ ucfirst($app->status) }}
                                </span>
                                <div class="mt-1 small text-muted">Status</div>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <div class="dropdown">
                                    <button class="btn btn-light rounded-pill border dropdown-toggle fw-bold small shadow-sm" type="button" data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                                        <li><a class="dropdown-item rounded-3" href="#"><i class="bi bi-file-earmark-text me-2"></i> View Form</a></li>
                                        <li><a class="dropdown-item rounded-3" href="#"><i class="bi bi-receipt me-2"></i> Payment Receipt</a></li>
                                        @if($app->status == 'draft')
                                        <li><a class="dropdown-item rounded-3 text-success" href="{{ route('apply.form', $app->vacancy_id) }}"><i class="bi bi-pencil me-2"></i> Resume App</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-5 bg-white rounded-5 shadow-sm border border-dashed">
                        <i class="bi bi-clipboard2-x display-4 text-muted opacity-25"></i>
                        <p class="text-muted mt-3">No applications found.</p>
                        <a href="{{ route('career') }}" class="btn btn-success rounded-pill px-4 mt-2 shadow-sm fw-bold">Start Applying</a>
                    </div>
                    @endforelse
                </div>

                <!-- Right Column: Profile & Community -->
                <div class="col-lg-4">
                    <!-- Profile Card -->
                    <div class="bg-white p-5 rounded-5 shadow-sm mb-4 text-center border-top border-success border-5">
                        <div class="position-relative d-inline-block mb-4">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg" style="width: 100px; height: 100px;">
                                <span class="fs-1 fw-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <span class="position-absolute bottom-0 end-0 bg-warning p-2 rounded-circle border border-4 border-white shadow-sm" title="Certified Member">
                                <i class="bi bi-patch-check-fill text-white"></i>
                            </span>
                        </div>
                        <h5 class="fw-bold mb-1">{{ auth()->user()->name }}</h5>
                        <p class="text-muted small mb-4">{{ auth()->user()->email }}</p>
                        
                        <div class="row g-2 border-top pt-4">
                            <div class="col-6">
                                <div class="p-2 bg-light rounded-4">
                                    <small class="text-muted d-block" style="font-size: 10px;">Mobile</small>
                                    <span class="fw-bold small">{{ auth()->user()->phone }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 bg-light rounded-4">
                                    <small class="text-muted d-block" style="font-size: 10px;">KYC Status</small>
                                    <span class="text-success fw-bold small">Verified</span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-success rounded-pill w-100 mt-4 fw-bold">Edit Profile</button>
                    </div>

                    <!-- Community Message -->
                    <div class="bg-ayurveda text-white p-4 rounded-5 shadow-lg mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-megaphone me-2"></i> Community Note</h6>
                        <p class="small opacity-75 mb-0">
                            “We are building India’s largest Ayurveda healthcare network. Thank you for being a part of this revolution.”
                        </p>
                    </div>

                    <!-- Notifications -->
                    <div class="bg-white p-4 rounded-5 shadow-sm border">
                        <h6 class="fw-bold mb-4 d-flex justify-content-between align-items-center">
                            Notifications <span class="badge bg-danger rounded-pill">{{ $notifications->count() }}</span>
                        </h6>
                        @forelse($notifications as $notif)
                        <div class="d-flex gap-3 mb-4 pb-3 border-bottom last-child-no-border">
                            <div class="flex-shrink-0 text-success"><i class="bi bi-bell-fill"></i></div>
                            <div>
                                <p class="small mb-1 fw-bold">{{ $notif->title }}</p>
                                <p class="small text-muted mb-0">{{ $notif->message }}</p>
                                <span class="text-muted" style="font-size: 10px;">{{ $notif->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <i class="bi bi-check2-all fs-2 text-muted opacity-25"></i>
                            <p class="text-muted small mb-0">All caught up!</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    .bg-ayurveda { background: linear-gradient(135deg, #198754 0%, #0f5132 100%); }
    .last-child-no-border:last-child { border-bottom: none !important; }
    .transition-hover:hover { transform: translateY(-5px); border-color: #198754 !important; }
    .border-dashed { border: 2px dashed #dee2e6 !important; }
</style>
@endpush
