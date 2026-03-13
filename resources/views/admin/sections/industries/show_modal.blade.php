<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $industry->id }}"
    aria-labelledby="offcanvasShowLabel" style="width:570px;">
    <div class="offcanvas-header" style="background: #474e5d;">
        <h5 id="offcanvasShowLabel" style="color:aliceblue">{{ $industry->name }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: #f5f8fa;">
        <div class="mb-3 text-capitalize">
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $industry->name }}</p>

        </div>
        <div class="mb-3">
            <p>{{ x_('Created Date:', 'admin') }} {{ $industry->created_at }}</p>
        </div>
        <div class="my-5 row justify-content-center text-center">
            <div class="col-3">
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
                        <p>{{ x_('Add Note', 'admin') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="notable_id" value="{{ $industry->id }}">
                            <input type="hidden" name="notable_type" value="App\Models\Industry">
                            <div class="form-group mb-2">
                                <label class="form-label" for="noteDetails">{{ x_('Note Details', 'admin') }}</label>
                                <textarea class="form-control" id="note-details" name="details" rows="3" placeholder="{{ x_('Enter your note here...', 'admin') }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Note', 'admin') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="btn-group dropdown">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="border: none; background: none; color: #474e5d;">
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
                        <p>{{ x_('Add Activity Log', 'admin') }}</p>
                    </button>
                    <div class="dropdown-menu p-3" style="width: 400px;">
                        <form action="{{ route('logs.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="loggable_id" value="{{ $industry->id }}">
                            <input type="hidden" name="loggable_type" value="App\Models\Industry">
                            <div class="form-group mb-2">
                                <label class="form-label" for="logTitle">{{ x_('Title', 'admin') }}</label>
                                <select class="form-control" id="title" name="title" required>
                                    <option value="" selected disabled>{{ x_('Select a type', 'admin') }}</option>
                                    <option value="Made By Phone Calls">{{ x_('Made By Phone Calls', 'admin') }} </option>
                                    <option value="Sent Email">{{ x_('Sent Email', 'admin') }}</option>
                                    <option value="Online meeting ">{{ x_('Online meeting', 'admin') }} </option>
                                    <option value="Personal meeting ">{{ x_('Personal meeting', 'admin') }} </option>
                                    <option value="Contacted by Whatsapp ">{{ x_('Contacted by Whatsapp', 'admin') }} </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDetails">{{ x_('Details', 'admin') }}</label>
                                <textarea class="form-control" id="logDetails" name="details" rows="3" placeholder="{{ x_('Enter details here...', 'admin') }}"
                                    required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="logDate">{{ x_('Log Date', 'admin') }}</label>
                                <input type="date" class="form-control" id="logDate" name="log_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{ x_('Save Log', 'admin') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab_block_123{{$industry->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i
                                    data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">{{ x_('Activity Log', 'admin') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab_block_223{{$industry->id}}">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i
                                    data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">{{ x_('Nots', 'admin') }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_block_123{{$industry->id}}">
                    <div class="card">
                        @foreach ($industry->logs as $log)
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
                                                        <p> <span class="text-dark">{{ x_('By', 'admin') }} {{ $log->user?->name ?? x_('Unknown User', 'admin') }}</span><br>{{ $log->title}} <br> {{ $log->details}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                   </div>
                </div>
                <div class="tab-pane fade" id="tab_block_223{{$industry->id}}">
                    @foreach ($industry->notes as $note)
                            <div class="card card-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ x_('Noted By', 'admin') }} {{ $note->user?->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ date('d-M-Y h:i A', strtotime($note->created_at)) }}</h6>
                                    <p class="card-text">{{ $note->details }}</p>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
