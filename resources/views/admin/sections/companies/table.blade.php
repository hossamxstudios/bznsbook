<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 card rounded-8">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Recruitment Clients', 'companies') }}
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
                                            <th>{{ x_('Company Name', 'companies') }}</th>
                                            <th>{{ x_('Email', 'companies') }}</th>
                                            <th>{{ x_('Services', 'companies') }}</th>
                                            <th>{{ x_('Decision Maker', 'companies') }}</th>
                                            <th>{{ x_('Industry', 'companies') }}</th>
                                            <th>{{ x_('Headcount', 'companies') }}</th>
                                            <th>{{ x_('Domain', 'companies') }}</th>
                                            <th>{{ x_('Linkedin', 'companies') }}</th>
                                            <th>{{ x_('Source', 'companies') }}</th>
                                            <th>{{ x_('Create Date', 'companies') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                        <tr class="hover-row">
                                            <td>
                                                <input type="checkbox" name="checkeds[]" value="{{ $company->id }}" class="cked form-check-input" id="chk_sel_3"> #{{ $company->id }}
                                            </td>
                                            <td style="background: white">
                                                <button type="button" class="p-0 btn btn-link view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$company->id}}" title="{{ x_('View Details', 'companies') }}">
                                                    {{ $company->name }}
                                                </button>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown" style="margin-left: 30px;">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#servicesModal{{ $company->id }}">{{ x_('Manage Services', 'companies') }}</a>
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$company->id}}">{{ x_('Edit', 'companies') }}</a>
                                                    <a class="dropdown-item delete-tasklist" href="#" data-bs-toggle="modal" data-bs-target="#deleteModalgrid{{$company->id}}">{{ x_('Delete', 'companies') }}</a>
                                                </div>
                                            </td>
                                            <td>{{ $company->email ?? x_('N/A', 'admin') }}</td>
                                            <td>
                                                @foreach ($company->sections ?? [] as $section)
                                                    <span class="badge bg-secondary ms-1">{{ $section->name }}</span>
                                                @endforeach
                                                @if ($company->sections->isEmpty())
                                                    {{ x_('N/A', 'admin') }}
                                                @endif
                                            </td>
                                            <td>{{ $company->decision_maker ?? x_('N/A', 'admin') }}</td>
                                            <td>{{ $company->industry?->name }}</td>
                                            <td>{{ $company->capacity }}</td>
                                            <td><a href="{{ $company->website }}" target="_blank">{{ $company->website ?? x_('N/A', 'admin') }}</a></td>
                                            <td>
                                                @if($company->social_media)
                                                    <a href="{{ $company->social_media }}" target="_blank">{{ x_('Linkedin', 'companies') }}</a>
                                                @else
                                                    {{ x_('N/A', 'admin') }}
                                                @endif
                                            </td>
                                            <td>{{ $company->source ?? x_('N/A', 'admin') }}</td>
                                            <td>{{ $company->created_at ? $company->created_at->format('Y/m/d') : x_('N/A', 'admin') }}</td>
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
