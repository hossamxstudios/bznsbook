
    <span id="pipe" style="width:0px;">{{ $job->pipeline_id }}</span>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="row d-flex align-items-center justify-content-start ">
            <div class="col-12">
                <div class="card d-flex align-items-center p-3 shadow-lg" >
                    <div class="d-flex align-items-center w-100">
                        <div class="avatar avatar-xl avatar-soft-danger  avatar-rounded -2">
                            <span class="initial-wrap">
                                {{ strtoupper(substr($job->title, 0, 4)) }}
                            </span>
                        </div>
                        <div class="flex-grow-1 px-3">
                            <h5 style="font-weight: bold; font-size: 1.4em; display:inline-block"> {{ $job->company?->email }} </h5>
                            <p class="text-muted"><i class="bi bi-geo-alt-fill"></i>  {{$job->member?->name }} - {{ $job->member?->email }}  </p>
                            <p class=" mt-1">
                                <i class="bi bi-funnel-fill" style="font-size: 1em; cursor: pointer;" title="{{ x_('Filter', 'general') }}"></i>
                                <span class="fw-bold">{{ x_('Pipeline :', 'general') }}</span>
                                {{ $job->pipeline?->name }}
                            </p>
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
                    <div class="d-flex align-items-center mt-3 flex-wrap">
                        @foreach ($job->tags as $tag)
                            <span class="badge bg-secondary me-2" style="font-size:12px;">{{ $tag->name }}</span>
                        @endforeach
                        <a href="#" class="badge bg-danger text-white text-decoration-none" style="font-size:12px;" data-bs-toggle="modal" data-bs-target="#addTag{{$job->id}}">{{ x_('+ Tags', 'general') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Pipeline{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-list-check" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Pipeline', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link " data-bs-toggle="tab" href="#Summary{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-list-check" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Summary', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Candidates{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-briefcase" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Candidates', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Batches{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-briefcase" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Batches', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Note{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Notes', 'general') }}</span>
                    </a>
                </li>
                <li class="nav-item" style="font-size: 14px;">
                    <a class="nav-link" data-bs-toggle="tab" href="#Attachments{{$job->id}}">
                        <span class="nav-icon-wrap">
                            <i class="bi bi-stickies" style="font-size: 12px;"></i>
                        </span>
                        <span class="nav-link-text">{{ x_('Attachments', 'general') }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Pipeline{{$job->id}}">
                    <div id="kb_scroll" class="tasklist-scroll position-relative">
                        <div id="tasklist_wrap" class="tasklist-wrap">
                            @foreach ($job->pipeline->stages as $stage)
                            <div class="card card-flush tasklist">
                                <div class="card-header card-header-action m-0 py-1" style="border-right: 0.4px solid gray;">
                                    <div class="tasklist-handle m-0 p-0" style="flex-direction: column; height: 25px!important; justify-content: flex-start; align-content: flex-start; align-items: flex-start;">
                                        <h6 class="fw-bold d-flex align-items-center mb-0" style="font-size: 1rem;">
                                            <span class="tasklist-name">{{$stage->name}}</span>
                                            <span class="badge badge-sm badge-pill badge-light ms-2 float-right" id="count{{$stage->id}}">
                                                {{$stage->applications?->where('career_id', $job->id)->count()}}
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <div data-simplebar class="card-body">
                                    <div id="i{{ $stage->id }}" class="tasklist-cards-wrap">
                                        @foreach ($stage->applications?->where('career_id', $job->id) as $application)
                                        <div class="card card-simple card-flush rounded-8 tasklist-card" id="{{ $application->id }}" draggable="true" style="border: 1px solid #ddd; margin-bottom: 10px;">
                                            <div class="card-body d-flex flex-column justify-content-between pt-2 px-2 pb-1">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class=" me-3">
                                                        <div class="avatar avatar-sm avatar-soft-danger avatar-rounded">
                                                            <span class="initial-wrap">
                                                                {{ strtoupper(substr($application->candidate->first_name, 0, 1)) }} {{ strtoupper(substr($application->candidate->last_name, 0, 1)) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-bold" style="font-size: 1rem; text-transform: capitalize;">{{$application->candidate->first_name}} {{$application->candidate->last_name}}</h6>
                                                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">{{$application->candidate?->current_position}} @ {{$application->candidate?->current_company}}</p>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @if ($application->batch_candidate)
                                                                <li>
                                                                    <span class="dropdown-item text-muted">
                                                                        <i class="fas fa-check me-2"></i>
                                                                        Already in Batch
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="dropdown-item text-muted"  data-bs-toggle="modal" data-bs-target="#removeBatch{{$application->batch_candidate?->id}}">
                                                                        <i class="fa fa-window-close me-2"></i>
                                                                        Remove From Batch
                                                                    </span>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pushToBatch{{$application->id}}">
                                                                        <i class="fas fa-plus me-2"></i>
                                                                        Push to Batch
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteApplication{{$application->id}}"><i class="fas fa-trash me-2"></i>{{ x_('Delete Application', 'general') }}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center px-2 py-0">
                                                    <div class="text-muted d-flex align-items-center">
                                                        <i class="bi bi-clock me-1"></i>
                                                        <span style="font-size: 0.9rem;">{{ $application->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                        <div class="card card-simple card-flush rounded-8 tasklist-card" style="opacity: 0; height:0px;">
                                            <div class="card-header card-header-action rounded-8" style="opacity: 0; height:0px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Summary{{$job->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#Details{{$job->id}}" aria-expanded="true">{{ x_('Request Details', 'general') }}</a>
                                </div>
                                <div id="Details{{$job->id}}" class="collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mb-2"><strong>{{ x_('Job Type  :', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->job_type }} </div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Head Count:', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->headcount }}</div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Experience Level:', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->level }}</div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Min Salary:', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->min_salary }} {{ $job->currency }} </div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Max  Salary:', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->max_salary }} {{ $job->currency }} </div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Salary Frequency :', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->frequency }}</div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Contract Type :', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->contract_type }}</div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Expected Closed At :', 'general') }}</strong></div>
                                            <div class="col-6 mb-2"> {{ date('Y-m-d', strtotime($job->expected_closed_at)) }}</div>
                                            <div class="col-6 mb-2"><strong>{{ x_('Job Location:', 'general') }}</strong></div>
                                            <div class="col-6 mb-2">{{ $job->city }}, {{ $job->country }}</div>
                                            <div class="col-12 mb-2">
                                                <div class="card shadow-sm">
                                                    <div class="card-header">
                                                        <strong>{{ x_('Job Description:', 'general') }}</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! $job->details !!}
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
                <div class="tab-pane fade" id="Candidates{{$job->id}}">
                    <div class="table-responsive" style="height: 66vh;">
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
                                @foreach ($job->applications as $application)
                                    <tr class="hover-row">
                                        <td style="background: white">
                                            <a href="#" class="btn btn-link p-0 text-danger"  title="{{ x_('View Details', 'general') }}">{{ $application->candidate?->first_name }} {{ $application->candidate?->last_name }}  </a>
                                        </td>
                                        <td>{{ $application->candidate?->email }}</td>
                                        <td>{{ $application?->score }}%</td>
                                        <td>{{ $application?->stage?->name }}</td>
                                        <td>
                                            @if ($application->candidate?->is_working === null)
                                                <span class="badge badge-sm badge-warning">{{ x_('Unknow', 'general') }}</span>
                                            @elseif ($application->candidate?->is_working === 1)
                                                <span class="badge badge-sm badge-success">{{ x_('Yes', 'general') }}</span>
                                            @else
                                                <span class="badge badge-sm badge-danger">{{ x_('No', 'general') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="Batches{{$job->id}}">
                    <div class="card shadow-lg mb-3 w-20">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBatch{{$job->id}}">
                            <i class="fas fa-plus"></i> Add Batch
                        </button>
                    </div>
                    @if($job->batches->isEmpty())
                        <div class="card shadow-lg">
                            <div class="card-body text-center">
                                <p class="text-muted">{{ x_('No batches yet.', 'general') }}</p>
                            </div>
                        </div>
                    @else
                    @foreach ($job->batches as $batch)
                        <div class="card ">
                            <div class="card-header">
                                <a role="button" data-bs-toggle="collapse" href="#batches{{$batch->id}}" aria-expanded="false" class="w-100 table-responsive" collapsed>
                                    <table class="table nowrap table-advance table-responsive ">
                                        <thead>
                                            <tr>
                                                <th>{{ x_('Batch Name', 'general') }}</th>
                                                <th>{{ x_('Batch Details', 'general') }}</th>
                                                <th>{{ x_('Batch Size', 'general') }}</th>
                                                <th>{{ x_('No of Candidates attached', 'general') }} </th>
                                                <th>{{ x_('Is Currently Active', 'general') }}</th>
                                                <th>{{ x_('Has Client Accepted', 'general') }}</th>
                                                <th>{{ x_('Is All Candidate Rejected', 'general') }}</th>
                                                <th>{{ x_('Created At', 'general') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover-row">
                                                <td>{{ $batch->name }}</td>
                                                <td>{{ $batch->details }}</td>
                                                <td>{{ $batch->size }}</td>
                                                <td>{{ $batch->batch_candidates?->count() }}</td>
                                                <td>
                                                    @if ($batch->is_active === 1)
                                                        <span class="badge badge-sm badge-success">{{ x_('Active', 'general') }} </span>
                                                    @else
                                                        <span class="badge badge-sm badge-danger">{{ x_('Not Active', 'general') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($batch->is_accepted === 1)
                                                        <span class="badge badge-sm badge-success">{{ x_('Accepted', 'general') }} </span>
                                                    @elseif ($batch->is_accepted === 0)
                                                        <span class="badge badge-sm badge-danger">{{ x_('Not Accepted', 'general') }}</span>
                                                    @else
                                                        <span class="badge badge-sm badge-warning">{{ x_('Pending', 'general') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($batch->is_rejected === 1)
                                                        <span class="badge badge-sm badge-danger">{{ x_('Rejected', 'general') }} </span>
                                                    @else
                                                        <span class="badge badge-sm badge-warning">NO</span>
                                                    @endif
                                                </td>
                                                <td>{{ $batch->created_at->format('Y-m-d') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </a>
                            </div>
                            <div id="batches{{$batch->id}}" class="collapse ">
                                <div class="card-body px-10">
                                    <div class="table-responsive">
                                        <table class="table nowrap table-advance table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>{{ x_('Candidate Name', 'general') }}</th>
                                                    <th>{{ x_('Candidate Email', 'general') }}</th>
                                                    <th>{{ x_('Candidate Match Score', 'general') }}</th>
                                                    <th>{{ x_('Candidate Match Stage', 'general') }}</th>
                                                    <th>{{ x_('Hiring Date', 'general') }}</th>
                                                    <th>{{ x_('Starting Date', 'general') }}</th>
                                                    <th>{{ x_('Propation Period', 'general') }}</th>
                                                    <th>{{ x_('Propation End', 'general') }}</th>
                                                    <th>{{ x_('Hiring Salary', 'general') }}</th>
                                                    <th>{{ x_('Is Accepted', 'general') }}</th>
                                                    <th>{{ x_('Is Passed Propation', 'general') }}</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($batch->batch_candidates as $batch_candidate)
                                                    <tr class="hover-row">
                                                        <td>{{ $batch_candidate->candidate?->first_name }} {{ $batch_candidate->candidate?->last_name }}</td>
                                                        <td>{{ $batch_candidate->candidate?->email }}</td>
                                                        <td>{{ $batch_candidate->application?->score }}%</td>
                                                        <td><span class="badge bg-secondary fs-md">{{ $batch_candidate->application?->stage?->name }}</span></td>
                                                        <td>{{ $batch_candidate->hiring_date }}</td>
                                                        <td>{{ $batch_candidate->starting_date }}</td>
                                                        <td>{{ $batch_candidate->prop_period }}</td>
                                                        <td>{{ $batch_candidate->prop_end }}</td>
                                                        <td>{{ $batch_candidate->hiring_salary }}</td>
                                                        <td>
                                                            @if ($batch_candidate->is_accepted === 1)
                                                                <span class="badge badge-sm badge-success">{{ x_('Accepted', 'general') }} </span>
                                                            @elseif ($batch_candidate->is_accepted === 0)
                                                                <span class="badge badge-sm badge-danger">{{ x_('Not Accepted', 'general') }}</span>
                                                            @else
                                                                <span class="badge badge-sm badge-warning">{{ x_('Pending', 'general') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($batch_candidate->is_passed_prop === 1)
                                                                <span class="badge badge-sm badge-success">{{ x_('Passed', 'general') }} </span>
                                                            @elseif ($batch_candidate->is_passed_prop === 0)
                                                                <span class="badge badge-sm badge-danger">{{ x_('Not Passed', 'general') }}</span>
                                                            @else
                                                                <span class="badge badge-sm badge-warning">{{ x_('Pending', 'general') }}</span>
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
                    @endforeach

                    @endif
                </div>
                <div class="tab-pane fade" id="Note{{$job->id}}">
                    <div class="card shadow-lg mb-3 w-20">
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addNote{{$job->id}}">
                            <i class="fas fa-plus"></i> Add Note
                        </button>
                    </div>
                    @foreach ($job->notes as $note)
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
                <div class="tab-pane fade" id="Attachments{{$job->id}}">
                    <div class="card shadow-sm mb-3 w-20">
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addAttachment{{$job->id}}">
                            <i class="fas fa-plus"></i> Add Attachment
                        </button>
                    </div>
                    <div class="row">
                        @foreach ($job->getMedia('*') as $attachment)
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
