<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $candidate->id }}"
    aria-labelledby="offcanvasShowLabel" style="width:1250px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">{{ $candidate->email }}</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="row d-flex align-items-center justify-content-start ">
            <div class="col-12">
                <div class="card d-flex align-items-center p-3 shadow-lg" >
                    <div class="d-flex align-items-center w-100">
                        <div class="avatar avatar-xl avatar-soft-danger  avatar-rounded -2">
                            <span class="initial-wrap">
                                {{ strtoupper(substr($candidate->first_name, 0, 1)) }}{{ strtoupper(substr($candidate->last_name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-grow-1 px-3">
                            <h5 style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $candidate->first_name }} {{ $candidate->last_name }} </h5>
                            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i>  {{ $candidate->current_position }} | {{ $candidate->current_company }}  </p>
                            <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill"></i>  {{ $candidate->city }},  {{ $candidate->country }}</p>
                        </div>
                        <div class="flex-grow-1 px-3">
                            <a href="{{ $candidate->getMedia('cv')->first()?->getUrl() }}" target="_blank" class="btn btn-link p-0" title="View CV">
                                <div class="badge-icon badge-circle badge-icon-sm text-gray">
                                    <div class="badge-icon-wrap">
                                        <i data-feather="download"></i>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                                        <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke"><circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" /><circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke"fill="currentColor" /></g>
                                    </svg>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="d-flex align-items-center mt-3 flex-wrap">
                        @foreach ($candidate->tags as $tag)
                            <span class="badge bg-secondary me-2" style="font-size:12px;">{{ $tag->name }}</span>
                        @endforeach
                        <a href="#" class="badge bg-danger text-white text-decoration-none" style="font-size:12px;" data-bs-toggle="modal" data-bs-target="#addTag{{$candidate->id}}">+ Tags</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Summary{{$candidate->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-list-check" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">Summary</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#CV{{$candidate->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-list-check" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">CV</span>
                    </a>
                </li>

                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Note{{$candidate->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">Notes</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Attachments{{$candidate->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">Attachments</span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Summary{{$candidate->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#Details{{$candidate->id}}" aria-expanded="true">Candidate Details</a>
                                </div>
                                <div id="Details{{$candidate->id}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mb-2"><strong>Candidate Full Name:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->first_name }} {{ $candidate->last_name }}</div>
                                            <div class="col-6 mb-2"><strong>Gender:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->gender }}</div>
                                            <div class="col-6 mb-2"><strong>University:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->university }}</div>
                                            <div class="col-6 mb-2"><strong>Major:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->major }}</div>
                                            <div class="col-6 mb-2"><strong>Current Position:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->current_position }} | {{ $candidate->current_company }} </div>
                                            <div class="col-6 mb-2"><strong>Candidate Location:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->city }}, {{ $candidate->country }}</div>
                                            <div class="col-6 mb-2"><strong>Birthdate:</strong></div>
                                            <div class="col-6 mb-2">{{ date('d-M-Y', strtotime($candidate->birthdate)) }}</div>
                                            <div class="col-6 mb-2"><strong>Candidate Address:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->address }}</div>
                                            <div class="col-6 mb-2"><strong>Candidate Email Address:</strong></div>
                                            <div class="col-6 mb-2 d-flex align-items-center">{{ $candidate->email }}</div>
                                            <div class="col-6 mb-2"><strong>Candidate Phone Number:</strong></div>
                                            <div class="col-6 mb-2">{{ $candidate->phone }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                                    <a role="button" data-bs-toggle="collapse" href="#Experience{{$candidate->id}}" aria-expanded="true">Experience</a>
                                </div>
                                <div id="Experience{{$candidate->id}}" class="collapse show">
                                    <div class="card-body">
                                        @foreach ($candidate->experiences as $experience)
                                            <div class="mb-3 border-bottom pb-3">
                                                <div class="d-flex align-items-start">
                                                    <i class="fas fa-file-alt fa-lg text-muted me-3"></i>
                                                    <div class="flex-grow-1">
                                                        <h6 class="fw-bold mb-1">{{ $experience->job_title }}</h6>
                                                        <p class="mb-1">
                                                            {{ $experience->company_name }}
                                                            <br>
                                                            <small class="text-muted">
                                                                {{ $experience->start_date }} –
                                                                {{ $experience->is_current ? 'Present' : $experience->end_date }}
                                                            </small>
                                                        </p>
                                                        <p class="text-muted mb-0">
                                                            {{ $experience->city }}, {{ $experience->country }}
                                                        </p>
                                                    </div>

                                                </div>
                                                <p class="mt-2">{{ Str::limit($experience->details, 100, '...') }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                                    <a role="button" data-bs-toggle="collapse" href="#skills{{$candidate->id}}" aria-expanded="true">Skills</a>
                                </div>
                                <div id="skills{{$candidate->id}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($candidate->skills as $skill)
                                                <span class="badge bg-light text-dark d-flex align-items-center p-2 fs-6">
                                                    <span class="badge bg-secondary text-white me-2">{{ $skill->pivot->level }}</span> {{ $skill->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm mb-3">
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#Additional{{$candidate->id}}" aria-expanded="true">Additional Information </a>
                                </div>
                                <div id="Additional{{$candidate->id}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-6 mb-3"><strong>Graduation Date:</strong></div>
                                            <div class="col-6 mb-3 text-end">{{ $candidate->grade_year  }}</div>
                                            <div class="col-6 mb-3"><strong>Years of Experience:</strong></div>
                                            <div class="col-6 mb-3 text-end">{{ $candidate->exp_years . ' Years' }}</div>
                                            <div class="col-6 mb-3"><strong>Current Salary:</strong></div>
                                            <div class="col-6 mb-3 text-end">{{ $candidate->current_salary }} EGP</div>
                                            <div class="col-6 mb-3"><strong>Notice Period:</strong></div>
                                            <div class="col-6 mb-3 text-end">{{ $candidate->notice_period .' Days' }}</div>
                                            <div class="col-6 mb-3"> <strong>Expected Salary:</strong> </div>
                                            <div class="col-6 mb-3 text-end"> {{ $candidate->expected_salary }} EGP</div>
                                            <div class="col-6 mb-3"><strong>Languages:</strong></div>
                                            @php ( $languages =  explode(',', $candidate->languages)) @endphp
                                            <div class="col-6 text-end">
                                                @if ( $languages =  explode(',', $candidate->languages))
                                                    @foreach ($languages as $language)
                                                        <span class="badge bg-light text-dark me-1">{{ $language }}</span>
                                                    @endforeach
                                                @else
                                                    + Add
                                                @endif
                                            </div>
                                            <div class="col-6 mb-3"><strong>LinkedIn:</strong></div>
                                            <div class="col-6 mb-3 text-end">
                                                @if ($candidate->linkedin)
                                                    <a href="{{ $candidate->linkedin }}" target="_blank" class="text-decoration-none">View Profile</a>
                                                @endif
                                            </div>
                                            <div class="col-6 mb-3"><strong>Source:</strong></div>
                                            <div class="col-6 mb-3 text-end">{{ $candidate->source }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="CV{{$candidate->id}}">
                    @if ($candidate->getMedia('cv')->first())
                        <iframe src="{{ $candidate->getMedia('cv')->first()?->getUrl() }}" width="100%" style="height: 66vh;"></iframe>
                    @else
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title">Upload CV</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('cv.upload', $candidate->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                        <label for="cv" class="form-label">Upload CV</label>
                                        <input type="file" class="form-control" id="cv" name="cv" required accept=".pdf">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="Note{{$candidate->id}}">
                    <div class="card shadow-sm mb-3 w-10">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNote{{$candidate->id}}">
                            <i class="fas fa-plus"></i> Add Note
                        </button>
                    </div>
                    @foreach ($candidate->notes as $note)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="text-center me-3 d-flex justify-content-center align-items-center flex-column">
                                    <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-size: 16px;">
                                            {{ strtoupper(substr($note->user?->name, 0, 2)) }}
                                    </div>
                                    <small class="text-primary mt-1 d-block">{{ $note->user?->name }}</small>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="bg-light border rounded p-3">
                                        <p class="mb-0">{{ $note->details }}</p>
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        <i class="fas fa-lock me-1"></i>
                                        Created  {{ $note->created_at->diffForHumans() }} by {{ $note->user?->name }} at {{ $note->created_at->format('d-M-Y h:i A') }}
                                    </small>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    {{-- <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="Attachments{{$candidate->id}}">
                    <div class="row">
                        @foreach ($candidate->getMedia('*') as $attachment)
                            <div class="col-md-6">
                                <div class="card shadow-sm mb-3">
                                    {{-- card head --}}
                                    <div class="card-header">
                                        <a href="{{ $attachment->getUrl() }}" target="_blank" class="text-decoration-none text-dark">
                                            {{ $attachment->collection_name }}
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="text-center me-3 d-flex justify-content-center align-items-center flex-column">
                                                <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-size: 16px;">
                                                    <i class="fas fa-file"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="bg-light border rounded p-3">
                                                    <a href="{{ $attachment->getUrl() }}" target="_blank" class="text-decoration-none text-dark">
                                                        <p class="mb-0">{{ $attachment->file_name }}</p>
                                                    </a>
                                                </div>
                                                <small class="text-muted -bottom-16 -left-16 d-block mt-2">
                                                    <i class="fas fa-lock me-1"></i>
                                                    Created  {{ $attachment->created_at->diffForHumans() }} by {{ $attachment->user?->name }} at {{ $attachment->created_at->format('d-M-Y h:i A') }}
                                                </small>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                {{-- <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
