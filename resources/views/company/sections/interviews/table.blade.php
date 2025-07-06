<div class="tab-pane fade show active nicescroll-bar" id="upcomming">
    <div class="container-fluid px-5 pt-5">
        <div class="row">
            <div class="col-md-12 mb-md-4 mb-3">
                <div class="card rounded-8 mb-0">
                    <div class="card-header card-header-action">
                        <h6>Up Comming Interviews  <span class="badge badge-sm badge-light ms-1">{{$interviews->count()}}</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="contact-list-view table-responsive">
                            <table id="datable_4c" class="table nowrap" style="min-width: 90vw;">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Candidate Email</th>
                                        <th>Job Name</th>
                                        <th>Match Score</th>
                                        <th>Interview Type</th>
                                        <th>Date & Time</th>
                                        <th>Meeting Attend Info</th>
                                        <th>Duration</th>
                                        <th>Did Candidate Attend ?</th>
                                        <th>Has Candidate Passed ?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($interviews as $interview)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$interview->id}}" title="View Details">
                                                    Interview #{{ $interview->id }}
                                                </button>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item delete-tasklist" href="{{ route('jobs.single', $interview->id) }}" >Open Interview </a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$interview->id}}" >Edit Interview  </a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$interview->id}}" >Delete Interview  </a>
                                                </div>
                                            </td>
                                            <td>{{ $interview->candidate?->email }}</td>
                                            <td>{{ $interview->job?->title }}</td>
                                            <td>{{ $interview->application?->score }}%</td>
                                            <td>{{ $interview->interview_type }}</td>
                                            <td>
                                                <span class="fw-bold">Date:</span> {{ $interview->date }}
                                                <hr class="m-2 p-0" style="border-color:red;">
                                                <span class="fw-bold">Time:</span>  {{ $interview->time}}</td>
                                            @if ($interview->meeting_type == 'On Site')
                                                <td>
                                                    <span class="fw-bold">Meeting: </span> {{ $interview->meeting_type }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">Address: </span> {{ $interview->address }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">Map Link:</span> <a href="{{ $interview->map_link }}" target="_blank">Click Here</a>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="fw-bold">Meeting: </span> {{ $interview->meeting_type }}
                                                    <hr class="m-2 p-0" style="border-color:red;">
                                                    <span class="fw-bold">Meeting Link: </span> <a href="{{ $interview->meet_link }}" target="_blank">Click Here</a>
                                                </td>
                                            @endif
                                            <td>{{ $interview->duration }} Min</td>
                                            <td>
                                                @if ($interview->is_attended === 1)
                                                    <span class="badge badge-success">Attended</span>
                                                @elseif ($interview->is_attended === 0)
                                                    <span class="badge badge-danger">Not Attended</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($interview->is_passed === 1)
                                                    <span class="badge badge-success">Passed</span>
                                                @elseif ($interview->is_passed === 0)
                                                    <span class="badge badge-danger">Not Passed</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="tab-pane fade   nicescroll-bar" id="history">
    <div class="container-fluid px-5 pt-5">
        <div class="row">
            <div class="col-md-12 mb-md-4 mb-3">
                <div class="card rounded-8 mb-0">
                    <div class="card-header card-header-action">
                        <h6> Interviews History <span class="badge badge-sm badge-light ms-1">{{$interviews->where('date','<',now())->count()}}</span></h6>

                    </div>
                    <div class="card-body">
                        <div class="contact-list-view table-responsive">
                            <table id="datable_4c1" class="table nowrap" style="min-width: 90vw;">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Candidate Email</th>
                                        <th>Job Name</th>
                                        <th>Company Name</th>
                                        <th>Match Score</th>
                                        <th>Interview Type</th>
                                        <th>Date & Time</th>
                                        <th>Meeting Attend Info</th>
                                        <th>Duration</th>
                                        <th>Did Candidate Attend ?</th>
                                        <th>Has Candidate Passed ?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($interviews->where('date','<',now()) as $interview)
                                    <tr class="hover-row">
                                        <td style="background: white">
                                            <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$interview->id}}" title="View Details">
                                                Interview #{{ $interview->id }}
                                            </button>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                <span class="icon">
                                                    <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                </span>
                                            </a>
                                            <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$interview->id}}" >Edit Interview  </a>
                                                <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$interview->id}}" >Delete Interview  </a>
                                            </div>
                                        </td>
                                        <td>{{ $interview->candidate?->email }}</td>
                                        <td>{{ $interview->job?->title }}</td>
                                        <td>{{ $interview->company?->name }}</td>
                                        <td>{{ $interview->application?->score }}%</td>
                                        <td>{{ $interview->interview_type }}</td>
                                        <td>
                                            <span class="fw-bold">Date:</span> {{ $interview->date }}
                                            <hr class="m-2 p-0" style="border-color:red;">
                                            <span class="fw-bold">Time:</span>  {{ $interview->time }}
                                        </td>
                                        <td>
                                            @if ($interview->meeting_type == 'On Site')
                                                <span class="fw-bold">Meeting: </span> {{ $interview->meeting_type }}
                                                <hr class="m-2 p-0" style="border-color:red;">
                                                <span class="fw-bold">Address: </span> {{ $interview->address }}
                                                <hr class="m-2 p-0" style="border-color:red;">
                                                <span class="fw-bold">Map Link:</span> <a href="{{ $interview->map_link }}" target="_blank">Click Here</a>
                                            @else
                                                <span class="fw-bold">Meeting: </span> {{ $interview->meeting_type }}
                                                <hr class="m-2 p-0" style="border-color:red;">
                                                <span class="fw-bold">Meeting Link: </span> <a href="{{ $interview->meet_link }}" target="_blank">Click Here</a>
                                            @endif
                                        </td>
                                        <td>{{ $interview->duration }} Min</td>
                                        <td>
                                            @if ($interview->is_attended === 1)
                                                <span class="badge badge-success">Attended</span>
                                            @elseif ($interview->is_attended === 0)
                                                <span class="badge badge-danger">Not Attended</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($interview->is_passed === 1)
                                                <span class="badge badge-success">Passed</span>
                                            @elseif ($interview->is_passed === 0)
                                                <span class="badge badge-danger">Not Passed</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
