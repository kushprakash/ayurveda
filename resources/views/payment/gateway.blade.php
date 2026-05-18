@extends('layouts.app')

@section('title', 'Secure Payment - Ayurveda Health Research Center')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="bg-white p-5 rounded-5 shadow-lg border-top border-primary border-5">
                    <div class="text-center mb-5">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/UPI-Logo.png" height="30" class="mb-4">
                        <h4 class="fw-bold mb-1">Complete Your Payment</h4>
                        <p class="text-muted small">Application ID: <span class="text-primary fw-bold">{{ $application->application_no }}</span></p>
                    </div>

                    <div class="p-4 rounded-5 bg-primary-subtle text-center mb-5">
                        <h6 class="text-muted small fw-bold text-uppercase mb-2">Payable Amount</h6>
                        <h2 class="fw-bold text-primary mb-0">₹{{ number_format($application->total_amount) }}</h2>
                    </div>

                    <div class="payment-options mb-5">
                        <h6 class="fw-bold small mb-3">Select Payment Method</h6>
                        <div class="list-group list-group-flush gap-3">
                            <label class="list-group-item rounded-4 border p-3 d-flex align-items-center gap-3 cursor-pointer transition-hover">
                                <input class="form-check-input me-1" type="radio" name="payment_method" value="UPI" checked>
                                <div class="p-2 bg-light rounded-circle"><i class="bi bi-qr-code-scan fs-4 text-primary"></i></div>
                                <div>
                                    <div class="fw-bold">UPI / QR Code</div>
                                    <div class="small text-muted">Google Pay, PhonePe, Paytm</div>
                                </div>
                            </label>
                            <label class="list-group-item rounded-4 border p-3 d-flex align-items-center gap-3 cursor-pointer transition-hover">
                                <input class="form-check-input me-1" type="radio" name="payment_method" value="CARD">
                                <div class="p-2 bg-light rounded-circle"><i class="bi bi-credit-card fs-4 text-primary"></i></div>
                                <div>
                                    <div class="fw-bold">Debit / Credit Card</div>
                                    <div class="small text-muted">Visa, Mastercard, RuPay</div>
                                </div>
                            </label>
                            <label class="list-group-item rounded-4 border p-3 d-flex align-items-center gap-3 cursor-pointer transition-hover">
                                <input class="form-check-input me-1" type="radio" name="payment_method" value="NETBANKING">
                                <div class="p-2 bg-light rounded-circle"><i class="bi bi-bank fs-4 text-primary"></i></div>
                                <div>
                                    <div class="fw-bold">Net Banking</div>
                                    <div class="small text-muted">All Indian Banks Supported</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button type="button" id="payNowBtn" class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold shadow">
                        Pay ₹{{ number_format($application->total_amount) }} Now
                    </button>

                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0"><i class="bi bi-shield-fill-check text-success me-1"></i> 128-bit SSL Secure Payment</p>
                        <img src="https://www.merchantequip.com/image/?logos=v|m|a|d|p|j&height=24" class="mt-2 opacity-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    $('#payNowBtn').on('click', function() {
        var $btn = $(this);
        var method = $('input[name="payment_method"]:checked').val();
        
        $btn.html('<span class="spinner-border spinner-border-sm"></span> Processing Securely...').prop('disabled', true);

        // Simulate Gateway Processing
        setTimeout(function() {
            $.ajax({
                url: "{{ route('apply.payment.process') }}",
                type: "POST",
                data: {
                    application_id: "{{ $application->id }}",
                    payment_method: method,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if(response.success) {
                        Swal.fire({
                            title: 'Payment Successful!',
                            text: 'Redirecting to your application receipt...',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            window.location.href = response.redirect;
                        });
                    }
                }
            });
        }, 3000);
    });
});
</script>
@endpush

@push('styles')
<style>
    .cursor-pointer { cursor: pointer; }
    .transition-hover:hover { background-color: #f8f9fa; border-color: #0d6efd !important; }
    .bg-primary-subtle { background-color: rgba(13, 110, 253, 0.05) !important; }
</style>
@endpush
