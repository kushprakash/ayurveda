@extends('layouts.app')

@section('title', 'Consultation - Ayurveda Health Research Center')

@section('content')
    <section class="py-5 bg-primary-light">
        <div class="container py-5 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">Expert Consultation</h1>
            <p class="lead text-muted">Get personalized health advice from our certified Ayurvedic practitioners.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="mb-4">Meet Our Experts</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="doctor-card">
                                <img src="{{ asset('images/doctors.png') }}" alt="Dr. Sharma" class="doctor-img">
                                <div class="doctor-info">
                                    <h5>Dr. Arvind Sharma</h5>
                                    <p class="text-primary fw-bold">BAMS, MD (Ayurveda)</p>
                                    <p class="text-muted small">Specialist in Panchakarma and Chronic diseases with over 15 years of clinical experience.</p>
                                    <a href="#book-form" class="btn btn-outline-primary w-100">Select Doctor</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="doctor-card">
                                <img src="https://images.unsplash.com/photo-1559839734-2b71f1e3c77c?auto=format&fit=crop&w=600&q=80" alt="Dr. Mehra" class="doctor-img">
                                <div class="doctor-info">
                                    <h5>Dr. Sunita Mehra</h5>
                                    <p class="text-primary fw-bold">BAMS, Dermatology</p>
                                    <p class="text-muted small">Expert in Ayurvedic skin care and hair health. Dedicated to natural beauty solutions.</p>
                                    <a href="#book-form" class="btn btn-outline-primary w-100">Select Doctor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="book-form" data-aos="fade-left">
                    <div class="bg-white p-5 rounded-5 shadow-lg">
                        <h3 class="mb-4">Book Your Slot</h3>
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control rounded-pill" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" class="form-control rounded-pill">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Select Service</label>
                                <select class="form-select rounded-pill">
                                    <option>General Consultation</option>
                                    <option>Skin Care Analysis</option>
                                    <option>Panchakarma Guidance</option>
                                    <option>Lifestyle Coaching</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill">Confirm Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
