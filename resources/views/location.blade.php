@extends('layouts.app')

@section('title', 'Location - Ayurveda Health Research Center')

@section('content')
    <section class="py-5 bg-primary-light">
        <div class="container py-5 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">Find Us in Haridwar</h1>
            <p class="lead text-muted">Visit our center for a transformative healing experience.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="bg-white p-5 rounded-5 shadow-lg h-100">
                        <h2 class="mb-5">Contact Details</h2>
                        <div class="d-flex mb-4">
                            <i class="bi bi-geo-alt-fill text-primary fs-3 me-4"></i>
                            <div>
                                <h5>Our Address</h5>
                                <p class="text-muted">Rishikul, Opposit Sanskrit School, Haridwar - 249410</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="bi bi-telephone-fill text-primary fs-3 me-4"></i>
                            <div>
                                <h5>Call Us</h5>
                                <p class="text-muted">+91 98765 43210</p>
                            </div>
                        </div>
                        <h5 class="mb-3">Opening Hours</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Monday - Saturday</span>
                            <span class="text-primary fw-bold">9:00 AM - 7:00 PM</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Sunday</span>
                            <span class="text-danger fw-bold">Closed</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="rounded-5 overflow-hidden shadow-lg h-100" style="min-height: 400px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.7!2d78.1!3d29.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU0JzAwLjAiTiA3OMKwMDYnMDAuMCJF!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
