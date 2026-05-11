@extends('layouts.app')

@section('title', 'About Us - Ayurveda Health Research Center')

@section('content')
    <!-- Header -->
    <section class="py-5 bg-primary-light">
        <div class="container py-5 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">About Us</h1>
            <p class="lead text-muted">Dedicated to preventive healthcare, wellness awareness, and affordable treatment.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?auto=format&fit=crop&w=800&q=80" alt="Ayurveda" class="img-fluid rounded-5 shadow-lg">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="mb-4">Ayurveda Health Research Center</h2>
                    <p>Ayurveda Health Research Center is dedicated to preventive healthcare, wellness awareness, and affordable treatment support. Our focus is to help individuals and families maintain good health through regular checkups, health camps, and professional consultation services.</p>
                    <p>We combine Ayurvedic values with modern healthcare support to encourage early diagnosis, healthy living, and long-term wellness.</p>
                    
                    <h5 class="mt-4 mb-3">Our Core Services</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Quarterly Full Body Health Checkups</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Health Camps and Wellness Programs</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Medicine and Diagnostic Test Support</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Doctor Consultation Services</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Preventive Healthcare Guidance</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Community Health Awareness Programs</li>
                    </ul>
                </div>
            </div>

            <div class="row g-4 mt-5">
                <!-- Mission -->
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="p-5 rounded-5 bg-white shadow-sm h-100 border-start border-primary border-5">
                        <h2 class="mb-4 text-primary">Our Mission</h2>
                        <p class="mb-4">Our mission is to ensure that people stay healthy and protected from diseases through preventive healthcare, regular checkups, and timely medical guidance. We aim to:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Prevent diseases before they become serious</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Promote regular health checkups and wellness awareness</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Encourage healthy lifestyles and preventive care</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Provide accessible healthcare support to everyone</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Improve community health through awareness and education</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Support families with continuous healthcare guidance</li>
                        </ul>
                    </div>
                </div>
                <!-- Vision -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-5 rounded-5 bg-primary-light h-100 border-start border-secondary border-5">
                        <h2 class="mb-4 text-secondary">Our Vision</h2>
                        <p class="mb-4">Our vision is to build a healthy, aware, and disease-free society where every individual has access to preventive healthcare and wellness support. We envision:</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Early detection and prevention of illnesses</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Better health awareness in every community</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Regular health checkups becoming a healthy habit</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> Accessible healthcare support for all families</li>
                            <li class="mb-2"><i class="bi bi-dot me-2"></i> A future where diseases are controlled before becoming serious</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
