@extends('layouts.app')

@section('title', $vacancy->post->name . ' - Recruitment Details')

@section('content')
<section class="py-5 bg-light">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('career') }}" class="text-success text-decoration-none">Careers</a></li>
                <li class="breadcrumb-item active">{{ $vacancy->post->name }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white p-5 rounded-5 shadow-sm mb-4 position-relative overflow-hidden">
                    <!-- Banner Badge -->
                    <div class="position-absolute top-0 end-0 p-4">
                        <div class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                            <i class="bi bi-shield-check me-1"></i> Community Certified
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-success fw-bold text-uppercase small mb-2">Revolutionary Role</h6>
                        <h1 class="fw-bold mb-1">{{ $vacancy->post->name }}</h1>
                        <p class="text-muted lead mb-0">{{ $vacancy->department }} | Level: <span class="text-capitalize fw-bold text-dark">{{ $vacancy->level }}</span></p>
                    </div>

                    <div class="row g-3 mb-5 mt-2">
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-light rounded-4 text-center h-100">
                                <small class="text-muted d-block mb-1">Stipend/Salary</small>
                                <span class="fw-bold text-success fs-5">₹{{ number_format($vacancy->post->salary) }}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-light rounded-4 text-center h-100">
                                <small class="text-muted d-block mb-1">Total Seats</small>
                                <span class="fw-bold text-dark fs-5">{{ $vacancy->total_seats }}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-light rounded-4 text-center h-100">
                                <small class="text-muted d-block mb-1">Last Date</small>
                                <span class="fw-bold text-danger fs-5">{{ \Carbon\Carbon::parse($vacancy->end_date)->format('d M') }}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-light rounded-4 text-center h-100">
                                <small class="text-muted d-block mb-1">Experience</small>
                                <span class="fw-bold text-dark fs-5">Fresher+</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-5 opacity-10">

                    <div class="job-content">
                        <h4 class="fw-bold mb-4">Role Description</h4>
                        <p class="text-muted mb-5">
                            {{ $vacancy->post->description }} As a part of the Ayurveda Health Revolution, you will be the bridge between traditional wisdom and community wellness. 
                            Your work will directly impact the health status of families in your assigned area.
                        </p>

                        <div class="accordion accordion-flush" id="jobDetailsAccordion">
                            <!-- Section 1 -->
                            <div class="accordion-item border-bottom py-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold px-0 bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sec1">
                                        <i class="bi bi-mortarboard me-3 text-success"></i> Eligibility & Qualification
                                    </button>
                                </h2>
                                <div id="sec1" class="accordion-collapse collapse show" data-bs-parent="#jobDetailsAccordion">
                                    <div class="accordion-body px-0 text-muted">
                                        <p class="mb-2"><strong>Educational Qualification:</strong> {{ $vacancy->qualification }}</p>
                                        <p class="mb-2"><strong>Age Criteria:</strong> {{ $vacancy->age_limit }}</p>
                                        <p class="mb-0"><strong>Residence:</strong> Preference will be given to local residents of the selected {{ $vacancy->level }}.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2 -->
                            <div class="accordion-item border-bottom py-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold px-0 bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sec2">
                                        <i class="bi bi-clipboard-check me-3 text-success"></i> Healthcare Responsibilities
                                    </button>
                                </h2>
                                <div id="sec2" class="accordion-collapse collapse" data-bs-parent="#jobDetailsAccordion">
                                    <div class="accordion-body px-0 text-muted">
                                        <ul class="mb-0">
                                            <li>Conduct door-to-door health awareness camps.</li>
                                            <li>Promote preventive care through Ayurveda dietary guidelines.</li>
                                            <li>Monitor community health metrics for mothers and elderly members.</li>
                                            <li>Organize local wellness workshops and yoga sessions.</li>
                                            <li>Maintain records of wellness visits and community health improvement.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3 -->
                            <div class="accordion-item border-bottom py-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold px-0 bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sec3">
                                        <i class="bi bi-gear-wide-connected me-3 text-success"></i> Community Work Flow
                                    </button>
                                </h2>
                                <div id="sec3" class="accordion-collapse collapse" data-bs-parent="#jobDetailsAccordion">
                                    <div class="accordion-body px-0 text-muted">
                                        <p>Our workflow is designed for maximum local impact:</p>
                                        <ol class="mb-0">
                                            <li>Phase 1: Local Area Survey & Enrollment</li>
                                            <li>Phase 2: Distribution of Wellness Kits & Literature</li>
                                            <li>Phase 3: Monthly Progress Tracking & Counseling</li>
                                            <li>Phase 4: Feedback collection and Health Milestone certification</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 4 -->
                            <div class="accordion-item border-0 py-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold px-0 bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sec4">
                                        <i class="bi bi-file-earmark-lock me-3 text-success"></i> Terms & Conditions
                                    </button>
                                </h2>
                                <div id="sec4" class="accordion-collapse collapse" data-bs-parent="#jobDetailsAccordion">
                                    <div class="accordion-body px-0 text-muted small">
                                        <p>1. The role is community-focused and requires field movement.</p>
                                        <p>2. Selection is based on merit, qualification, and local area understanding.</p>
                                        <p>3. Application fee is towards administrative and training processing costs.</p>
                                        <p>4. Misrepresentation of documents will lead to immediate disqualification.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mission Visual Card -->
                <div class="bg-ayurveda p-5 rounded-5 shadow-lg text-white mb-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-3">Become a Wellness Champion</h3>
                            <p class="opacity-75 mb-0">Join the movement to make every family in your village healthy and disease-free through Ayurveda.</p>
                        </div>
                        <div class="col-md-4 text-md-end mt-4 mt-md-0">
                            <i class="bi bi-heart-pulse display-1 opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="bg-white p-4 rounded-5 shadow-sm mb-4 border-top border-success border-5">
                        <h5 class="fw-bold mb-4">Application Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Post Level</span>
                            <span class="fw-bold text-capitalize">{{ $vacancy->level }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Application Fee</span>
                            <span class="fw-bold">₹{{ number_format($vacancy->post->application_fee) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted small">GST (18%)</span>
                            <span class="fw-bold">₹{{ number_format($vacancy->post->application_fee * 0.18) }}</span>
                        </div>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total Payable</span>
                            <span class="fw-bold text-success fs-4">₹{{ number_format($vacancy->post->total_fee) }}</span>
                        </div>
                        
                        <a href="{{ route('apply.form', $vacancy->id) }}" class="btn btn-success btn-lg rounded-pill w-100 py-3 shadow-sm mb-3 fw-bold btn-apply" data-id="{{ $vacancy->id }}">
                            Apply Now <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <p class="text-center small text-muted mb-0">Secure community recruitment portal.</p>
                    </div>

                    <div class="bg-white p-4 rounded-5 shadow-sm">
                        <h6 class="fw-bold mb-3">Required Documents</h6>
                        <ul class="list-unstyled small mb-0">
                            @foreach($vacancy->post->requiredDocuments as $doc)
                            <li class="mb-2 d-flex gap-2">
                                <i class="bi bi-check2-circle text-success"></i> {{ $doc->document_name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .bg-ayurveda { background: linear-gradient(135deg, #198754 0%, #0f5132 100%); }
    .accordion-button:not(.collapsed) { color: #198754; background-color: transparent; }
</style>
@endpush
