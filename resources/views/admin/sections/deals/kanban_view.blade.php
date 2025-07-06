<div class="tab-pane fade show active" id="tab_block_1">
    <div id="kb_scroll" class="tasklist-scroll position-relative">
        <div id="tasklist_wrap" class="tasklist-wrap">
            @foreach ( $pipeline->stages as $stage )
            <div class="card card-flush tasklist">
                <div class=" card-header card-header-action h-100 m-0 py-1" style="border-right:0.4px solid gray;">
                    <div class="tasklist-handle m-0 p-0 h-100"              style="flex-direction: column; height:80px!important;justify-content: flex-start;align-content: flex-start;align-items: flex-start;">
                        <h6 class="fw-bold d-flex align-items-center mb-0"  style="font-size: 1rem;"><span class="tasklist-name">{{$stage->name}}</span><span class="badge badge-sm badge-pill badge-light ms-2 float-right" id="count{{$stage->id}}">{{$stage->deals->count()}}</span></h6>
                        <p class="align-items-center mb-0 py-1"             style="font-size: 0.78rem;"><span class="tasklist-name">Weighted:</span><span class="badge badge-sm badge-pill badge-light ms-2">${{$stage->deals?->sum('amount')*($stage->percentage/100)}}</span></p>
                        <p class="align-items-center mb-0"                  style="font-size: 0.9rem;"><span class="tasklist-name">Total:</span><span class="badge badge-sm badge-pill badge-light ms-2">${{$stage->deals?->sum('amount')}}</span></p>
                    </div>
                </div>
                <div data-simplebar class="card-body">
                    <div id="i{{ $stage->id }}" class="tasklist-cards-wrap">
                        @foreach ($stage->deals as $deal)
                            <div class="card card-simple card-flush rounded-8 tasklist-card" id="{{ $deal->id }}"  draggable="true" >
                                <div class=" card-header card-header-action rounded-8" style="display: flex;justify-content: space-between; align-items: center;">
                                    <h6 class="fw-semibold" style="font-size: 1.2rem; text-transform:capitalize;">{{$deal->name}}</h6>
                                    <div class="">
                                        <a class="btn btn-xs btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item " href={{ route('deals.markaspaid', $deal->id) }} title="Mark as Paid "><span class="feather-icon dropdown-icon"><i data-feather="dollar-sign"></i></span><span>Mark as Paid</span></a>
                                            <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasShow{{$deal->id}}" title="View Details"><span class="feather-icon dropdown-icon"><i data-feather="eye"></i></span><span>show</span></a>
                                            <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdate{{$deal->id}}"><span class="feather-icon dropdown-icon"><i data-feather="edit-2"></i></span><span>Edit</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <p style="font-size: 1.1rem;"> <span style="color:black">Amount:</span> ${{$deal->amount}} </p>
                                </div>
                                <div class="card-footer text-muted justify-content-between">
                                    <div>
                                        <span class="task-deadline" style="font-size: 1.1rem;">
                                            <span style="color:black">Close Date:</span>
                                            {{$deal->closed_at ? date('d-M-Y ',strtotime($deal->closed_at)) : "N/A"}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="card card-simple card-flush rounded-8 tasklist-card" style="opacity: 0" >
                            <div class=" card-header card-header-action rounded-8" style="opacity: 0">
                                <h6 class="fw-semibold">No Deals</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
