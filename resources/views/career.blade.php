@extends('layouts.app')

@section('title', 'Ayurveda Health Research Center - Ayurveda Health Revolution Hiring')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 bg-ayurveda position-relative overflow-hidden text-white">
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <div class="badge bg-white text-success mb-3 px-3 py-2 rounded-pill shadow-sm" data-aos="fade-down">
                Join the Revolution
            </div>
            <h1 class="display-3 mb-4 fw-bold" data-aos="fade-up">Hiring Ayurveda <br><span class="text-warning">Health Revolution</span></h1>
            <p class="lead mb-5 mx-auto color-black" style="max-width: 700px;color:black;" data-aos="fade-up" data-aos-delay="100">
                “Our mission is to remove the root causes of illness and create a healthier life for every family through Ayurveda, awareness, and community healthcare support.”
            </p>
        </div>
        <!-- Decorative Leaves -->
        <img src="{{ asset('images/leafe1.png') }}" class="position-absolute opacity-20" style="top: 10%; right: -50px; width: 300px; transform: rotate(-20deg);" alt="" onerror="this.style.display='none'">
        <img src="{{ asset('images/leafe2.png') }}" class="position-absolute opacity-20" style="bottom: 10%; left: -50px; width: 250px; transform: rotate(15deg);" alt="" onerror="this.style.display='none'">
    
         <div class="container" style="margin-top:-50px;">
            <div class="section-header text-center mb-5">
                <h2><span>Direct Recruitment</span></h2>
                <p class="lead">Apply directly for our primary healthcare initiatives.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Regional Manager -->
                <div class="col-lg-3 col-md-6">
                    <div class="vacancy-card p-4 rounded-5 shadow-sm bg-white border-top border-primary border-5 h-100 transition-hover">
                        <div class="vacancy-header mb-4 d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="fw-bold text-primary mb-1" style="font-size: 1.25rem;">Regional Manager</h3>
                                <p class="text-muted small mb-0"><i class="icofont-location-pin me-1"></i> State: Bihar</p>
                            </div>
                            <span class="badge bg-primary text-white px-2 py-1 rounded-pill small">Active</span>
                        </div>
                        <div class="vacancy-body mb-4">
                            <div class="d-flex align-items-center gap-2 p-3 bg-light rounded-4">
                                <div class="icon-box bg-primary-subtle text-primary p-2 rounded-3">
                                    <i class="icofont-businessman fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Vacancies</p>
                                    <h4 class="mb-0 fw-bold">38</h4>
                                </div>
                            </div>
                        </div>
                         <div class="d-flex gap-2">
                            <a href="{{ route('vacancy.details', 43) }}" class="btn btn-outline-success rounded-pill flex-grow-1 fw-bold small">View Details</a>
                            <a href="{{ route('apply.form', 43) }}" class="btn btn-success rounded-pill flex-grow-1 fw-bold small btn-apply" data-id="43">Apply Now</a>
                        </div>
                    </div>
                </div>

                <!-- Area Manager -->
                <div class="col-lg-3 col-md-6">
                    <div class="vacancy-card p-4 rounded-5 shadow-sm bg-white border-top border-info border-5 h-100 transition-hover">
                        <div class="vacancy-header mb-4 d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="fw-bold text-info mb-1" style="font-size: 1.25rem;">Area Manager</h3>
                                <p class="text-muted small mb-0"><i class="icofont-location-pin me-1"></i> State: Bihar</p>
                            </div>
                            <span class="badge bg-info text-white px-2 py-1 rounded-pill small">Active</span>
                        </div>
                        <div class="vacancy-body mb-4">
                            <div class="d-flex align-items-center gap-2 p-3 bg-light rounded-4">
                                <div class="icon-box bg-info-subtle text-info p-2 rounded-3">
                                    <i class="icofont-user-suited fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Vacancies</p>
                                    <h4 class="mb-0 fw-bold">534</h4>
                                </div>
                            </div>
                        </div>
                  

                        <div class="d-flex gap-2">
                            <a href="{{ route('vacancy.details', 44) }}" class="btn btn-outline-success rounded-pill flex-grow-1 fw-bold small">View Details</a>
                            <a href="{{ route('apply.form', 44) }}" class="btn btn-success rounded-pill flex-grow-1 fw-bold small btn-apply" data-id="44">Apply Now</a>
                        </div>
                    </div>
                </div>

                <!-- Notec Arogya Kendra -->
                <div class="col-lg-3 col-md-6">
                    <div class="vacancy-card p-4 rounded-5 shadow-sm bg-white border-top border-success border-5 h-100 transition-hover">
                        <div class="vacancy-header mb-4 d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="fw-bold text-success mb-1" style="font-size: 1.25rem;">Notec Arogya</h3>
                                <p class="text-muted small mb-0"><i class="icofont-location-pin me-1"></i> State: Bihar</p>
                            </div>
                            <span class="badge bg-success text-white px-2 py-1 rounded-pill small">Active</span>
                        </div>
                        <div class="vacancy-body mb-4">
                            <div class="d-flex align-items-center gap-2 p-3 bg-light rounded-4">
                                <div class="icon-box bg-success-subtle text-success p-2 rounded-3">
                                    <i class="icofont-users-alt-2 fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Vacancies</p>
                                    <h4 class="mb-0 fw-bold">8337</h4>
                                </div>
                            </div>
                        </div>
                         <div class="d-flex gap-2">
                            <a href="{{ route('vacancy.details', 41) }}" class="btn btn-outline-success rounded-pill flex-grow-1 fw-bold small">View Details</a>
                            <a href="{{ route('apply.form', 41) }}" class="btn btn-success rounded-pill flex-grow-1 fw-bold small btn-apply" data-id="41">Apply Now</a>
                        </div>
                    </div>
                </div>

                <!-- Ayurved Mitra -->
                <div class="col-lg-3 col-md-6">
                    <div class="vacancy-card p-4 rounded-5 shadow-sm bg-white border-top border-warning border-5 h-100 transition-hover">
                        <div class="vacancy-header mb-4 d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="fw-bold text-warning mb-1" style="font-size: 1.25rem;">Ayurved Mitra</h3>
                                <p class="text-muted small mb-0"><i class="icofont-location-pin me-1"></i> State: Bihar</p>
                            </div>
                            <span class="badge bg-warning text-dark px-2 py-1 rounded-pill small">Active</span>
                        </div>
                        <div class="vacancy-body mb-4">
                            <div class="d-flex align-items-center gap-2 p-3 bg-light rounded-4">
                                <div class="icon-box bg-warning-subtle text-warning p-2 rounded-3">
                                    <i class="icofont-medical-sign fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Vacancies</p>
                                    <h4 class="mb-0 fw-bold">45103</h4>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('vacancy.details', 42) }}" class="btn btn-outline-success rounded-pill flex-grow-1 fw-bold small">View Details</a>
                            <a href="{{ route('apply.form', 42) }}" class="btn btn-success rounded-pill flex-grow-1 fw-bold small btn-apply" data-id="42">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </section>


    <!-- Mission & Vision Section -->
    <section id="mission" class="py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=1000" alt="Ayurveda Wellness" class="img-fluid rounded-5 shadow-lg">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h6 class="text-success fw-bold text-uppercase mb-2">Our Foundation</h6>
                    <h2 class="display-5 fw-bold mb-4">India’s Largest Ayurveda Community</h2>
                    <p class="text-muted mb-4 lead">
                        To build a healthcare community network that reaches every village, panchayat, block, district, and state with accessible wellness guidance.
                    </p>
                    
                    <div class="d-flex gap-4 mb-4">
                        <div class="p-3 bg-success-subtle rounded-4 text-success h-100">
                            <i class="bi bi-eye-fill fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Visionary Goals</h5>
                            <p class="text-muted small">Connect 10 Lakh+ healthcare workers with local communities for preventive care.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="p-3 bg-warning-subtle rounded-4 text-warning h-100">
                            <i class="bi bi-heart-pulse-fill fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Health Awareness</h5>
                            <p class="text-muted small">Eradicate root causes of illness through ancient Ayurvedic wisdom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Community Benefits & Impact</h2>
                <p class="text-muted">Join the revolution and contribute to a healthier India.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="p-5 bg-white rounded-5 shadow-sm border-bottom border-success border-4 h-100 transition-hover">
                        <i class="bi bi-geo-alt display-4 text-success mb-4 d-block"></i>
                        <h5 class="fw-bold">Rural Healthcare Impact</h5>
                        <p class="text-muted small">Provide essential wellness guidance to underserved rural populations directly at their doorstep.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="p-5 bg-white rounded-5 shadow-sm border-bottom border-success border-4 h-100 transition-hover">
                        <i class="bi bi-graph-up-arrow display-4 text-success mb-4 d-block"></i>
                        <h5 class="fw-bold">Career Growth</h5>
                        <p class="text-muted small">Structured hierarchy from Village to State level with regular training and certifications.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-5 bg-white rounded-5 shadow-sm border-bottom border-success border-4 h-100 transition-hover">
                        <i class="bi bi-people display-4 text-success mb-4 d-block"></i>
                        <h5 class="fw-bold">Community Support</h5>
                        <p class="text-muted small">Be part of a massive network of Ayurveda professionals and healthcare enthusiasts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // State Search
    $('#stateSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.state-card').filter(function() {
            $(this).toggle($(this).data('name').indexOf(value) > -1)
        });
    });

    // State Click - Load Vacancies
    function loadVacancies(element, animate = true) {
        var stateId = element.data('id');
        var stateName = element.find('h6').text();
        
        $('.state-btn').removeClass('border-success shadow bg-success-subtle');
        element.addClass('border-success shadow bg-success-subtle');
        
        $('#selectedStateName').text(stateName);
        $('#vacancySection').fadeIn();
        $('#vacancyGrid').empty();
        $('#vacancyLoader').show();

        if (animate) {
            $('html, body').animate({
                scrollTop: $("#vacancySection").offset().top - 80
            }, 500);
        }

        $.ajax({
            url: "{{ route('vacancies.get') }}",
            type: "GET",
            data: { state_id: stateId },
            success: function(response) {
                $('#vacancyLoader').hide();
                $('#vacancyGrid').html(response.html);
            }
        });
    }

    $(document).on('click', '.state-btn', function() {
        loadVacancies($(this), true);
    });

    if ($('.state-btn').length === 1) {
        loadVacancies($('.state-btn').first(), false);
    }
});
</script>

@endpush

@push('styles')
<style>
    .bg-ayurveda { 
        background: linear-gradient(135deg, #198754 0%, #0f5132 100%);
    }
    .text-warning { color: #ffc107 !important; }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1) !important; }
    .transition-hover { transition: all 0.3s ease-in-out; }
    .transition-hover:hover { transform: translateY(-10px); box-shadow: 0 1rem 3rem rgba(0,0,0,.15) !important; }
    .state-btn.bg-success-subtle { border-color: #198754 !important; }
    .otp-input:focus { border-color: #198754 !important; box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25); outline: 0; }
    .cursor-pointer { cursor: pointer; }

</style>
@endpush
