<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>{{ x_('Candidates', 'general') }} <span class="badge badge-sm badge-light ms-1">{{$candidates->count()}}</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="role-list-view">
                                <table id="datable_4c" class="table nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ x_('Name', 'general') }}</th>
                                            <th>CV</th>
                                            <th>{{ x_('Email', 'general') }}</th>
                                            <th>{{ x_('Phone', 'general') }}</th>
                                            <th>{{ x_('Major', 'general') }}</th>
                                            <th>{{ x_('Experience', 'general') }}</th>
                                            <th>{{ x_('Current Position', 'general') }}</th>
                                            <th>{{ x_('Current Company', 'general') }}</th>
                                            <th>{{ x_('Current Salary', 'general') }}</th>
                                            <th>{{ x_('Notice Period', 'general') }}</th>
                                            <th>{{ x_('Expected Salary', 'general') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidates as $candidate)
                                            <tr class="hover-row">
                                                <td style="background: white">
                                                    <button type="button" class="btn btn-link p-0 view-details-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$candidate->id}}" title="{{ x_('View Details', 'general') }}">
                                                            {{ $candidate->first_name }} {{ $candidate->last_name }}
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="{{ $candidate->getMedia('cv')->first()?->getUrl() }}" target="_blank" class="btn btn-link p-0" title="{{ x_('View CV', 'general') }}">
                                                        <span class="icon">
                                                            <span class="feather-icon"><i data-feather="file-text"></i></span>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>{{ $candidate->email }}</td>
                                                <td>{{ $candidate->phone }}</td>
                                                <td>{{ $candidate->major }}</td>
                                                <td>{{ $candidate->exp_years }}</td>
                                                <td>{{ $candidate->current_position }}</td>
                                                <td>{{ $candidate->current_company }}</td>
                                                <td>{{ $candidate->current_salary }}</td>
                                                <td>{{ $candidate->notice_period }}</td>
                                                <td>{{ $candidate->expected_salary }}</td>
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
