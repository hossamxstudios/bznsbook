
<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Deals', 'deals') }} <span class="badge badge-sm badge-light ms-1">{{$deals->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_4c" class="table nowrap w-100">
                                    <thead >
                                        <tr>
                                            <th>{{ x_('Deal Name', 'deals') }}</th>
                                            <th>{{ x_('Pipeline name', 'deals') }}</th>
                                            <th>{{ x_('Stage name', 'deals') }}</th>
                                            <th>{{ x_('Company', 'deals') }}</th>
                                            <th>{{ x_('Contact', 'deals') }}</th>
                                            <th>{{ x_('Amount', 'deals') }}</th>
                                            <th>{{ x_('Closed Date', 'deals') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deals as $deal)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$deal->id}}" title="{{ x_('View Details', 'deals') }}">
                                                    <span class="feather-icon">
                                                        {{ $deal->name }}
                                                    </span>
                                                </button>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item " href={{ route('deals.markaspaid', $deal->id) }} title="{{ x_('Mark as Paid', 'deals') }}">{{ x_('Mark as Paid', 'deals') }}</a>
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$deal->id}}">{{ x_('Edit', 'deals') }}</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$deal->id}}">{{ x_('Delete', 'deals') }}</a>
                                                </div>
                                            </td>
                                            <td>{{ $deal->pipeline?->name ?? x_('N/A', 'admin') }}</td>
                                            <td>{{ $deal->stage?->name ?? x_('N/A', 'admin') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$deal->id}}" title="{{ x_('View Companies', 'deals') }}" onclick="showCompaniesTab({{ $deal->id }})">
                                                    <span class="feather-icon">{{ x_('See Companies', 'deals') }}</span>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$deal->id}}" title="{{ x_('View Contacts', 'deals') }}" onclick="showContactsTab({{ $deal->id }})">
                                                    <span class="feather-icon">{{ x_('See Contacts', 'deals') }}</span>
                                                </button>
                                            </td>
                                            <td>{{ $deal->amount ?? x_('N/A', 'admin') }}</td>
                                            <td>{{ $deal->closed_at ?? x_('N/A', 'admin') }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

