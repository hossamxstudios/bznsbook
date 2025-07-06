<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Companies
                                <span class="badge badge-sm badge-light ms-1">{{$companies->count()}}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_4c" class="table nowrap">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="fs-6">
                                                    <input type="checkbox" class="form-check-input form-check-theme check-select-all cked" id="customCheck1">
                                                </span>
                                            </th>
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Decision Maker</th>
                                            <th>Industry</th>
                                            <th>Headcount</th>
                                            <th>Domain</th>
                                            <th>Linkedin</th>
                                            <th>Source</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                        <tr class="hover-row">
                                            <td>
                                                <input type="checkbox" name="checkeds[]" value="{{ $company->id }}" class="cked form-check-input" id="chk_sel_3"> #{{ $company->id }}
                                            </td>
                                            <td style="background: white">
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$company->id}}" title="View Details">
                                                    {{ $company->name }}
                                                </button>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px;">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$company->id}}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$company->id}}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $company->email?? 'N/A' }}</td>
                                            <td>{{ $company->decision_maker ?? 'N/A' }}</td>
                                            <td>{{ $company->industry?->name }}</td>
                                            <td>{{ $company->capacity }}</td>
                                            <td><a href="{{ $company->website }}" target="_blank">{{ $company->website ?? 'N/A' }}</a></td>
                                            <td>
                                                @if($company->social_media)
                                                    <a href="{{ $company->social_media }}" target="_blank">Linkedin</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $company->source ?? 'N/A' }}</td>
                                            <td>{{ $company->created_at ? $company->created_at->format('Y/m/d') : 'N/A' }}</td>
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
