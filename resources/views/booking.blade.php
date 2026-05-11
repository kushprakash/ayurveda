@extends('layouts.app')

@section('title', 'Book Now - Ayurveda Health Research Center')

@section('content')
    <section class="py-5 bg-primary-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h2>Book Your Wellness Journey</h2>
                        <p class="text-muted">Fill out the form below and we'll get back to you within 24 hours.</p>
                    </div>
                    <div class="bg-white p-5 rounded-5 shadow-lg" data-aos="zoom-in">
                        <form>
                            @csrf
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control rounded-pill">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control rounded-pill">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control rounded-pill">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control rounded-pill">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Message (Optional)</label>
                                <textarea class="form-control rounded-4" rows="4" placeholder="Tell us about your health goals..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill py-3">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
