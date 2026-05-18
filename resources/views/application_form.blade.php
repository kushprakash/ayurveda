@extends('layouts.app')

@section('title', 'Apply for ' . $vacancy->post->name)

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-4">

        <!-- Progress Bar -->
        <div class="row justify-content-center mb-4 mb-lg-5">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between position-relative">
                    <div class="progress position-absolute top-50 start-0 translate-middle-y w-100" style="height: 2px; z-index: 0;">
                        <div class="progress-bar bg-success" id="formProgress" role="progressbar" style="width: 0%;"></div>
                    </div>
                    @for($i=1; $i<=4; $i++)
                    <div class="step-indicator {{ $application->current_step >= $i ? 'bg-success text-white' : 'bg-white text-muted border' }} rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; @media (min-width: 768px) { width: 45px; height: 45px; } z-index: 1; font-size: 0.8rem;">
                        @if($application->current_step > $i) <i class="bi bi-check"></i> @else {{ $i }} @endif
                    </div>
                    @endfor
                </div>
                <div class="d-flex justify-content-between mt-3 px-0 small fw-bold text-uppercase text-muted" style="font-size: 0.65rem; @media (min-width: 768px) { font-size: 0.75rem; }">
                    <span class="{{ $application->current_step >= 1 ? 'text-success' : '' }}">Basic</span>
                    <span class="{{ $application->current_step >= 2 ? 'text-success' : '' }}">KYC</span>
                    <span class="{{ $application->current_step >= 3 ? 'text-success' : '' }}">Docs</span>
                    <span class="{{ $application->current_step >= 4 ? 'text-success' : '' }}">Review</span>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Auto-Save Badge -->
                <div class="text-end mb-2">
                    <span id="autoSaveBadge" class="badge bg-white text-muted border px-3 py-2 rounded-pill shadow-sm" style="display: none;">
                        <span class="spinner-grow spinner-grow-sm text-success me-2" role="status"></span>
                        Auto-saving...
                    </span>
                    <span id="lastSavedBadge" class="badge bg-white text-success border px-3 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-cloud-check me-2"></i> All changes saved <span id="lastSavedTime" class="text-muted ms-1"></span>
                    </span>
                </div>

                <form id="multiStepForm" action="{{ route('apply.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="application_id" id="application_id" value="{{ $application->id }}">
                    <input type="hidden" name="step" id="currentStep" value="{{ $application->current_step }}">

                    <!-- Step 1: Location & Basic -->
                    <div class="form-step {{ $application->current_step == 1 ? 'active' : '' }}" id="step1" {!! $application->current_step != 1 ? 'style="display: none;"' : '' !!}>
                        <div class="bg-white p-3 p-md-5 rounded-4 rounded-md-5 shadow-sm border-top border-success border-5">
                            <div class="d-flex align-items-center gap-3 mb-4 mb-md-5">
                                <div class="p-3 bg-success-subtle text-success rounded-4 d-none d-md-block"><i class="bi bi-geo-alt fs-3"></i></div>
                                <div>
                                    <h4 class="fw-bold mb-1">Step 1: Basic Info</h4>
                                    <p class="text-muted small mb-0">Select your preferred working area hierarchy.</p>
                                </div>
                            </div>

                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">State</label>
                                    <input type="text" class="form-control rounded-pill px-4 py-3 bg-light" value="{{ $vacancy->state->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Applied Position</label>
                                    <input type="text" class="form-control rounded-pill px-4 py-3 bg-light" value="{{ $vacancy->post->name }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Select District <span class="text-danger">*</span></label>
                                    <select name="district_id" id="district_id" class="form-select rounded-pill px-4 py-3 border-light shadow-sm auto-save" required>
                                        <option value="">-- Select District --</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ $application->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Enter Block <span class="text-danger">*</span></label>
                                    <input type="text" name="block" id="block" class="form-control rounded-pill px-4 py-3 border-light shadow-sm auto-save" placeholder="Enter Block Name" value="{{ $application->block }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Enter Panchayat <span class="text-danger">*</span></label>
                                    <input type="text" name="panchayat" id="panchayat" class="form-control rounded-pill px-4 py-3 border-light shadow-sm auto-save" placeholder="Enter Panchayat Name" value="{{ $application->panchayat }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Enter Village <span class="text-danger">*</span></label>
                                    <input type="text" name="village" id="village" class="form-control rounded-pill px-4 py-3 border-light shadow-sm auto-save" placeholder="Enter Village Name" value="{{ $application->village }}" required>
                                </div>

                                <div class="col-12 mt-5">
                                    <h6 class="fw-bold mb-3 border-bottom pb-2">Applicant Details</h6>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select rounded-pill px-4 py-3 border-light shadow-sm auto-save" required>
                                        <option value="Male" {{ $application->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $application->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ $application->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control rounded-pill px-4 py-3 border-light shadow-sm auto-save" value="{{ $application->dob }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Education Level <span class="text-danger">*</span></label>
                                    <select name="education" class="form-select rounded-pill px-4 py-3 border-light shadow-sm auto-save" required>
                                        <option value="12th" {{ $application->education == '12th' ? 'selected' : '' }}>12th Pass</option>
                                        <option value="Graduate" {{ $application->education == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                                        <option value="Post Graduate" {{ $application->education == 'Post Graduate' ? 'selected' : '' }}>Post Graduate</option>
                                        <option value="Diploma" {{ $application->education == 'Diploma' ? 'selected' : '' }}>Diploma / Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Permanent Address <span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control rounded-4 px-4 py-3 border-light shadow-sm auto-save" rows="3" placeholder="Full address with pincode">{{ $application->address }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Experience Details (Optional)</label>
                                    <textarea name="experience" class="form-control rounded-4 px-4 py-3 border-light shadow-sm auto-save" rows="2" placeholder="Tell us about your healthcare or community work experience">{{ $application->experience }}</textarea>
                                </div>
                            </div>

                            <div class="text-end mt-5">
                                <button type="button" class="btn btn-success btn-lg rounded-pill px-5 py-3 next-step fw-bold shadow">
                                    Save & Continue <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: KYC Verification -->
                    <div class="form-step {{ $application->current_step == 2 ? 'active' : '' }}" id="step2" {!! $application->current_step != 2 ? 'style="display: none;"' : '' !!}>
                        <div class="bg-white p-2 rounded-5 shadow-sm border-top border-success border-5">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <div class="p-3 bg-success-subtle text-success rounded-4"><i class="bi bi-shield-lock fs-3"></i></div>
                                <div>
                                    <h4 class="fw-bold mb-1">Step 2: KYC Verification</h4>
                                    <p class="text-muted small mb-0">Secure real-time verification of your credentials.</p>
                                </div>
                            </div>
                            
                            <!-- Aadhaar -->
                            <div class="mb-5 p-4 rounded-5 border bg-light position-relative">
                                <h6 class="fw-bold mb-4"><i class="bi bi-card-heading text-success me-2"></i>Aadhaar Authentication</h6>
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0 ps-4"><i class="bi bi-upc-scan text-muted"></i></span>
                                            <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control border-0 rounded-end-pill py-3 auto-save" placeholder="Enter 12 Digit Aadhaar" maxlength="12" value="{{ $application->kyc->aadhaar_no ?? '' }}" {{ ($application->kyc->is_aadhaar_verified ?? false) ? 'readonly' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success rounded-pill w-100 py-3 fw-bold" type="button" id="verifyAadhaar" {{ ($application->kyc->is_aadhaar_verified ?? false) ? 'style="display:none;"' : '' }}>Send OTP</button>
                                    </div>
                                </div>
                                <div id="aadhaarOtpGroup" class="mt-4 p-3 bg-white rounded-4 shadow-sm" style="display: none;">
                                    <label class="form-label small fw-bold">Enter OTP from UIDAI</label>
                                    <div class="input-group">
                                        <input type="text" id="aadhaar_otp" class="form-control rounded-start-pill border-light" placeholder="6 Digit OTP">
                                        <button class="btn btn-dark rounded-end-pill px-4" type="button" id="confirmAadhaar">Verify</button>
                                    </div>
                                </div>
                                <div id="aadhaarSuccess" class="mt-3 text-success fw-bold" {!! ($application->kyc->is_aadhaar_verified ?? false) ? '' : 'style="display: none;"' !!}>
                                    <i class="bi bi-check-circle-fill"></i> Verified: RAHUL KUMAR (Male)
                                </div>
                            </div>

                            <!-- PAN -->
                            <div class="mb-5 p-4 rounded-5 border bg-light">
                                <h6 class="fw-bold mb-4"><i class="bi bi-credit-card-2-front text-success me-2"></i>PAN Verification</h6>
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0 ps-4"><i class="bi bi-hash text-muted"></i></span>
                                            <input type="text" name="pan_no" id="pan_no" class="form-control border-0 rounded-end-pill py-3 auto-save" placeholder="Enter PAN Number" maxlength="10" value="{{ $application->kyc->pan_no ?? '' }}" {{ ($application->kyc->is_pan_verified ?? false) ? 'readonly' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success rounded-pill w-100 py-3 fw-bold" type="button" id="verifyPan" {{ ($application->kyc->is_pan_verified ?? false) ? 'style="display:none;"' : '' }}>Verify PAN</button>
                                    </div>
                                </div>
                                <div id="panSuccess" class="mt-3 text-success fw-bold" {!! ($application->kyc->is_pan_verified ?? false) ? '' : 'style="display: none;"' !!}>
                                    <i class="bi bi-check-circle-fill"></i> PAN Verified: RAHUL KUMAR
                                </div>
                            </div>

                            <!-- Bank -->
                            <div class="p-4 rounded-5 border bg-light">
                                <h6 class="fw-bold mb-4"><i class="bi bi-bank text-success me-2"></i>Bank Details for Stipend</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control rounded-pill px-4 py-3 auto-save" placeholder="IFSC Code" value="{{ $application->kyc->ifsc_code ?? '' }}" {{ ($application->kyc->is_bank_verified ?? false) ? 'readonly' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="account_no" id="account_no" class="form-control rounded-pill px-4 py-3 auto-save" placeholder="Account Number" value="{{ $application->kyc->account_no ?? '' }}" {{ ($application->kyc->is_bank_verified ?? false) ? 'readonly' : '' }}>
                                    </div>
                                    <div class="col-12 d-none">
                                        <input type="text" name="account_holder" id="account_holder" class="form-control rounded-pill px-4 py-3 auto-save" placeholder="Account Holder Name" value="{{ $application->kyc->account_holder ?? '' }}" {{ ($application->kyc->is_bank_verified ?? false) ? 'readonly' : '' }}>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn {{ ($application->kyc->is_bank_verified ?? false) ? 'btn-success' : 'btn-outline-success' }} rounded-pill w-100 py-3 fw-bold" type="button" id="verifyBank">
                                            @if($application->kyc->is_bank_verified ?? false)
                                                <i class="bi bi-check-circle"></i> Bank Account Verified
                                            @else
                                                Verify Bank Account
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-light btn-lg rounded-pill px-5 prev-step border">Back</button>
                                <button type="button" class="btn btn-success btn-lg rounded-pill px-5 next-step fw-bold shadow">
                                    Next: Documents <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Documents -->
                    <div class="form-step {{ $application->current_step == 3 ? 'active' : '' }}" id="step3" {!! $application->current_step != 3 ? 'style="display: none;"' : '' !!}>
                        <div class="bg-white p-2 rounded-5 shadow-sm border-top border-success border-5">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <div class="p-3 bg-success-subtle text-success rounded-4"><i class="bi bi-cloud-upload fs-3"></i></div>
                                <div>
                                    <h4 class="fw-bold mb-1">Step 3: Document Uploads</h4>
                                    <p class="text-muted small mb-0">Upload clear scanned copies for verification.</p>
                                </div>
                            </div>

                            <div class="document-list">
                                @forelse($vacancy->post->requiredDocuments as $doc)
                                @php 
                                    $existingDoc = $application->documents->where('document_name', $doc->document_name)->first();
                                @endphp
                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase mb-3">{{ $doc->document_name }} @if($doc->is_mandatory)<span class="text-danger">*</span>@endif
                                <i class="bi bi-check2"></i>
                                <span class="filename">
                                    <?php
                                        $fileName = str_replace(' ', '', $doc->document_name) . '.' . $application->application_no . '.jpg';
                                        $path = url('applications/docs/' . $fileName);
                                    ?>
                                    {!! $existingDoc ? '<a href="'.url($path).'" target="_blank">View</a>' : '' !!}
                                </span>
                                
                                </label>
                                    <div class="upload-box p-5 border-dashed rounded-5 text-center transition-hover {{ $existingDoc ? 'border-success bg-success-subtle shadow-sm' : 'bg-light' }}" data-doc-name="{{ $doc->document_name }}">
                                        <input type="file" name="file" class="d-none file-input-instant" accept=".pdf,.jpg,.jpeg,.png">
                                        <div class="upload-placeholder" {!! $existingDoc ? 'style="display:none;"' : '' !!}>
                                            <i class="bi bi-file-earmark-arrow-up fs-1 text-success mb-2"></i>
                                            <p class="mb-0 fw-bold">Click to Upload</p>
                                            <span class="text-muted small">PNG or JPG (Max 2MB)</span>
                                        </div>
                                        <div class="file-preview mt-2" {!! $existingDoc ? '' : 'style="display:none;"' !!}>
                                            
                                            <p class="mt-2 small text-success fw-bold"><i class="bi bi-eye me-1"></i> Document Saved</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-info rounded-4 border-0">No specific documents required.</div>
                                @endforelse

                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase mb-3">Applicant Signature <span class="text-danger">*</span></label>
                                    <div class="p-4 border rounded-5 bg-white shadow-sm">
                                        <canvas id="sig-canvas" class="w-100 border rounded-4" style="height: 180px; cursor: crosshair; background: #fafafa;"></canvas>
                                        <div class="mt-3 text-center">
                                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-4" id="sig-clearBtn">Clear Pad</button>
                                        </div>
                                        <input type="hidden" name="signature" id="signature_data" value="{{ $application->signature }}">
                                    </div>
                                    @if($application->signature)
                                        <div class="mt-2 text-center text-success small fw-bold"><i class="bi bi-check-circle"></i> Previous Signature Restored</div>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-light btn-lg rounded-pill px-5 prev-step border">Back</button>
                                <button type="button" class="btn btn-success btn-lg rounded-pill px-5 next-step fw-bold shadow">
                                    Review Application <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Final Review -->
                    <div class="form-step {{ $application->current_step == 4 ? 'active' : '' }}" id="step4" {!! $application->current_step != 4 ? 'style="display: none;"' : '' !!}>
                        <div class="bg-white p-2 rounded-5 shadow-sm border-top border-success border-5">
                            <div class="text-center mb-5">
                                <i class="bi bi-file-earmark-medical display-4 text-success mb-3 d-block"></i>
                                <h4 class="fw-bold mb-1">Final Application Review</h4>
                                <p class="text-muted">Please double check all information before submission.</p>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <div class="p-4 bg-light rounded-5 h-100">
                                        <h6 class="fw-bold border-bottom pb-2 mb-3">Personal & Contact</h6>
                                        <p class="mb-1 small">Name: <span class="fw-bold">{{ auth()->user()->name }}</span></p>
                                        <p class="mb-1 small">Phone: <span class="fw-bold">{{ auth()->user()->phone }}</span></p>
                                        <p class="mb-0 small">Email: <span class="fw-bold">{{ auth()->user()->email }}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-4 bg-light rounded-5 h-100">
                                        <h6 class="fw-bold border-bottom pb-2 mb-3">Post & Location</h6>
                                        <p class="mb-1 small">Applied Post: <span class="fw-bold">{{ $vacancy->post->name }}</span></p>
                                        <p class="mb-1 small">State: <span class="fw-bold">{{ $vacancy->state->name }}</span></p>
                                        <p class="mb-0 small">App No: <span class="fw-bold text-success">{{ $application->application_no }}</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 rounded-5 border-success border bg-success-subtle mb-5">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-dark small">Application Fee (incl. GST)</span>
                                    <span class="fw-bold fs-4">₹{{ number_format($application->total_amount) }}</span>
                                </div>
                                <p class="small text-muted mb-0">Note: Application fee is non-refundable.</p>
                            </div>

                            <div class="form-check mb-5 p-3 rounded-4 border bg-light">
                                <input class="form-check-input ms-0 me-3" type="checkbox" id="confirmData" required>
                                <label class="form-check-label small fw-bold" for="confirmData">
                                    I hereby confirm that I have reviewed the application and all provided information is accurate and true.
                                </label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-light btn-lg rounded-pill px-5 prev-step border">Back</button>
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 py-1 shadow ">
                                    Pay Now 
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                <div class="modal-header bg-success text-white border-0 py-3">
                    <h5 class="modal-title fw-bold" id="paymentModalLabel"><i class="bi bi-shield-lock me-2"></i> Secure Payment Gateway</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 bg-light">
                    <div id="paymentLoader" class="text-center py-5">
                        <div class="spinner-border text-success mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
                        <p class="text-muted fw-bold">Connecting to payment gateway...</p>
                    </div>
                    <div id="iframeContainer" style="display: none;">
                        <iframe src="" id="paymentIframe" title="Payment Gateway" style="width: 100%; height: 550px; border: none;"></iframe>
                    </div>
                    <div id="paymentStatus" class="p-4 text-center border-top bg-white">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <div class="spinner-border spinner-border-sm text-success" role="status"></div>
                            <span class="text-muted fw-bold">Waiting for payment confirmation...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
$(document).ready(function() {
    var currentStep = {{ $application->current_step }};
    var totalSteps = 4;

    function updateProgress() {
        var percent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        $('#formProgress').css('width', percent + '%');
        
        $('.step-indicator').each(function(index) {
            if (index + 1 < currentStep) {
                $(this).addClass('bg-success text-white').removeClass('bg-white text-muted border');
                $(this).html('<i class="bi bi-check"></i>');
            } else if (index + 1 === currentStep) {
                $(this).addClass('bg-success text-white shadow').removeClass('bg-white text-muted border');
                $(this).html(index + 1);
            } else {
                $(this).addClass('bg-white text-muted border').removeClass('bg-success text-white shadow');
                $(this).html(index + 1);
            }
        });
    }
    updateProgress();

    // Auto-Save Logic
    var autoSaveTimeout;
    $(document).on('change keyup', '.auto-save', function() {
        clearTimeout(autoSaveTimeout);
        $('#lastSavedBadge').hide();
        $('#autoSaveBadge').show();

        autoSaveTimeout = setTimeout(function() {
            var formData = $('#multiStepForm').serialize();
            $.ajax({
                url: "{{ route('apply.auto_save') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    $('#autoSaveBadge').hide();
                    $('#lastSavedBadge').show();
                    $('#lastSavedTime').text('at ' + response.timestamp);
                }
            });
        }, 2000); // Debounce 2 seconds
    });

    // Cascading dropdowns
    $('#district_id').on('change', function() {
        var id = $(this).val();
        // Since we changed to text input, we only keep district_id for DB, but don't need to load blocks
    });

    $('.next-step').on('click', function() {
        var form = $('#multiStepForm')[0];
        var formData = new FormData(form);
        
        var stepType = currentStep === 1 ? 'basic' : (currentStep === 2 ? 'kyc' : 'docs');
        formData.set('step', stepType);

        var $btn = $(this);
        var originalText = $btn.html();
        $btn.html('<span class="spinner-border spinner-border-sm"></span> Saving...').prop('disabled', true);

        $.ajax({
            url: "{{ route('apply.submit') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    $('#step' + currentStep).fadeOut(function() {
                        currentStep++;
                        $('#step' + currentStep).fadeIn(function() {
                            if (currentStep === 3 && typeof resizeCanvas === 'function') {
                                resizeCanvas();
                            }
                        });
                        $('#currentStep').val(currentStep);
                        updateProgress();
                    });

                } else {
                    Swal.fire('Error', response.message || 'Validation failed', 'error');
                }
            },
            complete: function() {
                $btn.html(originalText).prop('disabled', false);
            }
        });
    });

    $('.prev-step').on('click', function() {
        $('#step' + currentStep).fadeOut(function() {
            currentStep--;
            $('#step' + currentStep).fadeIn();
            $('#currentStep').val(currentStep);
            updateProgress();
        });
    });

    // Instant Document Upload
    $(document).on('click', '.upload-box', function(e) {
        if (!$(e.target).hasClass('file-input-instant')) {
            $(this).find('.file-input-instant').trigger('click');
        }
    });

    $(document).on('change', '.file-input-instant', function() {
        var $input = $(this);
        var $box = $input.closest('.upload-box');
        var file = this.files[0];
        var docName = $box.data('doc-name');

        if(file) {
            var formData = new FormData();
            formData.append('file', file);
            formData.append('doc_name', docName);
            formData.append('application_id', $('#application_id').val());
            formData.append('_token', "{{ csrf_token() }}");

            $box.find('.upload-placeholder').hide();
            $box.find('.file-preview').show().find('.filename').text('Uploading...');
            $box.removeClass('border-success bg-success-subtle shadow-sm'); // Reset state while uploading

            $.ajax({
                url: "{{ route('apply.upload_document') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.success) {
                        $box.addClass('border-success bg-success-subtle shadow-sm');
                        $box.find('.filename').text(file.name);
                        Swal.fire({
                            title: 'Saved!',
                            text: docName + ' uploaded successfully.',
                            icon: 'success',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function() {
                    $box.find('.upload-placeholder').show();
                    $box.find('.file-preview').hide();
                    Swal.fire('Error', 'Failed to upload document. Please try again.', 'error');
                }
            });
        }
    });


    // Mocks for KYC
    $('#verifyAadhaar').on('click', function() {
        $(this).html('<span class="spinner-border spinner-border-sm"></span>').prop('disabled', true);
        setTimeout(() => {
            $('#aadhaarOtpGroup').fadeIn();
            $(this).hide();
        }, 1500);
    });

    $('#confirmAadhaar').on('click', function() {
        $('#aadhaarOtpGroup').hide();
        $('#aadhaarSuccess').fadeIn();
        $('#aadhaar_no').addClass('is-valid').prop('readonly', true);
        // Auto-save kyc status via AJAX would go here
    });

    $('#verifyPan').on('click', function() {
        $(this).html('<span class="spinner-border spinner-border-sm"></span>').prop('disabled', true);
        setTimeout(() => {
            $('#panSuccess').fadeIn();
            $(this).hide();
            $('#pan_no').addClass('is-valid').prop('readonly', true);
        }, 1500);
    });

    $('#verifyBank').on('click', function() {
        var ifsc = $('#ifsc_code').val();
        var acc = $('#account_no').val();
        if(!ifsc || !acc) { Swal.fire('Error', 'Please enter IFSC and Account Number', 'warning'); return; }

        $(this).html('<span class="spinner-border spinner-border-sm"></span> Verifying...').prop('disabled', true);
        setTimeout(() => {
            $(this).html('<i class="bi bi-check-circle"></i> Bank Account Verified').removeClass('btn-outline-success').addClass('btn-success');
            $('#ifsc_code, #account_no, #account_holder').addClass('is-valid').prop('readonly', true);
            Swal.fire('Success', 'Bank account verified for ' + $('#account_holder').val(), 'success');
        }, 2000);
    });

    // Signature
    var canvas = document.getElementById('sig-canvas');
    var signaturePad = new SignaturePad(canvas);
    
    function resizeCanvas() {
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        var data = signaturePad.toDataURL(); // Save current drawing
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear(); 
        signaturePad.fromDataURL(data); // Restore drawing
    }


    window.addEventListener("resize", resizeCanvas);
    
    // Initial resize after a small delay to ensure DOM is ready
    setTimeout(resizeCanvas, 500);

    
    // Restore signature if exists
    @if($application->signature)
        signaturePad.fromDataURL("{{ $application->signature }}");
    @endif

    $('#sig-clearBtn').on('click', function() { signaturePad.clear(); $('#signature_data').val(''); });

    $('#multiStepForm').on('submit', function(e) {
        e.preventDefault();
        
        if (!signaturePad.isEmpty()) {
            $('#signature_data').val(signaturePad.toDataURL());
        }

        var $btn = $(this).find('button[type="submit"]');
        $btn.html('<span class="spinner-border spinner-border-sm"></span> Submitting...').prop('disabled', true);

        var form = this;
        var formData = new FormData(form);
        formData.set('step', 'final');

        // First submit final status
        $.ajax({
            url: "{{ route('apply.submit') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Then initiate payment
                $.ajax({
                    url: "{{ route('apply.payment.initiate') }}",
                    type: "POST",
                    data: {
                        application_id: "{{ $application->id }}",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(payResponse) {
                        if(payResponse.success) {
                            $('#paymentIframe').attr('src', payResponse.payment_url);
                            var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                            paymentModal.show();
                            
                            $('#paymentIframe').on('load', function() {
                                $('#paymentLoader').hide();
                                $('#iframeContainer').show();
                            });

                            // Start polling for status
                            var pollCount = 0;
                            var pollInterval = setInterval(function() {
                                pollCount++;
                                $.ajax({
                                    url: "{{ route('apply.payment.check_status') }}",
                                    type: "POST",
                                    data: {
                                        orderId: payResponse.orderId,
                                        application_id: "{{ $application->id }}",
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(statusResponse) {
                                        if(statusResponse.success && statusResponse.status == 'paid') {
                                            clearInterval(pollInterval);
                                            $('#paymentStatus').html('<div class="alert alert-success m-0 py-2"><i class="bi bi-check-circle-fill me-2"></i> Payment Successful! Redirecting...</div>');
                                            setTimeout(function() {
                                                window.location.href = statusResponse.redirect;
                                            }, 2000);
                                        }
                                    }
                                });

                                // Stop polling after 10 minutes (200 attempts @ 3s)
                                if(pollCount > 200) clearInterval(pollInterval);
                            }, 3000); 

                            // Reset button if modal closed without success
                            $('#paymentModal').on('hidden.bs.modal', function () {
                                clearInterval(pollInterval);
                                $btn.html('Pay Now').prop('disabled', false);
                            });
                        } else {
                            Swal.fire('Error', 'Failed to initiate payment. Please try again.', 'error');
                            $btn.html('Pay Now').prop('disabled', false);
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Something went wrong. Please contact support.', 'error');
                        $btn.html('Pay Now').prop('disabled', false);
                    }
                });
            }
        });
    });

});
</script>
@endpush

@push('styles')
<style>
    .step-indicator { width: 35px; height: 35px; transition: all 0.3s; }
    @media (min-width: 768px) {
        .step-indicator { width: 45px; height: 45px; }
    }
    .border-dashed { border: 2px dashed #dee2e6; }
    .upload-box { cursor: pointer; transition: all 0.2s; }
    .upload-box:hover { border-color: #198754; background-color: #f8f9fa; }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.05) !important; }
    .transition-hover:hover { transform: scale(1.01); }
    .form-step { animation: fadeIn 0.5s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    
    /* Mobile Adjustments */
    @media (max-width: 576px) {
        .btn-lg { padding: 0.75rem 1.5rem; font-size: 1rem; }
        .upload-box { padding: 2rem !important; }
        h4 { font-size: 1.25rem; }
    }
</style>
@endpush

