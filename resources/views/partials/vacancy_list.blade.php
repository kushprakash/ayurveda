@foreach($vacancies as $vacancy)
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm rounded-5 transition-hover overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2 fw-bold text-uppercase" style="font-size: 10px;">{{ $vacancy->post->code }}</span>
                    <span class="text-success small fw-bold"><i class="bi bi-geo-alt-fill me-1"></i>{{ ucfirst($vacancy->level) }} Level</span>
                </div>
                <h5 class="card-title fw-bold mb-1">{{ $vacancy->post->name }}</h5>
                <p class="text-muted small mb-3">{{ $vacancy->department }} | Stipend: <span class="fw-bold text-dark">₹{{ number_format($vacancy->post->salary) }}</span></p>
                
                <div class="p-3 bg-light rounded-4 mb-4">
                    <div class="row g-2">
                        <div class="col-6">
                            <small class="text-muted d-block small text-uppercase" style="font-size: 9px;">Total Seats</small>
                            <span class="fw-bold text-dark">{{ $vacancy->total_seats }}</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block small text-uppercase" style="font-size: 9px;">Last Date</small>
                            <span class="fw-bold text-danger">{{ \Carbon\Carbon::parse($vacancy->end_date)->format('d M, Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('vacancy.details', $vacancy->id) }}" class="btn btn-outline-success rounded-pill flex-grow-1 fw-bold small">View Details</a>
                    <a href="{{ route('apply.form', $vacancy->id) }}" class="btn btn-success rounded-pill flex-grow-1 fw-bold small btn-apply" data-id="{{ $vacancy->id }}">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if($vacancies->isEmpty())
    <div class="col-12 text-center py-5">
        <div class="p-5 bg-white rounded-5 shadow-sm">
            <i class="bi bi-search display-1 text-muted opacity-25"></i>
            <p class="text-muted mt-3 mb-0">No active vacancies found for this state at the moment.</p>
        </div>
    </div>
@endif
