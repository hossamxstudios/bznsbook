<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $contact->id }}"
    aria-labelledby="offcanvasShowLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">{{ $contact->email }}</h5>
        <button type="button" class="btn-close text-white"  data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="mb-3 text-capitalize">
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $contact->name }}</p>

        </div>
        <div class="mb-3">
            <p>Company: {{  $contact->company_id ? $contact->company?->name : $contact->company_name }}</p>
        </div>
        <div class="mb-3">
            <p>Phone Number: {{ $contact->phone }}</p>
        </div>
        <div class="my-5 row justify-content-center text-center">
            <div class="col-4">
                <div class="btn-group dropdown">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; background: none; color: #474e5d;">
                        <div class="badge-icon badge-circle badge-icon-sm text-gray">
                            <div class="badge-icon-wrap">
                                <i class="ri-sticky-note-line"></i>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3"
                                    vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                    <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke"
                                        fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>Add Activity Log</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('logs.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="loggable_id" value="{{ $contact->id }}">
                            <input type="hidden" name="loggable_type" value="App\Models\Contact">
                            <div class="form-group mb-2">
                                <label class="form-label" for="logTitle">Title</label>
                                <select class="form-control" id="title" name="title" required>
                                    <option value="" selected disabled>Select a type</option>
                                    <option value="Phone Called">Phone Called </option>
                                    <option value="Sent Email">Sent Email</option>
                                    <option value="Online meeting ">Online meeting </option>
                                    <option value="Personal meeting ">Personal meeting </option>
                                    <option value="Contacted by Whatsapp ">Contacted by Whatsapp </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDetails">Details</label>
                                <textarea class="form-control" id="logDetails" name="details" rows="3" placeholder="Enter details here..."
                                    required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDate">Log Date</label>
                                <input type="date" class="form-control" id="logDate" name="log_date">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save Log</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="btn-group dropdown">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true"aria-expanded="false"
                        style="border: none; background: none;  color: #474e5d;">
                        <div class="badge-icon badge-circle badge-icon-sm text-gray">
                            <div class="badge-icon-wrap">
                                <i class="ri-sticky-note-line"></i>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3"
                                    vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                    <circle cx="55.5" cy="55.5" r="59.5"
                                        vector-effect="non-scaling-stroke"fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>Add Note</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="notable_id" value="{{ $contact->id }}">
                            <input type="hidden" name="notable_type" value="App\Models\Contact">
                            <div class="form-group mb-2">
                                <label class="form-label" for="noteDetails">Note Details</label>
                                <textarea class="form-control" id="note-details" name="details" rows="3" placeholder="Enter your note here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save Note</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#assginCompanyModal{{ $contact->id }}" style="border: none; background: none; color: #474e5d;">
                    <div class="badge-icon badge-circle badge-icon-sm text-gray">
                        <div class="badge-icon-wrap">
                            <i class="ri-building-line"></i>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                            <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                                <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <p> Assign Company</p>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#activity{{$contact->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">Activity Log</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#nots{{$contact->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">Nots</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#company{{$contact->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">Company</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="activity{{$contact->id}}">
                    <div class="card">
                        @foreach ($contact->logs as $log)
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#activity_11{{$log->id}}" aria-expanded="true">{{ date('d-M-Y h:i A', strtotime($log->log_date)) }}</a>
                                </div>
                                <div id="activity_11{{$log->id}}" class="collapse show">
                                    <div class="card-body">
                                        <ul class="activity-list list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-head">
                                                        <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                            <span class="initial-wrap">
                                                                {{ strtoupper(substr($log->user?->name ?? 'U', 0, 1)) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="media-body" style="padding-bottom: 0;">
                                                        <p> <span class="text-dark">By {{ $log->user?->name ?? 'Unknown User' }}</span><br>{{ $log->title}} <br> {{ $log->details}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                   </div>
                </div>
                <div class="tab-pane fade" id="nots{{$contact->id}}">
                    @foreach ($contact->notes as $note)
                        <div class="card card-sm">
                            <div class="card-header">
                                <a role="button" data-bs-toggle="collapse" href="#activity_11{{$note->id}}" aria-expanded="true">{{ date('d-M-Y h:i A', strtotime($log->log_date)) }}</a>
                            </div>
                            <div id="activity_11{{$note->id}}" class="collapse show">
                                <div class="card-body">
                                    <ul class="activity-list list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                        <span class="initial-wrap">
                                                            {{ strtoupper(substr($note->user?->name ?? 'U', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body" style="padding-bottom: 0;">
                                                    <p> <span class="text-dark">By {{ $note->user?->name ?? 'Unknown User' }}</span><br> {{ $note->details}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="company{{$contact->id}}">
                    <div class="card card-sm">
                        <div class="card-body">
                            <ul class="activity-list list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-head">
                                            <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                <span class="initial-wrap">
                                                    {{ strtoupper(substr( $contact->company_id ? $contact->company?->name : $contact->company_name  ?? 'U', 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body" style="padding-bottom: 0;">
                                            <p> <span class="text-dark">Name: {{  $contact->company_id ? $contact->company?->name : $contact->company_name }}</span></p>
                                            <p> <span class="text-dark">Domain: {{$contact->company?->website?? 'N/A' }}</span></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assginCompanyModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" style="z-index: 1051;">
    @if ($contact->company_id)
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-wth-line">
                                <div class="card-line bg-primary"></div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                            <span class="initial-wrap">
                                                {{ strtoupper(substr($contact->company?->name ?? 'U', 0, 1)) }}
                                            </span>
                                        </div>
                                        {{$contact->company?->name}}
                                    </h5>
                                    <p class="card-text">{{$contact->company?->email}}</p>
                                    <p class="card-text">Industry: {{$contact->company?->industry?->name}}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$contact->company?->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Company To Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contacts.assignCompany', $contact->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <select name="company_id" class="form-control select2" style="width:100%">
                                    <option value="">Select</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
