@extends('layouts.app')

@section('title', 'Careers - Ayurvedic Doctor Recruitment 2026')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 bg-primary-light position-relative overflow-hidden">
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <div class="badge bg-secondary-subtle text-secondary mb-3 px-3 py-2 rounded-pill" data-aos="fade-down">
                Recruitment 2026
            </div>
            <h1 class="display-3 mb-4 fw-bold" data-aos="fade-up">Ayurvedic Doctor <br><span class="text-primary">Hiring Program</span></h1>
            <p class="lead text-muted mb-5 mx-auto" style="max-width: 700px;" data-aos="fade-up" data-aos-delay="100">
                Join Gramin Welfare Charitable Trust (GWCT) in our mission to promote Ayurveda and build a healthy society. We are looking for dedicated professionals at the block level.
            </p>
            <a href="#apply-form" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow" data-aos="fade-up" data-aos-delay="200">Apply Now</a>
        </div>
        <!-- Decorative Leaves -->
        <img src="{{ asset('images/leafe1.png') }}" class="position-absolute" style="top: 10%; right: -50px; width: 200px; opacity: 0.2; transform: rotate(-20deg);" alt="">
        <img src="{{ asset('images/leafe2.png') }}" class="position-absolute" style="bottom: 10%; left: -50px; width: 150px; opacity: 0.2; transform: rotate(15deg);" alt="">
    </section>

    <!-- Job Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('images/doctor.png') }}" alt="Doctor" class="img-fluid rounded-5 shadow-lg">
                        <div class="position-absolute bottom-0 end-0 bg-white p-4 rounded-4 shadow-lg m-4" data-aos="zoom-in" data-aos-delay="300">
                            <h5 class="text-primary mb-1">Block Level</h5>
                            <p class="text-muted small mb-0">Hiring in all blocks</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="display-5 mb-4">Job Specifications</h2>
                    <div class="row g-4">
                        <!-- Post -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-white h-100 shadow-sm transition-hover">
                                <div class="glass-icon mb-3 bg-primary-light text-primary"><i class="bi bi-person-badge"></i></div>
                                <h6 class="fw-bold">Position</h6>
                                <p class="text-muted mb-0">Ayurvedic Treatment Doctor</p>
                            </div>
                        </div>
                        <!-- Area -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-white h-100 shadow-sm transition-hover">
                                <div class="glass-icon mb-3 bg-success-subtle text-success"><i class="bi bi-geo-alt"></i></div>
                                <h6 class="fw-bold">Work Area</h6>
                                <p class="text-muted mb-0">Block Level Requirement</p>
                            </div>
                        </div>
                        <!-- Salary -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-white h-100 shadow-sm transition-hover">
                                <div class="glass-icon mb-3 bg-warning-subtle text-warning"><i class="bi bi-currency-rupee"></i></div>
                                <h6 class="fw-bold">Salary</h6>
                                <p class="text-muted mb-0">₹15,000/- + Incentive</p>
                            </div>
                        </div>
                        <!-- Qualification -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border bg-white h-100 shadow-sm transition-hover">
                                <div class="glass-icon mb-3 bg-info-subtle text-info"><i class="bi bi-mortarboard"></i></div>
                                <h6 class="fw-bold">Qualification</h6>
                                <p class="text-muted mb-0">BAMS / Ayurvedic Knowledge</p>
                            </div>
                        </div>
                        <!-- Experience -->
                        <div class="col-md-12">
                            <div class="p-4 rounded-4 border bg-white h-100 shadow-sm transition-hover">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="glass-icon bg-danger-subtle text-danger"><i class="bi bi-briefcase"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Experience Level</h6>
                                        <p class="text-muted mb-0">Freshers & Experienced both are invited to apply.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us -->
    <section class="py-5 bg-primary text-white overflow-hidden position-relative">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row g-4 text-center">
                <div class="col-6 col-lg-3" data-aos="zoom-in">
                    <div class="p-3">
                        <i class="bi bi-people display-4 mb-3 d-block"></i>
                        <h5>Social Service</h5>
                        <p class="small opacity-75">Golden opportunity for social service</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="p-3">
                        <i class="bi bi-shield-check display-4 mb-3 d-block"></i>
                        <h5>Promote Ayurveda</h5>
                        <p class="small opacity-75">Make India Healthy & disease-free</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-3">
                        <i class="bi bi-graph-up-arrow display-4 mb-3 d-block"></i>
                        <h5>Career Growth</h5>
                        <p class="small opacity-75">Better career for a better future</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="p-3">
                        <i class="bi bi-building display-4 mb-3 d-block"></i>
                        <h5>Stable Future</h5>
                        <p class="small opacity-75">Join a reliable & trusted organization</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background Elements -->
        <div class="position-absolute top-50 start-50 translate-middle w-100 h-100" style="background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);"></div>
    </section>

    <!-- Application Form -->
    <section id="apply-form" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-white rounded-5 shadow-lg overflow-hidden" data-aos="fade-up">
                        <div class="row g-0">
                            <div class="col-lg-12 p-5">
                                <div class="text-center mb-5">
                                    <h2 class="mb-2">Application Form</h2>
                                    <p class="text-muted">Apply today and build your career in the field of Ayurveda!</p>
                                </div>
                                <form action="#" method="POST" class="row g-4">
                                    @csrf
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Full Name</label>
                                        <input type="text" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="Enter your name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Email Address</label>
                                        <input type="email" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="Enter your email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Phone Number</label>
                                        <input type="tel" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="+91 00000 00000" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Qualification</label>
                                        <select class="form-select rounded-pill px-4 py-3 border-light shadow-sm">
                                            <option value="BAMS">BAMS</option>
                                            <option value="BHMS">BHMS</option>
                                            <option value="MD">MD (Ayurveda)</option>
                                            <option value="Other">Other Certificate</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Address / Preferred Block</label>
                                        <textarea class="form-control rounded-4 px-4 py-3 border-light shadow-sm" rows="3" placeholder="Enter your location details"></textarea>
                                    </div>
                                    <div class="col-12 text-center mt-5">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow w-100">Submit Application</button>
                                        <p class="text-muted mt-4 small mb-0">By clicking submit, you agree to our recruitment terms.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="mt-5 text-center" data-aos="fade-up">
                        <div class="d-inline-flex align-items-center gap-4 bg-white p-4 rounded-pill shadow-sm px-5">
                            <div class="d-flex align-items-center gap-2 border-end pe-4">
                                <i class="bi bi-telephone-fill text-primary"></i>
                                <span class="fw-bold">9102132444</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-globe text-primary"></i>
                                <span class="fw-bold text-muted">www.gwct.in</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Banner -->
    <section class="py-4 bg-secondary text-white text-center">
        <div class="container">
            <h5 class="mb-0 fw-light">ग्रामीण वेलफेयर चैरिटेबल ट्रस्ट (GWCT) - Serving the Nation</h5>
        </div>
    </section>
@endsection
