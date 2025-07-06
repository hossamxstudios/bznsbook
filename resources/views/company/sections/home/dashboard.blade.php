<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h5 class="mb-0">Dashboard</h5>
            </div>
            <div class="row">
                <div class="col-lg-9 mb-4">
                    <div class="row">
                        <div class="col-xxl-12 mb-4">
                            <div class="card card-flush rounded-8 mb-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 wdg-1">
                                            <div class="row gx-0">
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3 pb-4 border-end border-xl-0 border-bottom border-light">
                                                        <h6>Total Candidates</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_candidates}}</span>
                                                        </div>
                                                        <span>Candidates</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3 pb-4 border-end border-xl-0 border-bottom border-light">
                                                        <h6>Total Jobs</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$all_jobs}}</span>
                                                        </div>
                                                        <span>Jobs</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3 pb-4 border-bottom border-light">
                                                        <h6>Total Applications</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$all_applications}}</span>
                                                        </div>
                                                        <span>Applications</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3 pb-4 border-bottom border-light">
                                                        <h6>Total Candidates</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_candidates}}</span>
                                                        </div>
                                                        <span>Candidates</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center justify-content-between pt-3">
                                                <h6>Overview</h6>
                                            </div>
                                            <div id="pie_chart_1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>{{$startDate}}</h3>
                                    <span class="d-inline-flex">Start Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>{{$endDate}}</h3>
                                    <span class="d-inline-flex">End Date</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>{{$all_candidates}}</h3>
                                    <span class="d-inline-flex">All Candidates</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="card card-flush card-simple rounded-8 mb-0 h-100">
                        <div class="card-header card-header-action">
                            <h6>Statistics</h6>
                        </div>
                        <div class="card-body">
                            <div id="radial_chart_4"></div>
                            <div class="fs-2 text-center mt-2">Total</div>
                            <div class="px-xxl-3 px-2">
                                <div class="d-flex justify-content-center text-center position-relative mt-5 mb-4">
                                    <div>
                                        <div>Start Date</div>
                                        <div class="fs-4 text-primary fw-medium">{{$startDate}}</div>
                                    </div>
                                    <div class="v-separator"></div>
                                    <div>
                                        <div>End Date</div>
                                        <div class="fs-4 text-dark fw-medium">{{$endDate}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-md-4 mb-3">
                    <div class="card card-flush card-simple rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Latest Candidates</h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_1" class="table wrap mb-5">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Applications</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_candidates1 as $candidate)
                                            <tr>
                                                <td>
                                                    <div class="text-high-em">{{$candidate->first_name}} {{ $candidate->last_name }}</div>
                                                </td>
                                                <td class="text-truncate">{{$candidate->applications?->count()}}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-md-4 mb-3">
                    <div class="card card-flush card-simple rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Latest Jobs</h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_11" class="table wrap w-100 mb-5">
                                    <thead>
                                        <tr>
                                            <th class="w-50">Title</th>
                                            <th class="w-50">Comapny</th>
                                            <th class="w-50">Applications</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_jobs1 as $job)
                                        <tr>
                                            <td>
                                                <div class="text-high-em">{{$job->title}}</div>
                                            </td>
                                            <td class="text-truncate">{{$job->company?->name}}</td>
                                            <td class="text-truncate">{{$job->applications->count()}}</td>
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
