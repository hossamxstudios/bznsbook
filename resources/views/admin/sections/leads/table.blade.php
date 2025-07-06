
<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Leads <span class="badge badge-sm badge-light ms-1">{{$leads->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_4c" class="table nowrap" style="min-width: 90vw;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Lead Name</th>
                                            <th>Pipeline Name</th>
                                            <th>Stage Name</th>
                                            <th>Company</th>
                                            <th>Contact</th>
                                            <th>Type</th>
                                            <th>Label</th>
                                            <th>Last Contacted Date</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leads as $lead)
                                        <tr class="hover-row">
                                            <td>{{ $lead->id }}</td>
                                            <td style="background: white">
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$lead->id}}" title="View Details">
                                                    <span class="feather-icon"  style="margin-left: 30px;">
                                                        {{ $lead->name }}
                                                    </span>
                                                </button>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px;">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$lead->id}}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$lead->id}}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $lead->pipeline?->name }}</td>
                                            <td>{{ $lead->stage?->name }}</td>
                                            <td>{{ $lead->company?->name }}</td>
                                            <td>{{ $lead->contact?->name }}</td>
                                            <td>{{ $lead->type }}</td>
                                            <td>{{ $lead->label }}</td>
                                            <td>{{  $lead->last_contacted_at? date('Y/m/d', strtotime($lead->last_contacted_at)): 'N/A' }}</td>
                                            <td>{{  date('Y/m/d', strtotime($lead->created_at)) }}</td>
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
