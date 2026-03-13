<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $company->id }}"
    aria-labelledby="offcanvasShowLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">{{ $company->email }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="mb-3 text-capitalize">
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $company->name }}</p>

        </div>
        <div class="mb-3">
            <p>{{ x_('Industry', 'companies') }}: {{ $company->industry?->name }}</p>
        </div>
        <div class="mb-3">
            <p>{{ x_('Created Date', 'companies') }}: {{ $company->created_at }}</p>
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
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3"
                                    vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                    <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke"
                                        fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>{{ x_('Add Activity Log', 'companies') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('logs.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                            <input type="hidden" name="loggable_id" value="{{ $company->id }}">
                            <input type="hidden" name="loggable_type" value="App\Models\Company">
                            <div class="form-group mb-2">
                                <label class="form-label" for="logTitle">{{ x_('Title', 'companies') }}</label>
                                <select class="form-control" id="title" name="title" required>
                                    <option value="" selected disabled>{{ x_('Select a type', 'companies') }}</option>
                                    <option value="Phone Called">{{ x_('Phone Called', 'companies') }} </option>
                                    <option value="Sent Email">{{ x_('Sent Email', 'companies') }}</option>
                                    <option value="Online meeting ">{{ x_('Online meeting', 'companies') }} </option>
                                    <option value="Personal meeting ">{{ x_('Personal meeting', 'companies') }} </option>
                                    <option value="Contacted by Whatsapp ">{{ x_('Contacted by Whatsapp', 'companies') }} </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDetails">{{ x_('Details', 'companies') }}</label>
                                <textarea class="form-control" id="logDetails" name="details" rows="3" placeholder="{{ x_('Enter details here...', 'companies') }}" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDate">{{ x_('Log Date', 'companies') }}</label>
                                <input type="date" class="form-control" id="logDate" name="log_date" >
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Log', 'companies') }}</button>
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
                                <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3"
                                    vector-effect="non-scaling-stroke">
                                    <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor" />
                                    <circle cx="55.5" cy="55.5" r="59.5"
                                        vector-effect="non-scaling-stroke"fill="currentColor" />
                                </g>
                            </svg>
                        </div>
                        <p>{{ x_('Add Note', 'companies') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="notable_id" value="{{ $company->id }}">
                            <input type="hidden" name="notable_type" value="App\Models\Company">
                            <div class="form-group mb-2">
                                <label class="form-label" for="noteDetails">{{ x_('Note Details', 'companies') }}</label>
                                <textarea class="form-control" id="note-details" name="details" rows="3" placeholder="{{ x_('Enter your note here...', 'companies') }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Note', 'companies') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#activity{{$company->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">{{ x_('Activity Log', 'companies') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#nots{{$company->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Nots', 'companies') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#contacts{{$company->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Contacts', 'companies') }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="activity{{$company->id}}">
                    <div class="card">
                        @foreach ($company->logs as $log)
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
                                                        <p> <span class="text-dark">{{ x_('By', 'companies') }} {{ $log->user?->name ?? x_('Unknown User', 'admin') }}</span><br>{{ $log->title}} <br> {!! $log->details!!}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                   </div>
                </div>
                <div class="tab-pane fade" id="nots{{$company->id}}">
                    @foreach ($company->notes as $note)
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
                                                        <p> <span class="text-dark">{{ x_('By', 'companies') }} {{ $note->user?->name ?? x_('Unknown User', 'admin') }}</span><br>{{ $log->title}} <br> {{ $note->details}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="contacts{{$company->id}}">
                    @foreach ($company->contacts as $contact)
                            <div id="activity_11{{$contact->id}}" class="collapse show">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <ul class="activity-list list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-head">
                                                        <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                            <span class="initial-wrap">
                                                                {{ strtoupper(substr($contact->name ?? 'U', 0, 1)) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="media-body" style="padding-bottom: 0;">
                                                        <p> <span class="text-dark">{{ x_('Name', 'companies') }}: {{$contact?->name ?? x_('N/A', 'admin') }}</span></p>
                                                        <p> <span class="text-dark">{{ x_('Email', 'companies') }}: {{$contact?->email ?? x_('N/A', 'admin') }}</span></p>
                                                        <p> <span class="text-dark">{{ x_('Phone', 'companies') }}: {{$contact?->phone ?? x_('N/A', 'admin') }}</span></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
