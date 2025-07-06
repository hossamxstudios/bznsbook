<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Contacts <span class="badge badge-sm badge-light ms-1">{{$all_contacts}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_4c" class="table nowrap" style="min-width: 90vw;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="fs-6">
                                                    <input type="checkbox" class="form-check-input form-check-theme check-select-all cked" id="customCheck1">
                                                </span>
                                            </th>
                                            <th>Contact Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Company Name</th>
                                            <th>Company Domain</th>
                                            <th>Status</th>
                                            <th>Source</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr class="hover-row">
                                                <td>
                                                    <input type="checkbox" name="checkeds[]" value="{{ $contact->id }}" class="cked form-check-input" id="chk_sel_3"> #{{ $contact->id }}
                                                </td>
                                                <td style="background: white">
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$contact->id}}" title="View Details">
                                                            {{ $contact->name }}
                                                    </button>
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                        <span class="icon">
                                                            <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                        </span>
                                                    </a>
                                                    <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$contact->id}}">Edit</a>
                                                        <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$contact->id}}">Delete</a>
                                                    </div>
                                                </td>
                                                <td>{{ $contact->country_code.$contact->phone??"N/A" }}</td>
                                                <td>{{ $contact->email??"N/A" }}</td>
                                                <td>{{ $contact->title??"N/A" }}</td>
                                                <td>{{ $contact->company_id ? $contact->company?->name : $contact->company_name }}</td>
                                                <td>{{ $contact->company?->website??"N/A"}}</td>
                                                <td>{{ $contact->status??"N/A" }}</td>
                                                <td>{{ $contact->source??"N/A" }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $contacts->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
