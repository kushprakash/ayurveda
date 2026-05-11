@extends('layouts.app')

@section('title', 'Blog - Ayurveda Health Research Center')

@section('content')
    <section class="py-5 bg-primary-light">
        <div class="container py-5 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">Wellness Blog</h1>
            <p class="lead text-muted">Insights and tips for a balanced lifestyle.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card border-0 shadow-sm rounded-5 overflow-hidden h-100">
                        <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Yoga">
                        <div class="card-body p-4">
                            <span class="text-primary fw-bold small text-uppercase">Lifestyle</span>
                            <h5 class="mt-2">Morning Rituals for Energy</h5>
                            <p class="text-muted small">Learn how to start your day with Ayurvedic practices that boost vitality...</p>
                            <a href="#" class="btn btn-link p-0 text-decoration-none fw-bold">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
