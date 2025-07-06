<div class="col-md-9 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
    <div class="ps-md-3 ps-lg-0 mt-md-2">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="mb-2 d-flex align-items-center">
                    <a href="{{ route('client.services.requested') }}" class="btn btn-outline-secondary btn-sm me-3">
                        <i class="ri-arrow-left-line fs-5"></i>
                    </a>
                    <h1 class="mb-0 h2 pt-xl-1">My Service Request Details</h1>
                </div>
                <p class="mb-0 text-muted">Requested on {{ $demand->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                @if ($demand->is_completed)
                    <span class="p-2 badge bg-success fs-sm">Completed</span>
                @elseif($demand->is_accepted)
                    <span class="p-2 badge bg-primary fs-sm">Accepted</span>
                @elseif($demand->is_rejected)
                    <span class="p-2 badge bg-danger fs-sm">Rejected</span>
                @else
                    <span class="p-2 badge bg-warning text-dark fs-sm">Pending</span>
                @endif
            </div>
        </div>

        <div class="row g-4">
            <!-- Service Provider Details -->
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card h-100">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">Service Provider</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            @if ($demand->to_client->getFirstMediaUrl('profile_picture'))
                                <img src="{{ $demand->to_client->getFirstMediaUrl('profile_picture') }}"
                                    class="rounded-circle me-3" width="80" height="80"
                                    alt="{{ $demand->to_client->name }}">
                            @else
                                <div class="rounded-circle bg-secondary me-3 d-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="text-dark ri-user-line fs-3"></i>
                                </div>
                            @endif
                            <div>
                                <h4 class="mb-1">{{ $demand->to_client->name }}</h4>
                                <p class="mb-0 text-muted">{{ $demand->to_client->email }}</p>
                            </div>
                        </div>

                        @if($demand->to_client->about)
                        <div class="mb-3">
                            <h6>About</h6>
                            <p>{{ $demand->to_client->about }}</p>
                        </div>
                        @endif

                        @if($demand->to_client->address || $demand->to_client->phone)
                        <div class="mb-3">
                            <h6>Contact Information</h6>
                            @if($demand->to_client->address)
                                <p class="mb-1"><i class="ri-map-pin-line me-2"></i>{{ $demand->to_client->address }}</p>
                            @endif
                            @if($demand->to_client->phone)
                                <p class="mb-0"><i class="ri-phone-line me-2"></i>{{ $demand->to_client->phone }}</p>
                            @endif
                        </div>
                        @endif

                        @if($demand->is_accepted && !$demand->is_completed)
                        <div class="mt-3">
                            <a href="mailto:{{ $demand->to_client->email }}" class="btn btn-outline-primary">
                                <i class="ri-mail-line me-2"></i>Contact Provider
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Service Details -->
            <div class="col-md-6">
                <div class="mb-4 border-0 shadow-sm card h-100">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center">
                            <div class="rounded bg-secondary me-3 d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px;">
                                <i class="text-dark ri-briefcase-line fs-3"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ $demand->service->name }}</h5>
                                <p class="mb-0 text-muted">{{ $demand->service->short_description }}</p>
                            </div>
                        </div>

                        @if($demand->service->skills)
                        <div class="mb-3">
                            <h6>Skills</h6>
                            <div class="flex-wrap gap-2 d-flex">
                                @foreach ($demand->service->skills as $skill)
                                    <span class="badge bg-light text-dark">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($demand->service->level)
                        <div class="mb-3">
                            <h6>Skill Level</h6>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 10; $i++)
                                    <i class="bx {{ $i <= $demand->service->level ? 'bxs-star text-warning' : 'bx-star' }}"></i>
                                @endfor
                            </div>
                        </div>
                        @endif

                        <div class="mb-3">
                            <h6>Price Range</h6>
                            <p class="mb-0">${{ number_format($demand->service->price_min) }} -
                                ${{ number_format($demand->service->price_max) }}</p>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Request Details -->
            <div class="col-md-12">
                <div class="mb-4 border-0 shadow-sm card">
                    <div class="bg-transparent card-header d-flex align-items-center">
                        <h5 class="mb-0">My Request Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h6>Project Description</h6>
                            <p>{{ $demand->details }}</p>
                        </div>

                        <div class="mb-4 row">
                            <div class="mb-3 col-md-4">
                                <h6>Budget</h6>
                                <p class="mb-0">
                                    @if ($demand->budget_min && $demand->budget_max)
                                        ${{ number_format($demand->budget_min, 0) }} -
                                        ${{ number_format($demand->budget_max, 0) }}
                                    @elseif($demand->budget_min)
                                        ${{ number_format($demand->budget_min, 0) }}+
                                    @elseif($demand->budget_max)
                                        Up to ${{ number_format($demand->budget_max, 0) }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3 col-md-4">
                                <h6>Timeframe</h6>
                                <p class="mb-0">{{ $demand->weeks ?? 'Not specified' }} {{ $demand->weeks > 1 ? 'weeks' : 'week' }}</p>
                            </div>
                            @if ($demand->start_date)
                                <div class="col-md-4">
                                    <h6>Start Date</h6>
                                    <p class="mb-0">{{ \Carbon\Carbon::parse($demand->start_date)->format('M d, Y') }}</p>
                                </div>
                            @endif
                        </div>

                        @if($demand->getFirstMedia('proposal'))
                        <div class="mb-3">
                            <h6>My Attached Proposal</h6>
                            <div class="p-3 rounded border bg-light">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded me-3 bg-primary">
                                            <i class="text-dark ri-file-pdf-line fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ $demand->getFirstMedia('proposal')->file_name }}</h6>
                                            <small class="text-muted">
                                                {{ number_format($demand->getFirstMedia('proposal')->size / 1024, 2) }} KB • Uploaded
                                                {{ $demand->getFirstMedia('proposal')->created_at->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    <a href="{{ $demand->getFirstMediaUrl('proposal') }}" class="btn btn-primary" target="_blank">
                                        <i class="ri-download-line me-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!$demand->is_accepted && !$demand->is_rejected && !$demand->getFirstMedia('proposal'))
                        <div class="mt-3">
                            <div class="alert alert-info d-flex align-items-center">
                                <i class="ri-information-line fs-4 me-2"></i>
                                <div>
                                    <strong>Tip:</strong> Attach a detailed proposal to increase your chances of getting accepted.
                                </div>
                            </div>
                            <form action="{{ route('client.services.demand.upload_proposal', $demand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="proposal" class="form-label">Upload Proposal (PDF, DOC, DOCX)</label>
                                    <input type="file" class="form-control" id="proposal" name="proposal" accept=".pdf,.doc,.docx" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-upload-line me-2"></i>Upload Proposal
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex-wrap gap-3 mt-4 d-flex justify-content-between">
            <div>
                @if($demand->is_completed)
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#leaveReviewModal">
                    <i class="ri-star-line me-2"></i>Leave a Review
                </a>
                @endif
            </div>

            <div>
                @if(!$demand->is_completed && !$demand->is_rejected)
                <form action="{{ route('client.services.demand.cancel', $demand->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"
                        onclick="return confirm('Are you sure you want to cancel this request? This action cannot be undone.')">
                        <i class="ri-close-circle-line me-2"></i>Cancel Request
                    </button>
                </form>
                @endif

                @if($demand->is_accepted && !$demand->is_completed)
                <form action="{{ route('client.services.demand.complete', $demand->id) }}" method="POST" class="d-inline ms-2">
                    @csrf
                    <button type="submit" class="btn btn-success"
                        onclick="return confirm('Are you sure you want to mark this as completed?')">
                        <i class="ri-check-circle-line me-2"></i>Mark as Completed
                    </button>
                </form>
                @endif
            </div>
        </div>

        <!-- Review Section - Show if a review exists -->
        @if($demand->is_completed && isset($existingReview) && $existingReview)
        <div class="mt-4">
            <div class="border-0 shadow-sm card">
                <div class="bg-transparent card-header">
                    <h5 class="mb-0">Your Review</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2 d-flex align-items-center">
                        <div class="me-3">
                            <div class="p-2 rounded bg-light">
                                <i class="ri-star-fill text-warning fs-4"></i>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <strong>Your rating:</strong>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="ri {{ $i <= $existingReview->rating ? 'ri-star-fill text-warning' : 'ri-star-line' }}"></i>
                                @endfor
                                <span class="ms-2 text-muted">({{ $existingReview->rating }}/5)</span>
                            </div>
                            <div class="text-muted small">Submitted on {{ $existingReview->created_at->format('M d, Y') }}</div>
                            @if(!$existingReview->is_approved)
                                <span class="badge bg-warning text-dark">Pending approval</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="mb-2">{{ $existingReview->content }}</p>
                    </div>
                    <div class="mt-2">
                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#leaveReviewModal">
                            <i class="ri-edit-line me-1"></i> Edit Review
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Leave Review Modal -->
<div class="modal fade" id="leaveReviewModal" tabindex="-1" aria-labelledby="leaveReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaveReviewModalLabel">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('client.services.review', $demand->id) }}" method="POST" id="reviewForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <div class="mb-2 star-rating-input">
                            <div class="d-flex">
                                @for($i = 1; $i <= 5; $i++)
                                <div class="mx-2 form-check">
                                    <input class="form-check-input" type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}"
                                        {{ (isset($existingReview) && $existingReview && $existingReview->rating == $i) ||
                                           (!isset($existingReview) && $i == 5) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rating{{ $i }}">
                                        {{ $i }} <i class="ri-star-fill text-warning"></i>
                                    </label>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @error('rating')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reviewContent" class="form-label">Your Review <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="reviewContent" name="content" rows="4" required minlength="10" maxlength="1000">{{ isset($existingReview) && $existingReview ? $existingReview->content : '' }}</textarea>
                        <small class="form-text text-muted">Please enter at least 10 characters</small>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ isset($existingReview) && $existingReview ? 'Update Review' : 'Submit Review' }}</button>
                </form>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('reviewForm');
                    form.addEventListener('submit', function(event) {
                        const content = document.getElementById('reviewContent').value;
                        if (content.length < 10) {
                            event.preventDefault();
                            alert('Please enter at least 10 characters for your review.');
                        }
                    });
                });
                </script>
            </div>
        </div>
    </div>
</div>
