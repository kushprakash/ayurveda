@extends('layouts.app')

@section('title', 'Complete Payment - GWCT Recruitment')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-white p-5 rounded-5 shadow-lg text-center" data-aos="zoom-in">
                    <div class="mb-4">
                        <i class="bi bi-wallet2 display-1 text-primary"></i>
                    </div>
                    <h2 class="fw-bold mb-2">Final Payment</h2>
                    <p class="text-muted">Application No: <span class="text-primary fw-bold">{{ $application->application_no }}</span></p>
                    
                    <div class="my-5 p-4 rounded-4 bg-light text-start">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Post Name</span>
                            <span class="fw-bold">{{ $application->vacancy->post->name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Basic Fee</span>
                            <span class="fw-bold">₹{{ number_format($application->vacancy->post->application_fee) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">GST ({{ $application->vacancy->post->gst_percentage }}%)</span>
                            <span class="fw-bold">₹{{ number_format($application->vacancy->post->application_fee * $application->vacancy->post->gst_percentage / 100) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold fs-5">Total Payable</span>
                            <span class="fw-bold fs-5 text-primary">₹{{ number_format($application->total_amount) }}</span>
                        </div>
                    </div>

                    <div class="payment-options mb-4">
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="p-3 border rounded-4 transition-hover cursor-pointer border-primary bg-primary-light">
                                    <img src="{{ asset('images/razorpay.png') }}" alt="Razorpay" class="img-fluid" onerror="this.src='https://cdn.razorpay.com/static/assets/logo/payment.svg'">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-3 border rounded-4 transition-hover cursor-pointer">
                                    <img src="{{ asset('images/phonepe.png') }}" alt="PhonePe" class="img-fluid" onerror="this.src='https://www.phonepe.com/app/uploads/2021/05/phonepe-logo-icon.png'">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-3 border rounded-4 transition-hover cursor-pointer">
                                    <img src="{{ asset('images/payu.png') }}" alt="PayU" class="img-fluid" onerror="this.src='https://corporate.payu.com/wp-content/themes/payu-corporate/assets/images/logo-payu.svg'">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="payNowBtn" class="btn btn-primary btn-lg rounded-pill w-100 py-3 shadow mb-4">
                        Pay ₹{{ number_format($application->total_amount) }} Now
                    </button>
                    
                    <p class="small text-muted mb-0">
                        <i class="bi bi-shield-lock-fill text-success me-1"></i> SSL Secured Payment Gateway
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function() {
    $('#payNowBtn').on('click', function() {
        // Here you would normally call your backend to create a Razorpay order
        // For this demo, we simulate a success redirect
        
        Swal.fire({
            title: 'Redirecting to Payment Gateway...',
            html: 'Please do not refresh the page.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            // Simulate Payment Success
            Swal.fire({
                icon: 'success',
                title: 'Payment Successful!',
                text: 'Your application has been submitted. Redirecting to dashboard...',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('dashboard') }}";
            });
        }, 2000);
    });
});
</script>
@endpush
