<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Contacts', 'contacts') }} <span class="badge badge-sm badge-light ms-1">{{$all_contacts}}</span></h6>
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
                                            <th>{{ x_('Contact Name', 'contacts') }}</th>
                                            <th>{{ x_('Phone', 'contacts') }}</th>
                                            <th>{{ x_('Email', 'contacts') }}</th>
                                            <th>{{ x_('Title', 'contacts') }}</th>
                                            <th>{{ x_('Company Name', 'contacts') }}</th>
                                            <th>{{ x_('Company Domain', 'contacts') }}</th>
                                            <th>{{ x_('Status', 'contacts') }}</th>
                                            <th>{{ x_('Source', 'contacts') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr class="hover-row">
                                                <td>
                                                    <input type="checkbox" name="checkeds[]" value="{{ $contact->id }}" class="cked form-check-input" id="chk_sel_3"> #{{ $contact->id }}
                                                </td>
                                                <td style="background: white">
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$contact->id}}" title="{{ x_('View Details', 'contacts') }}">
                                                            {{ $contact->name }}
                                                    </button>
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                        <span class="icon">
                                                            <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                        </span>
                                                    </a>
                                                    <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$contact->id}}">{{ x_('Edit', 'contacts') }}</a>
                                                        <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$contact->id}}">{{ x_('Delete', 'contacts') }}</a>
                                                    </div>
                                                </td>
                                                <td>{{ $contact->country_code.$contact->phone ?? x_('N/A', 'admin') }}</td>
                                                <td>{{ $contact->email ?? x_('N/A', 'admin') }}</td>
                                                <td>{{ $contact->title ?? x_('N/A', 'admin') }}</td>
                                                <td>{{ $contact->company_id ? $contact->company?->name : $contact->company_name }}</td>
                                                <td>{{ $contact->company?->website ?? x_('N/A', 'admin') }}</td>
                                                <td>{{ $contact->status ?? x_('N/A', 'admin') }}</td>
                                                <td>{{ $contact->source ?? x_('N/A', 'admin') }}</td>
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
