<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="row">
                <div class="col-md-12 mb-md-4 mb-3">
                    <div class="card rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Pipelines
                                <span class="badge badge-sm badge-light ms-1">{{$pipelines->count()}}</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_2" class="table nowrap w-100">
                                    <thead >
                                        <tr>
                                            <th>Pipeline Name</th>
                                            <th>&nbsp;</th>
                                            <th>Pipeline Type</th>
                                            <th>Pipeline Stages</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pipelines as $pipeline)
                                        <tr class="hover-row">
                                            <td style="background: white">
                                                <button type="button" class="btn btn-link p-0 view-details-btn" onclick="window.location.href='{{ route('deals.show', ['id' => $pipeline->id]) }}'" title="View Details">
                                                    {{ $pipeline->name }}
                                                </button>
                                            </td>
                                            <td>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown">
                                                    <span class="icon">
                                                        <span class="feather-icon"><i data-feather="more-horizontal"></i></span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit-tasklist" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{ $pipeline->id }}">Edit</a>
                                                    <a class="dropdown-item delete-tasklist" href="#"  data-bs-toggle="modal" data-bs-target="#deleteModalPipeline{{ $pipeline->id }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $pipeline->type }}</td>
                                            <td>
                                                @foreach ( $pipeline->stages as $stage )
                                                    {{ $stage->name }} ->
                                                @endforeach
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
