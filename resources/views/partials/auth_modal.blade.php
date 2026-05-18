<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-5 shadow-lg overflow-hidden">
            <div class="bg-success p-4 text-center text-white">
                <h4 class="fw-bold mb-1">Applicant Registration</h4>
                <p class="small opacity-75 mb-0">Join the Ayurveda Community</p>
            </div>
            <div class="modal-body p-5">
                <form id="registrationForm">
                    @csrf
                    <input type="hidden" name="vacancy_id" id="modal_vacancy_id">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Full Name</label>
                        <input type="text" name="name" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Mobile Number</label>
                        <input type="tel" name="phone" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="10 Digit Mobile" required maxlength="10">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-pill px-4 py-3 border-light shadow-sm" placeholder="yourname@email.com" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg rounded-pill w-100 py-3 shadow fw-bold">Register & Verify</button>
                </form>

                <!-- OTP Section (Hidden initially) -->
                <div id="otpSection" style="display: none;">
                    <div class="text-center mb-4 mt-2">
                        <h5 class="fw-bold">Verify OTP</h5>
                        <p class="text-muted small">Enter the 4-digit code sent to your mobile</p>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-4" id="otpInputs">
                        <input type="text" class="form-control text-center rounded-3 fs-3 fw-bold otp-input" maxlength="1" style="width: 55px; height: 65px; border: 2px solid #eee;">
                        <input type="text" class="form-control text-center rounded-3 fs-3 fw-bold otp-input" maxlength="1" style="width: 55px; height: 65px; border: 2px solid #eee;">
                        <input type="text" class="form-control text-center rounded-3 fs-3 fw-bold otp-input" maxlength="1" style="width: 55px; height: 65px; border: 2px solid #eee;">
                        <input type="text" class="form-control text-center rounded-3 fs-3 fw-bold otp-input" maxlength="1" style="width: 55px; height: 65px; border: 2px solid #eee;">
                    </div>
                    <button id="verifyOtpBtn" class="btn btn-success btn-lg rounded-pill w-100 py-3 shadow fw-bold">Verify & Login</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Handle Application Registration
    $(document).on('click', '.btn-apply', function(e) {
        @if(auth()->check())
            // Continue to apply form logic
        @else
            e.preventDefault();
            $('#modal_vacancy_id').val($(this).data('id'));
            $('#registerModal').modal('show');
        @endif
    });

    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        var $btn = $(this).find('button');
        var originalBtnHtml = $btn.html();
        $btn.html('<span class="spinner-border spinner-border-sm"></span> Processing...').prop('disabled', true);
        
        $.ajax({
            url: "{{ route('applicant.register') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if(response.success) {
                    $('#registrationForm').fadeOut(function() {
                        $('#otpSection').fadeIn();
                    });
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            complete: function() {
                $btn.html(originalBtnHtml).prop('disabled', false);
            }
        });
    });

    $('.otp-input').on('keyup', function(e) {
        if(this.value.length == 1) {
            $(this).next('.otp-input').focus();
        }
        if(e.key === "Backspace" && this.value.length == 0) {
            $(this).prev('.otp-input').focus();
        }
    });

    $('#verifyOtpBtn').on('click', function() {
        var otp = '';
        $('#otpInputs .otp-input').each(function() { otp += $(this).val(); });
        
        if(otp.length < 4) {
            Swal.fire('Error', 'Please enter full OTP', 'warning');
            return;
        }

        var $btn = $(this);
        $btn.html('<span class="spinner-border spinner-border-sm"></span> Verifying...').prop('disabled', true);

        $.ajax({
            url: "{{ route('otp.verify') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                otp: otp,
                vacancy_id: $('#modal_vacancy_id').val()
            },
            success: function(response) {
                if(response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Verified!',
                        text: 'Welcome to the Ayurveda Health Revolution.',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                } else {
                    Swal.fire('Invalid OTP', 'The OTP you entered is incorrect.', 'error');
                }
            },
            complete: function() {
                $btn.html('Verify & Login').prop('disabled', false);
            }
        });
    });
});
</script>
@endpush

