<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $interview->id }}" aria-labelledby="offcanvasShowLabel" style="width:1050px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">Interview #{{ $interview->id }}</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="row d-flex align-items-center justify-content-start ">
            <div class="col-12">
                <div class="card d-flex align-items-center p-3 shadow-lg" >
                    <div class="d-flex align-items-center w-100">
                        <div class="avatar avatar-xl avatar-soft-danger  avatar-rounded -2">
                            <span class="initial-wrap">
                                {{ strtoupper(substr("#".$interview->id, 0, 4)) }}
                            </span>
                        </div>
                        <div class="flex-grow-1 px-3">
                            <h5 style="font-weight: bold; font-size: 1.4em; display:inline-block">{{ x_('Candidate:', 'general') }} <span class="fw-normal fs-6">{{ $interview->candidate?->email }}</span> </h5>
                            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> {{ x_('Meeting Type:', 'general') }} <span class="fw-bolder fs-6"> {{$interview->meeting_type }}</span></p>
                            <p class="text-muted"><i class="bi bi-calendar-event"></i> {{ x_('Interview Type:', 'general') }} <span class="fw-bolder fs-6">{{ $interview->interview_type }}</span></p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">{{ x_('Edit', 'general') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ x_('Delete', 'general') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Summary{{$interview->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-list-check" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Summary', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Candidate{{$interview->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-briefcase" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Candidate Info', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Note{{$interview->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Notes', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Attachments{{$interview->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Attachments', 'general') }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Summary{{$interview->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#Details{{$interview->id}}" aria-expanded="true">{{ x_('Request Details', 'general') }}</a>
                                </div>
                                <div id="Details{{$interview->id}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5 mb-2"><strong>{{ x_('Job Name :', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">{{$interview->job?->title}} </div>
                                            <div class="col-5 mb-2"><strong>{{ x_('Company Name:', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">{{ $interview->company?->name }}</div>
                                            <div class="col-5 mb-2"><strong>{{ x_('Company Website:', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">{{ $interview->company?->website }}</div>


                                            <div class="col-5 mb-2"><strong>{{ x_('Meeting Info :', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">
                                                @if ($interview->meeting_type == 'On Site')
                                                    <span class="fw-bold">{{ x_('Meeting:', 'general') }} </span> {{ $interview->meeting_type }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">{{ x_('Address:', 'general') }} </span> {{ $interview->address }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">{{ x_('Map Link:', 'general') }}</span> <a href="{{ $interview->map_link }}" target="_blank">{{ x_('Click Here', 'general') }}</a>
                                                @else
                                                    <span class="fw-bold">{{ x_('Meeting:', 'general') }} </span> {{ $interview->meeting_type }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">{{ x_('Meeting Link:', 'general') }} </span> <a href="{{ $interview->meet_link }}" target="_blank">{{ x_('Click Here', 'general') }}</a>
                                                @endif
                                            </div>
                                            <div class="col-5 mb-2"><strong>{{ x_('Did Candidate Attend ?', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">
                                                @if ($interview->is_attended === 1)
                                                    <span class="badge badge-success">{{ x_('Attended', 'general') }}</span>
                                                @elseif ($interview->is_attended === 0)
                                                    <span class="badge badge-danger">{{ x_('Not Attended', 'general') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ x_('Pending', 'general') }}</span>
                                                @endif
                                             </div>
                                            <div class="col-5 mb-2"><strong>{{ x_('Has Candidate Passed ?', 'general') }}</strong></div>
                                            <div class="col-7 mb-2">
                                                @if ($interview->is_passed === 1)
                                                    <span class="badge badge-success">{{ x_('Passed', 'general') }}</span>
                                                @elseif ($interview->is_passed === 0)
                                                    <span class="badge badge-danger">{{ x_('Not Passed', 'general') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ x_('Pending', 'general') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="card shadow-sm">
                                                    <div class="card-header">
                                                        <strong>{{ x_('interview Description:', 'general') }}</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! $interview->details !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Candidate{{$interview->id}}">
                    <div class="card shadow-lg mb-3">
                        <div class="table-responsive">
                            <table  class="table nowrap table-advance table-responsive">
                                <thead>
                                    <tr>
                                        <th>{{ x_('Candidate Name', 'general') }}</th>
                                        <th>{{ x_('Candidate Email', 'general') }}</th>
                                        <th>{{ x_('Match Score', 'general') }}</th>
                                        <th>{{ x_('Match Stage', 'general') }}</th>
                                        <th>{{ x_('Currently Working', 'general') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover-row">
                                        <td style="background: white">
                                            <a href="#" class="btn btn-link p-0 text-danger"  title="{{ x_('View Details', 'general') }}">{{ $interview->candidate?->first_name }} {{ $interview->candidate?->last_name }}  </a>
                                        </td>
                                        <td>{{ $interview->candidate?->email }}</td>
                                        <td>{{ $interview->application?->score }}%</td>
                                        <td>{{ $interview->application?->stage?->name }}</td>
                                        <td>
                                            @if ($interview->application->candidate?->is_working === null)
                                                <span class="badge badge-sm badge-warning">{{ x_('Unknow', 'general') }}</span>
                                            @elseif ($interview->application->candidate?->is_working === 1)
                                                <span class="badge badge-sm badge-success">{{ x_('Yes', 'general') }}</span>
                                            @else
                                                <span class="badge badge-sm badge-danger">{{ x_('No', 'general') }}</span>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card shadow-lg mb-3" style="height: 85vh;">
                        <div class="card-header">
                            <h5 class="card-title">{{ x_('Candidate CV', 'general') }}</h5>
                        </div>
                        <div class="card-body" style="height: 100vh;">
                            <iframe src="{{ $interview->candidate?->getMedia('cv')->first()?->getUrl() }}" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Note{{$interview->id}}">
                    <div class="card shadow-lg mb-3 w-20">
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addNote{{$interview->id}}">
                            <i class="fas fa-plus"></i> Add Note
                        </button>
                    </div>
                    @foreach ($interview->notes as $note)
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
                                        <li><a class="dropdown-item" href="#">{{ x_('Edit', 'general') }}</a></li>
                                        <li><a class="dropdown-item" href="#">{{ x_('Delete', 'general') }}</a></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="Attachments{{$interview->id}}">
                    <div class="card shadow-sm mb-3 w-20">
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addAttachment{{$interview->id}}">
                            <i class="fas fa-plus"></i> Add Attachment
                        </button>
                    </div>
                    <div class="row">
                        @foreach ($interview->getMedia('*') as $attachment)
                            <div class="col-md-6">
                                <div class="card shadow-sm mb-3">
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
                                                    <li><a class="dropdown-item" href="#">{{ x_('Edit', 'general') }}</a></li>
                                                    <li><a class="dropdown-item" href="#">{{ x_('Delete', 'general') }}</a></li>
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
