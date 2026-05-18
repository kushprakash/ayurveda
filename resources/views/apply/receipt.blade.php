@extends('layouts.app')

@section('title', 'Application Receipt - AHRC')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center mb-4 d-print-none">
                    <button onclick="window.print()" class="btn btn-dark rounded-pill px-4 shadow-sm me-2"><i class="bi bi-printer me-2"></i> Print Receipt</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-white border rounded-pill px-4 shadow-sm"><i class="bi bi-house me-2"></i> Go to Dashboard</a>
                </div>

                <div id="receiptContent" class="bg-white p-0 shadow-lg border rounded-4 overflow-hidden">
                    <!-- Receipt Header -->
                    <div class="bg-success text-white p-5 text-center position-relative">
                        <div class="position-absolute top-0 end-0 p-4 opacity-25">
                            <i class="bi bi-shield-check" style="font-size: 100px;"></i>
                        </div>
                        <h2 class="fw-bold mb-1">Ayurveda Health Research Center</h2>
                        <p class="mb-0 opacity-75">PAN India Recruitment Community Network</p>
                        <div class="mt-4 badge bg-white text-success px-4 py-2 rounded-pill fw-bold shadow-sm">Official Application Receipt</div>
                    </div>

                    <div class="p-5">
                        <div class="row g-5">
                            <div class="col-md-8">
                                <div class="mb-5">
                                    <h6 class="text-muted small fw-bold text-uppercase border-bottom pb-2 mb-3">Applicant Information</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Full Name</label>
                                            <span class="fw-bold">{{ $application->user->name }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Application No</label>
                                            <span class="fw-bold text-success">{{ $application->application_no }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Phone Number</label>
                                            <span class="fw-bold">{{ $application->user->phone }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Email Address</label>
                                            <span class="fw-bold">{{ $application->user->email }}</span>
                                        </div>
                                        <div class="col-12">
                                            <label class="small text-muted d-block">Permanent Address</label>
                                            <span class="fw-bold small">{{ $application->address }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <h6 class="text-muted small fw-bold text-uppercase border-bottom pb-2 mb-3">Position & Location Details</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Applied Post</label>
                                            <span class="fw-bold">{{ $application->vacancy->post->name }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">State / District</label>
                                            <span class="fw-bold">{{ $application->state->name }} / {{ $application->district->name }}</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Block / Village</label>
                                            <span class="fw-bold">@if($application->village) {{ $application->village->name }} @else State Level @endif</span>
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted d-block">Submission Date</label>
                                            <span class="fw-bold">{{ $application->updated_at->format('d M Y, h:i A') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <h6 class="text-muted small fw-bold text-uppercase border-bottom pb-2 mb-3">Transaction Summary</h6>
                                    <div class="p-3 bg-light rounded-4 border-start border-4 border-success">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small">Transaction ID</span>
                                            <span class="fw-bold small">{{ $application->payment->transaction_id ?? 'N/A' }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="small">Payment Method</span>
                                            <span class="fw-bold small">{{ $application->payment->payment_method ?? 'UPI' }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-2">
                                            <span class="fw-bold">Total Fee Paid</span>
                                            <span class="fw-bold text-success fs-5">₹{{ number_format($application->total_amount) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-center">
                                <div class="mb-4">
                                    <h6 class="text-muted small fw-bold text-uppercase mb-3">Scan & Verify</h6>
                                    <div class="p-3 border rounded-5 bg-white d-inline-block shadow-sm">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $application->application_no }}" class="img-fluid">
                                    </div>
                                    <p class="small text-muted mt-2">Scan QR to verify authenticity</p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="text-muted small fw-bold text-uppercase mb-3">Applicant Photo</h6>
                                    <div class="p-2 border rounded-4 d-inline-block bg-light shadow-sm">
                                        <div class="bg-secondary text-white rounded-3 d-flex align-items-center justify-content-center" style="width: 120px; height: 140px;">
                                            <i class="bi bi-person-fill fs-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3 border-dashed rounded-4 bg-light text-center">
                                    <p class="small text-muted mb-1">Status</p>
                                    <span class="badge bg-success px-4 py-2 rounded-pill fw-bold">PAID & SUBMITTED</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 border-top">
                            <div class="row">
                                <div class="col-8">
                                    <p class="small text-muted mb-0">This is a computer-generated document and does not require a physical signature. For support, contact <span class="fw-bold">support@ahrc.org.in</span></p>
                                </div>
                                <div class="col-4 text-end">
                                    <h6 class="fw-bold mb-0">Authorized Signatory</h6>
                                    <p class="small text-muted">AHRC Recruitment Cell</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-4 rounded-4 border-0 shadow-sm d-print-none">
                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-info-circle-fill fs-4"></i>
                        <div>
                            <p class="fw-bold mb-0 small">What's next?</p>
                            <p class="small mb-0">Your application is now under review. You will receive an SMS/Email notification regarding the verification status and interview schedule.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    @media print {
        body { background-color: white !important; }
        .d-print-none { display: none !important; }
        .bg-light { background-color: #f8f9fa !important; }
        .shadow-lg { box-shadow: none !important; }
        .border { border: 1px solid #dee2e6 !important; }
    }
    .border-dashed { border: 2px dashed #dee2e6; }
</style>
@endpush
