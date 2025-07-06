<div class="tab-pane fade show active" id="all">
    <div class="container-fluid px-5 pt-5">
        <div class="row">
            <div class="col-md-12 mb-md-4 mb-3">
                <div class="card rounded-8 mb-0">
                    <div class="card-header card-header-action">
                        <h6>All Jobs  <span class="badge badge-sm badge-light ms-1">{{$jobs->count()}}</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="contact-list-view table-responsive">
                            <table id="datable_4c" class="table nowrap" style="min-width: 90vw;">
                                <thead>
                                    <tr>
                                        <th>Job Name</th>
                                        <th> view </th>
                                        <th>Job Type</th>
                                        <th>Status</th>
                                        <th>Headcount</th>
                                        <th>Experience Level</th>
                                        <th>Currency</th>
                                        <th>Min Salary</th>
                                        <th>Max Salary</th>
                                        <th>Frequency</th>
                                        <th>Contract Type</th>
                                        <th>Location</th>
                                        <th>Close Date</th>
                                        <th>Is Accepted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <a href="{{ route('company.jobs.single', $job->id) }}">{{ $job->title }}</a>
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$job->id}}" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                            </button>
                                            </td>

                                            <td>{{ $job->job_type }}</td>
                                            <td>{{ $job->status }}</td>
                                            <td>{{ $job->headcount }}</td>
                                            <td>{{ $job->level }}</td>
                                            <td>{{ $job->currency }}</td>
                                            <td>{{ $job->min_salary }}</td>
                                            <td>{{ $job->max_salary }}</td>
                                            <td>{{ $job->frequency }}</td>
                                            <td>{{ $job->contract_type }}</td>
                                            <td>{{ $job->country }}, {{ $job->city }}</td>
                                            <td>{{ $job->close_date }}</td>
                                            <td>
                                                @if ($job->is_accepted === 1)
                                                    <span class="badge badge-success">Accepted</span>
                                                @elseif ($job->is_accepted === 0)
                                                    <span class="badge badge-danger">Rejected</span>
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

<div class="tab-pane fade" id="accepted">
    <div class="container-fluid px-5 pt-5">
        <div class="row">
            <div class="col-md-12 mb-md-4 mb-3">
                <div class="card rounded-8 mb-0">
                    <div class="card-header card-header-action">
                        <h6>  Accepted Jobs  <span class="badge badge-sm badge-light ms-1">{{$jobs->where('is_accepted',1)->count()}}</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="contact-list-view table-responsive">
                            <table id="datable_4c4" class="table nowrap" style="min-width: 90vw;">
                                <thead>
                                    <tr>
                                        <th>Job Name</th>
                                        <th>Job Type</th>
                                        <th>Status</th>
                                        <th>Headcount</th>
                                        <th>Experience Level</th>
                                        <th>Currency</th>
                                        <th>Min Salary</th>
                                        <th>Max Salary</th>
                                        <th>Frequency</th>
                                        <th>Contract Type</th>
                                        <th>Location</th>
                                        <th>Close Date</th>
                                        <th>Is Accepted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs->where('is_accepted',1) as $job)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <a href="{{route('company.jobs.single', $job->id)}}">{{ $job->title }}</a>
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$job->id}}" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                            <td>{{ $job->job_type }}</td>
                                            <td>{{ $job->status }}</td>
                                            <td>{{ $job->headcount }}</td>
                                            <td>{{ $job->level }}</td>
                                            <td>{{ $job->currency }}</td>
                                            <td>{{ $job->min_salary }}</td>
                                            <td>{{ $job->max_salary }}</td>
                                            <td>{{ $job->frequency }}</td>
                                            <td>{{ $job->contract_type }}</td>
                                            <td>{{ $job->country }}, {{ $job->city }}</td>
                                            <td>{{ $job->close_date }}</td>
                                            <td>
                                                @if ($job->is_accepted === 1)
                                                    <span class="badge badge-success">Accepted</span>
                                                @elseif ($job->is_accepted === 0)
                                                    <span class="badge badge-danger">Rejected</span>
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

<div class="tab-pane fade" id="requests">
    <div class="container-fluid px-5 pt-5">
        <div class="row">
            <div class="col-md-12 mb-md-4 mb-3">
                <div class="card rounded-8 mb-0">
                    <div class="card-header card-header-action">
                        <h6> Pending Requests <span class="badge badge-sm badge-light ms-1">{{$jobs->where('is_accepted',null)->count()}}</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="contact-list-view table-responsive">
                            <table id="datable_4c2" class="table nowrap w-100" style="min-width: 90vw;">
                                <thead>
                                    <tr>
                                        <th>Job Name</th>
                                        <th>Job Type</th>
                                        <th>Status</th>
                                        <th>Is Accepted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs->where('is_accepted',null) as $job)
                                        @php $request_name = $job->company?->name . ' - ' . $job->title; @endphp
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <a href="{{ route('company.jobs.single', $job->id) }}">{{ $job->title }}</a>
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$job->id}}" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                            <td>{{ $job->job_type }}</td>
                                            <td>{{ $job->status }}</td>
                                            <td>
                                                @if ($job->is_accepted === 1)
                                                    <span class="badge badge-success">Accepted</span>
                                                @elseif ($job->is_accepted === 0)
                                                    <span class="badge badge-danger">Rejected</span>
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


<div class="tab-pane fade " id="rejected">
    <div id="kb_scroll" class="tasklist-scroll position-relative">
        <div id="tasklist_wrap" class="tasklist-wrap w-100">
            <div class="container-fluid px-5 pt-5">
                <div class="row">
                    <div class="col-md-12 mb-md-4 mb-3" >
                        <div class="card rounded-8 mb-0" >
                            <div class="card-header card-header-action">
                                <h6>Rejected Jobs <span class="badge badge-sm badge-light ms-1">{{$jobs->where('is_accepted','===',0)->count()}}</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="contact-list-view" style="">
                                    <table id="datable_4c3" class="table nowrap" style="min-width: 90vw;">
                                        <thead>
                                            <tr>
                                                <th>Job Name</th>

                                                <th>Job Type</th>
                                                <th>Status</th>
                                                <th>Headcount</th>
                                                <th>Experience Level</th>
                                                <th>Currency</th>
                                                <th>Min Salary</th>
                                                <th>Max Salary</th>
                                                <th>Frequency</th>
                                                <th>Contract Type</th>
                                                <th>Location</th>
                                                <th>Close Date</th>
                                                <th>Is Accepted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobs->where('is_accepted','===',0) as $job)
                                            <tr class="hover-row">
                                                <td style="background: white">
                                                    <a href="{{route('company.jobs.single', $job->id)}}">{{ $job->title }}</a>
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$job->id}}" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>

                                                <td>{{ $job->job_type }}</td>
                                                <td>{{ $job->status }}</td>
                                                <td>{{ $job->headcount }}</td>
                                                <td>{{ $job->level }}</td>
                                                <td>{{ $job->currency }}</td>
                                                <td>{{ $job->min_salary }}</td>
                                                <td>{{ $job->max_salary }}</td>
                                                <td>{{ $job->frequency }}</td>
                                                <td>{{ $job->contract_type }}</td>
                                                <td>{{ $job->country }}, {{ $job->city }}</td>
                                                <td>{{ $job->close_date }}</td>
                                                <td>
                                                    @if ($job->is_accepted === 1)
                                                        <span class="badge badge-success">Accepted</span>
                                                    @elseif ($job->is_accepted === 0)
                                                        <span class="badge badge-danger">Rejected</span>
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
    </div>
</div>
