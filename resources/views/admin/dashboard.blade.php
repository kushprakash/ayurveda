@extends('layouts.app')

@section('title', 'Recruitment Admin - Ayurveda Health Research Center')

@section('content')
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-4 min-vh-100 shadow-lg" style="width: 280px; background: #1a1d21 !important;">
        <div class="px-3 mb-5 mt-2">
            <h4 class="fw-bold text-success mb-1">AHRC Admin</h4>
            <p class="small opacity-50 mb-0">Health Revolution Portal</p>
        </div>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active rounded-4 px-4 py-3 shadow-sm">
                    <i class="bi bi-grid-fill me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.vacancies') }}" class="nav-link text-white opacity-75 rounded-4 px-4 py-3">
                    <i class="bi bi-briefcase-fill me-2"></i> Vacancies
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.applications') }}" class="nav-link text-white opacity-75 rounded-4 px-4 py-3">
                    <i class="bi bi-people-fill me-2"></i> Applications
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white opacity-75 rounded-4 px-4 py-3">
                    <i class="bi bi-geo-alt-fill me-2"></i> Locations
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white opacity-75 rounded-4 px-4 py-3">
                    <i class="bi bi-shield-check me-2"></i> KYC Reports
                </a>
            </li>
            <li class="nav-item mt-5">
                <hr class="opacity-25">
                <a href="#" class="nav-link text-danger rounded-4 px-4 py-3">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 bg-light p-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold mb-1">Recruitment Analytics</h2>
                <p class="text-muted mb-0">Real-time overview of the Ayurveda community hiring.</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-white border rounded-pill px-4 shadow-sm fw-bold small"><i class="bi bi-download me-2"></i> Export Report</button>
            </div>
        </div>
        
        <!-- Stats Grid -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="bg-white p-4 rounded-5 shadow-sm border-0 transition-hover">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="p-3 bg-success-subtle text-success rounded-4"><i class="bi bi-people fs-4"></i></div>
                        <span class="badge bg-success-subtle text-success rounded-pill">{{ $stats['total_applications'] }} Total</span>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Draft Applications</h6>
                    <h3 class="fw-bold mb-0 text-warning">{{ number_format($stats['draft_applications']) }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white p-4 rounded-5 shadow-sm border-0 transition-hover">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="p-3 bg-primary-subtle text-primary rounded-4"><i class="bi bi-file-earmark-person fs-4"></i></div>
                        <span class="badge bg-primary-subtle text-primary rounded-pill">+{{ $stats['pending_reviews'] }} New</span>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Submitted Appls</h6>
                    <h3 class="fw-bold mb-0 text-primary">{{ number_format($stats['pending_reviews']) }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white p-4 rounded-5 shadow-sm border-0 transition-hover">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="p-3 bg-warning-subtle text-warning rounded-4"><i class="bi bi-credit-card fs-4"></i></div>
                        <span class="badge bg-danger-subtle text-danger rounded-pill">{{ $stats['payment_pending'] }} Unpaid</span>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Payment Pending</h6>
                    <h3 class="fw-bold mb-0">₹{{ number_format($stats['payment_pending'] * 1180) }} <small class="text-muted" style="font-size: 10px;">Est.</small></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white p-4 rounded-5 shadow-sm border-0 transition-hover">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="p-3 bg-success text-white rounded-4"><i class="bi bi-cash-stack fs-4"></i></div>
                        <span class="badge bg-light text-success rounded-pill">Total Paid</span>
                    </div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Total Revenue</h6>
                    <h3 class="fw-bold mb-0">₹{{ number_format($stats['total_revenue']) }}</h3>
                </div>
            </div>
        </div>


        <div class="row g-4">
            <!-- Recent Applications Table -->
            <div class="col-lg-12">
                <div class="bg-white p-5 rounded-5 shadow-sm border-0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Recent Community Applications</h5>
                        <a href="{{ route('admin.applications') }}" class="btn btn-link text-success text-decoration-none fw-bold small">View All <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 px-3 py-3 rounded-start-4">App ID</th>
                                    <th class="border-0 px-3 py-3">Applicant</th>
                                    <th class="border-0 px-3 py-3">Post & Level</th>
                                    <th class="border-0 px-3 py-3">Location Focus</th>
                                    <th class="border-0 px-3 py-3">Status</th>
                                    <th class="border-0 px-3 py-3 rounded-end-4 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_applications as $app)
                                <tr>
                                    <td class="px-3"><span class="fw-bold text-success">{{ $app->application_no }}</span></td>
                                    <td class="px-3">
                                        <div class="fw-bold">{{ $app->user->name }}</div>
                                        <div class="small text-muted">{{ $app->user->phone }}</div>
                                    </td>
                                    <td class="px-3">
                                        <div class="fw-bold">{{ $app->vacancy->post->name }}</div>
                                        <div class="badge bg-light text-dark rounded-pill border small" style="font-size: 9px;">{{ strtoupper($app->vacancy->level) }} LEVEL</div>
                                    </td>
                                    <td class="px-3">
                                        <div class="small fw-bold">{{ $app->vacancy->state->name }}</div>
                                        <div class="small text-muted">@if($app->village) {{ $app->village->name }} @else State Level @endif</div>
                                    </td>
                                    <td class="px-3">
                                        @php
                                            $color = $app->status == 'draft' ? 'warning' : ($app->status == 'submitted' ? 'primary' : 'success');
                                            $percentage = $app->completion_percentage ?? 0;
                                        @endphp
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge rounded-pill px-3 py-2 bg-{{ $color }}-subtle text-{{ $color }} fw-bold" style="font-size: 10px;">{{ strtoupper($app->status) }}</span>
                                            <span class="small text-muted">{{ $percentage }}%</span>
                                        </div>
                                        <div class="progress mt-1" style="height: 3px; width: 60px;">
                                            <div class="progress-bar bg-{{ $color }}" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </td>

                                    <td class="px-3 text-center">
                                        <button class="btn btn-sm btn-success rounded-pill px-3 fw-bold small shadow-sm">Process</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .nav-link.active { background-color: #198754 !important; color: white !important; opacity: 1 !important; }
    .nav-link:hover { background-color: rgba(255,255,255,0.05); }
    .transition-hover:hover { transform: translateY(-5px); box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important; }
</style>
@endpush
