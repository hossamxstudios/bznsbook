<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $lead->id }}" aria-labelledby="offcanvasShowLabel{{ $lead->id }}" style="width:553px;">
    <div class="offcanvas-header justify-content-center text-capitalize" style="background: #474e5d; ">
        <h5 id="offcanvasShowLabel{{ $lead->id }}" style="color: aliceblue" class="text-center">{{ $lead->name }}
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="mb-3 text-capitalize">
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $lead->name }}</p>
        </div>
        <div class="mb-3">
            <p>{{ x_('Stage:', 'leads') }} <span style="color: red">{{ $lead->stage?->name }}</span></p>
        </div>
        <div class="my-5 row justify-content-center text-center">
            <div class="col-3">
                <div class="btn-group dropdown">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; background: none; color: #474e5d;">
                        <div class="badge-icon badge-circle badge-icon-sm text-gray">
                            <div class="badge-icon-wrap">
                                <i class="ri-sticky-note-line"></i>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                    <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>{{ x_('Add Activity Log', 'leads') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('logs.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="loggable_id" value="{{ $lead->id }}">
                            <input type="hidden" name="loggable_type" value="App\Models\Lead">
                            <div class="form-group mb-2">
                                <label class="form-label" for="logTitle">{{ x_('Title', 'leads') }}</label>
                                <select class="form-control" id="title" name="title" required>
                                    <option value="" selected disabled>{{ x_('Select a type', 'leads') }}</option>
                                    <option value="Phone Called">{{ x_('Phone Called', 'leads') }} </option>
                                    <option value="Sent Email">{{ x_('Sent Email', 'leads') }}</option>
                                    <option value="Online meeting ">{{ x_('Online meeting', 'leads') }} </option>
                                    <option value="Personal meeting ">{{ x_('Personal meeting', 'leads') }} </option>
                                    <option value="Contacted by Whatsapp ">{{ x_('Contacted by Whatsapp', 'leads') }} </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDetails">{{ x_('Details', 'leads') }}</label>
                                <textarea class="form-control" id="logDetails" name="details" rows="3" placeholder="{{ x_('Enter details here...', 'leads') }}" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDate">{{ x_('Log Date', 'leads') }}</label>
                                <input type="date" class="form-control" id="logDate" name="log_date">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Log', 'leads') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="btn-group dropdown">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false" style="border: none; background: none;  color: #474e5d;">
                        <div class="badge-icon badge-circle badge-icon-sm text-gray">
                            <div class="badge-icon-wrap">
                                <i class="ri-sticky-note-line"></i>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor"/>
                                    <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke"fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>{{ x_('Add Note', 'leads') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="notable_id" value="{{ $lead->id }}">
                            <input type="hidden" name="notable_type" value="App\Models\Lead">
                            <div class="form-group mb-2">
                                <label class="form-label" for="noteDetails">{{ x_('Note Details', 'leads') }}</label>
                                <textarea class="form-control" id="note-details" name="details" rows="3" placeholder="{{ x_('Enter your note here...', 'leads') }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Note', 'leads') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#assginContactModal{{$lead->id}}" style="border: none; background: none; color: #474e5d;">
                 <div class="badge-icon badge-circle badge-icon-sm text-gray">
                     <div class="badge-icon-wrap">
                         <i class="ri-user-line "></i>
                     </div>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                         <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                             <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                             <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor" />
                         </g>
                     </svg>
                 </div>
                 <p> {{ x_('Assign Contact', 'leads') }}</p>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#assginCompanyModal{{$lead->id}}" style="border: none; background: none; color: #474e5d;">
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
                    <p> {{ x_('Assign Company', 'leads') }}</p>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Activity{{$lead->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">{{ x_('Activity Log', 'leads') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#nots{{$lead->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Nots', 'leads') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#contacts{{$lead->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Contacts', 'leads') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#company{{$lead->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Company', 'leads') }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane fade show active" id="Activity{{$lead->id}}">
                   <div class="card">
                        @foreach ($lead->logs as $log)
                                <div class="card-header">
                                    <a role="button" data-bs-toggle="collapse" href="#activity_11" aria-expanded="true">{{ date('d-M-Y h:i A', strtotime($log->log_date)) }}</a>
                                </div>
                                <div id="activity_11" class="collapse show">
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
                                                        <p> <span class="text-dark">{{ x_('By', 'leads') }} {{ $log->user?->name ?? x_('Unknown User', 'leads') }}</span><br>{{ $log->title}} <br> {!! $log->details!!}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                   </div>
               </div>
               <div class="tab-pane fade" id="nots{{$lead->id}}">
                   @foreach ($lead->notes as $note)
                        <div class="card card-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ x_('Noted By', 'leads') }} {{ $note->user?->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ date('d-M-Y h:i A', strtotime($note->created_at)) }}</h6>
                                <p class="card-text">{{ $note->details }}</p>
                            </div>
                        </div>
                   @endforeach
               </div>
               <div class="tab-pane fade" id="contacts{{$lead->id}}">
                    <div class="card card-sm">
                        <div class="card-body">
                            <ul class="activity-list list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-head">
                                            <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                <span class="initial-wrap">
                                                    {{ strtoupper(substr($lead->contact?->name ?? 'U', 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body" style="padding-bottom: 0;">
                                            <p> <span class="text-dark">{{ x_('Name:', 'leads') }} {{$lead->contact?->name ?? x_('N/A', 'admin') }}</span></p>
                                            <p> <span class="text-dark">{{ x_('Email:', 'leads') }} {{$lead->contact?->email ?? x_('N/A', 'admin') }}</span></p>
                                            <p> <span class="text-dark">{{ x_('Phone:', 'leads') }} {{$lead->contact?->phone ?? x_('N/A', 'admin') }}</span></p>
                                            @if ($lead->contact?->company_id ? $lead->contact?->company?->name : $lead->contact?->company_name )
                                            <p> <span class="text-dark">{{ x_('Company:', 'leads') }} {{$lead->contact?->company_id ? $lead->contact?->company?->name : $lead->contact?->company_name }}</span></p>
                                            @else
                                            <p> <span class="text-dark">{{ x_('Company: N/A', 'leads') }}</span></p>
                                            @endif
                                            <p> <span class="text-dark">{{ x_('Company Email:', 'leads') }} {{$lead->contact?->company_id ? $lead->contact?->company?->email : x_('N/A', 'admin') }}</span></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
               <div class="tab-pane fade" id="company{{$lead->id}}">
                    <div class="card card-sm">
                        <div class="card-body">
                            <ul class="activity-list list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-head">
                                            <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                <span class="initial-wrap">
                                                    {{ strtoupper(substr($lead->company?->name ?? 'U', 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body" style="padding-bottom: 0;">
                                            <p> <span class="text-dark">{{ x_('Company:', 'leads') }} {{$lead->company?->name ?? x_('N/A', 'admin') }}</span></p>
                                            <p> <span class="text-dark">{{ x_('Email:', 'leads') }} {{$lead->company?->email ?? x_('N/A', 'admin') }}</span></p>
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

<div class="modal fade" id="assginCompanyModal{{$lead->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true"style="z-index: 1051;">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ x_('Assign Company To Lead', 'leads') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('leads.assignCompany', $lead->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <select name="company_id" class="form-control select2" style="width:100%">
                                    <option value="">{{ x_('Select', 'leads') }}</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" data-email="{{ $company->email }}">
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">{{ x_('Assign', 'leads') }}</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="assginContactModal{{$lead->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true" style="z-index: 1051;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ x_('Assign Contact To Lead', 'leads') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('leads.assignContact', $lead->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <select name="contact_id" class="form-control select2" style="width:100%">
                                <option value="">{{ x_('Select', 'leads') }}</option>
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}" data-email="{{ $contact->email }}">
                                        {{ $contact->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">{{ x_('Assign', 'leads') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
