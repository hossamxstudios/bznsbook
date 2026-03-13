<div id="task_detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl task-detail-modal" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <header class="task-header">
                        <div class="d-flex align-items-center">
                            <div id="sparkline_chart_7"></div>
                            <div class="form-check mx-lg-3 ms-3">
                                <input type="checkbox" class="form-check-input" id="customCheckcTask" checked>
                                <label class="form-check-label d-lg-inline d-none" for="customCheckcTask">{{ x_('Mark as completed', 'pipelines') }}</label>
                            </div>
                            <button class="btn btn-flush-light flush-outline-hover d-lg-inline-block d-none"><span><span class="icon"><span class="feather-icon"><i data-feather="link"></i></span></span><span>{{ x_('Copy Link', 'pipelines') }}</span></span></button>
                            <button class="btn btn-icon btn-light btn-rounded d-lg-none d-lg-inline-block ms-1"><span><span class="icon"><span class="feather-icon"><i data-feather="link"></i></span></span></span></button>
                        </div>
                        <div class="task-options-wrap">
                            <span class="task-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span>
                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover ms-1 d-lg-inline-block d-none" href="#" ><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">{{ x_('Action', 'pipelines') }}</h6>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="edit"></i></span><span>{{ x_('Assign to', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="user"></i></span><span>{{ x_('Attach files', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="paperclip"></i></span><span>{{ x_('Apply Labels', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="tag"></i></span><span>{{ x_('Set Due Date', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="calendar"></i></span><span>{{ x_('Follow Task', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="bookmark"></i></span><span>{{ x_('Set Due Date', 'pipelines') }}</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="arrow-up"></i></span><span>{{ x_('Set as Top Priority', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="repeat"></i></span><span>{{ x_('Change Status', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="pocket"></i></span><span>{{ x_('Save as Template', 'pipelines') }}</span></a>
                                <a class="dropdown-item" href="#"><span class="feather-icon dropdown-icon"><i data-feather="archive"></i></span><span>{{ x_('Move to archive', 'pipelines') }}</span></a>
                                <a class="dropdown-item delete-task" href="#"><span class="feather-icon dropdown-icon"><i data-feather="trash-2"></i></span><span>{{ x_('Delete', 'pipelines') }}</span></a>
                            </div>
                        </div>
                </header>
                <div class="task-detail-body">
                    <div class="alert alert-primary alert-wth-icon fade show mb-4" role="alert">
                        <span class="alert-icon-wrap"><span class="feather-icon"><i class="zmdi zmdi-lock"></i></span></span> This task is private for Zapped Team
                    </div>
                    <h4 class="d-flex align-items-center fw-semibold mb-0 inline-editable-wrap"><span class="editable">{{ x_('Framworking Building', 'pipelines') }}</span><a class="btn btn-sm btn-icon btn-flush-light btn-rounded flush-soft-hover edit-tyn ms-1" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a></h4>
                    <p  class="d-flex align-items-center inline-editable-wrap"><span class="editable">{{ x_('Instant rebuilding of assets during development', 'pipelines') }}</span><a class="btn btn-sm btn-icon btn-flush-light btn-rounded flush-soft-hover edit-tyn ms-1" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a></p>
                    <div class="avatar-group avatar-group-lg avatar-group-overlapped mt-3">
                        <div class="avatar avatar-rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Katharine', 'pipelines') }}">
                            <img src="dist/img/avatar8.jpg" alt="user" class="avatar-img">
                        </div>
                        <div class="avatar avatar-rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Dean', 'pipelines') }}">
                            <img src="dist/img/avatar13.jpg" alt="user" class="avatar-img">
                        </div>
                        <div class="avatar avatar-xs avatar-soft-danger avatar-rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Tom', 'pipelines') }}">
                            <span class="initial-wrap">T</span>
                        </div>
                        <div class="avatar avatar-rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Morgan', 'pipelines') }}">
                            <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                        </div>
                        <div class="avatar avatar-icon avatar-primary avatar-rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Add new', 'pipelines') }}">
                            <span class="initial-wrap"><span class="feather-icon"><i data-feather="plus"></i></span></span>
                        </div>
                    </div>
                    <form class="row">
                        <div class="col-md-4">
                            <div class="title my-4"><span>{{ x_('Assignee', 'pipelines') }}</span></div>
                            <div class="media align-items-center">
                                <div class="media-head">
                                    <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                        <span class="initial-wrap">H</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="as-name">{{ x_('Hencework', 'pipelines') }}</div>
                                    <div class="as-date">{{ x_('4 july 2022, 8:30pm', 'pipelines') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="title my-4"><span>{{ x_('Due Date', 'pipelines') }}</span></div>
                            <input class="form-control" type="text" name="single-date" >
                        </div>
                        <div class="col-md-4">
                            <div class="title my-4"><span>{{ x_('Status', 'pipelines') }}</span></div>
                            <div class="dropdown">
                                <button aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-warning btn-rounded dropdown-toggle" type="button">{{ x_('In Progress', 'pipelines') }}</button>
                                <div role="menu" class="dropdown-menu">
                                    <a class="dropdown-item" href="#">{{ x_('Action', 'pipelines') }}</a>
                                    <a class="dropdown-item" href="#">{{ x_('Another action', 'pipelines') }}</a>
                                    <a class="dropdown-item" href="#">{{ x_('Something else here', 'pipelines') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">{{ x_('Separated link', 'pipelines') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="title my-4"><span>{{ x_('Labels', 'pipelines') }}</span></div>
                            <input type="text" id="exist_values1" class="user-input-tagged form-control" name="tag-3" value="Framework,Html" placeholder="{{ x_('Add Chips', 'pipelines') }}">
                        </div>
                    </form>
                    <ul class="nav nav-justified nav-light nav-tabs nav-segmented-filled-tabs active-theme mt-4">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_checklist">
                                <span class="nav-link-text">{{ x_('Checklist', 'pipelines') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_comments">
                                <span class="nav-link-text badge-on-text">{{ x_('Comments', 'pipelines') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_files">
                                <span class="nav-link-text badge-on-text">{{ x_('Files', 'pipelines') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_activity">
                                <span class="nav-link-text badge-on-text">{{ x_('Activity', 'pipelines') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-7">
                        <div class="tab-pane fade show active" id="tab_checklist">
                            <div class="d-flex align-items-center mb-2">
                                <div class="title title-lg mb-0"><span>{{ x_('Checklist', 'pipelines') }}</span></div>
                                <a href="#" class="btn btn-xs btn-icon btn-rounded btn-white btn-floating text-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Add Category', 'pipelines') }}"><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
                            </div>
                            <div class="hk-checklist">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList1" checked="">
                                    <label class="form-check-label" for="customCheckList1">
                                        Video conference with canada Team
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList2" checked="">
                                    <label class="form-check-label" for="customCheckList2">
                                        Client objective meeting
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList3" checked="">
                                    <label class="form-check-label" for="customCheckList3">
                                        Upgrade dependency on resources
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList4">
                                    <label class="form-check-label" for="customCheckList4">
                                        Invite jaqueline on video conference
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <a href="#" class="d-flex align-items-center add-new-checklist">
                                    <span class="feather-icon fe-x me-2"><i data-feather="plus-square"></i></span>
                                    <span>{{ x_('New Item', 'pipelines') }}</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="title flex-grow-1 my-4 me-2"><span>{{ x_('Canada team task', 'pipelines') }}</span></div>
                                <div>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Edit', 'pipelines') }}"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                            </div>
                            <div class="hk-checklist">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList5" checked="">
                                    <label class="form-check-label" for="customCheckList5">
                                        Upgrade dependency on resources
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheckList6">
                                    <label class="form-check-label" for="customCheckList6">
                                        Invite jaqueline on video conference
                                        <span class="done-strikethrough"></span>
                                    </label>
                                    <a href="#" class="btn btn-xs btn-icon btn-rounded btn-flush-light flush-soft-hover delete-checklist"><span class="icon"><span class="feather-icon"><i data-feather="trash-2"></i></span></span></a>
                                </div>
                                <a href="#" class="d-flex align-items-center add-new-checklist">
                                    <span class="feather-icon fe-x me-2"><i data-feather="plus-square"></i></span>
                                    <span>{{ x_('New Item', 'pipelines') }}</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center mt-5 mb-2">
                                <div class="title title-lg mb-0"><span>{{ x_('Notes', 'pipelines') }}</span></div>
                                <a href="#" class="btn btn-xs btn-icon btn-rounded btn-white btn-floating text-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Add Notes', 'pipelines') }}"><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
                            </div>
                            <div class="card card-border note-block bg-orange-light-5 rounded-8">
                                <div class="card-body">
                                    <div class="card-action-wrap">
                                        <button class="btn btn-xs btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
                                        <div role="menu" class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">{{ x_('Action', 'pipelines') }}</a>
                                            <a class="dropdown-item" href="#">{{ x_('Another action', 'pipelines') }}</a>
                                            <a class="dropdown-item" href="#">{{ x_('Something else here', 'pipelines') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">{{ x_('Separated link', 'pipelines') }}</a>
                                        </div>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="media-head">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>{{ x_('Martin Luther', 'pipelines') }}</div>
                                            <div>{{ x_('9 Apr, 20, 7:14 AM', 'pipelines') }}</div>
                                        </div>
                                    </div>
                                    <p>@<a href="#" class="fw-medium">{{ x_('Charlie Darvin', 'pipelines') }}</a> {{ x_('From there, you can run grunt compile, grunt migrate and grunt test to compile your contracts, deploy those contracts to the network, and run their associated unit tests.', 'pipelines') }}</p>
                                </div>
                            </div>
                            <div class="card card-border note-block bg-orange-light-5 rounded-8">
                                <div class="card-body">
                                    <div class="card-action-wrap">
                                        <button class="btn btn-xs btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" aria-expanded="false" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></button>
                                        <div role="menu" class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">{{ x_('Action', 'pipelines') }}</a>
                                            <a class="dropdown-item" href="#">{{ x_('Another action', 'pipelines') }}</a>
                                            <a class="dropdown-item" href="#">{{ x_('Something else here', 'pipelines') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">{{ x_('Separated link', 'pipelines') }}</a>
                                        </div>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="media-head">
                                            <div class="avatar avatar-sm avatar-rounded">
                                                <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>{{ x_('Katherine Jones', 'pipelines') }}</div>
                                            <div>{{ x_('8 Apr, 20, 5:30 PM', 'pipelines') }}</div>
                                        </div>
                                    </div>
                                    <p>@<a href="#" class="fw-medium">{{ x_('Martin Luther', 'pipelines') }}</a> {{ x_('Viscosity ratio for "Appear view" link text is 3.7:1 which is less', 'pipelines') }} </p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-soft-light btn-block">{{ x_('View more', 'pipelines') }}</a>
                        </div>
                        <div class="tab-pane fade" id="tab_comments">
                            <div class="d-flex align-items-center mb-2">
                                <div class="title title-lg mb-0"><span>{{ x_('3 Responses', 'pipelines') }}</span></div>
                                <a href="#" class="btn btn-xs btn-icon btn-rounded btn-white btn-floating text-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="{{ x_('Add Board', 'pipelines') }}"><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
                            </div>
                            <div class="comment-block">
                                <div class="media">
                                    <div class="media-head">
                                        <div class="avatar avatar-xs avatar-rounded">
                                            <img src="dist/img/avatar4.jpg" alt="user" class="avatar-img">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <span class="cm-name">{{ x_('Martin Luther', 'pipelines') }}</span>
                                            <span class="badge badge-soft-violet">{{ x_('Manager', 'pipelines') }}</span>
                                        </div>
                                        <p>@<a href="#" class="fw-medium">{{ x_('Charlie Darvin', 'pipelines') }}</a> {{ x_('From there, you can run truffle compile, truffle migrate and truffle test to compile your contracts, deploy those contracts to the network, and run their associated unit tests.', 'pipelines') }}</p>
                                        <div class="comment-action-wrap mt-3">
                                            <span>{{ x_('3 hours ago', 'pipelines') }}</span>
                                            <span class="comment-dot-sep">●</span>
                                            <a href="#">{{ x_('Reply', 'pipelines') }}</a>
                                            <span class="comment-dot-sep">●</span>
                                            <a href="#">{{ x_('Like', 'pipelines') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-light"></div>
                                <div class="media">
                                    <div class="media-head">
                                        <div class="avatar avatar-xs avatar-rounded">
                                            <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <span class="cm-name">{{ x_('Katherine Jones', 'pipelines') }}</span>
                                        </div>
                                        <p>{{ x_('Dynamically beautiful work done by @', 'pipelines') }}<a href="#" class="fw-medium">{{ x_('Ashton Kutcher', 'pipelines') }}</a></p>
                                        <div class="comment-action-wrap mt-3">
                                            <span>{{ x_('3 hours ago', 'pipelines') }}</span>
                                            <span class="comment-dot-sep">●</span>
                                            <a href="#">{{ x_('Reply', 'pipelines') }}</a>
                                            <span class="comment-dot-sep">●</span>
                                            <a href="#">{{ x_('Like', 'pipelines') }}</a>
                                        </div>
                                        <div class="media">
                                            <div class="media-head">
                                                <div class="avatar avatar-xs avatar-rounded">
                                                    <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <span class="cm-name">{{ x_('Ashton Kutche', 'pipelines') }}</span>
                                                    <span class="badge badge-soft-danger">{{ x_('Designer', 'pipelines') }}</span>
                                                </div>
                                                <p>@<a href="#" class="fw-medium">{{ x_('Katherine Jones', 'pipelines') }}</a> {{ x_('Thank you :)', 'pipelines') }}</p>
                                                <div class="comment-action-wrap mt-3">
                                                    <span>{{ x_('3 hours ago', 'pipelines') }}</span>
                                                    <span class="comment-dot-sep">●</span>
                                                    <a href="#">{{ x_('Reply', 'pipelines') }}</a>
                                                    <span class="comment-dot-sep">●</span>
                                                    <a href="#">{{ x_('Like', 'pipelines') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-light"></div>
                                <form>
                                    <div class="form-group">
                                        <label class="form-label">{{ x_('Add Comment', 'pipelines') }}</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button class="btn btn-primary">{{ x_('Send', 'pipelines') }}</button>
                                        <small class="form-text text-muted mt-0">{{ x_('Basic HTML is allowed', 'pipelines') }}</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_files">
                            <div class="row">
                                <div class="col-sm">
                                    <form action="#" class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple >
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <div class="title title-lg mb-0"><span>{{ x_('Shared files', 'pipelines') }}</span></div>
                            </div>
                            <div class="file-block">
                                <div class="collapse-simple">
                                    <div class="card">
                                        <div class="card-header">
                                            <a role="button" data-bs-toggle="collapse" href="#files_collapse" aria-expanded="true">{{ x_('Yesterday', 'pipelines') }}</a>
                                        </div>
                                        <div id="files_collapse" class="collapse show">
                                            <div class="card-body">
                                                <ul class="sh-files">
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-icon avatar-sm avatar-soft-blue">
                                                                    <span class="initial-wrap fs-3">
                                                                        <i class="ri-file-excel-2-fill"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">website_content.exl</p>
                                                                    <p class="file-size">{{ x_('2,635 KB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-icon avatar-sm avatar-soft-light">
                                                                    <span class="initial-wrap fs-3">
                                                                        <i class="ri-file-text-fill"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">Zapped.pdf</p>
                                                                    <p class="file-size">{{ x_('1.3 GB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-icon avatar-sm avatar-soft-warning">
                                                                    <span class="initial-wrap fs-3">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">Hencework-pack.zip</p>
                                                                    <p class="file-size">{{ x_('2.45 GB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-soft-danger avatar-rounded me-2">
                                                                        <span class="initial-wrap">H</span>
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-logo avatar-sm">
                                                                    <span class="initial-wrap">
                                                                        <img src="dist/img/6image.png" alt="user">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">{{ x_('bruce-mars-fiEG-Pk6ZASFPk6ZASF', 'pipelines') }}</p>
                                                                    <p class="file-size">{{ x_('4,178 KB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar5.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-logo avatar-sm">
                                                                    <span class="initial-wrap">
                                                                        <img src="dist/img/2image.png" alt="user">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">{{ x_('jonas-kakaroto-KIPqvvTKIPqvvT', 'pipelines') }}</p>
                                                                    <p class="file-size">{{ x_('951 KB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar6.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a role="button" data-bs-toggle="collapse" href="#files_collapse_1" aria-expanded="true">{{ x_('23 April', 'pipelines') }}</a>
                                        </div>
                                        <div id="files_collapse_1" class="collapse show">
                                            <div class="card-body">
                                                <ul class="sh-files">
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-icon avatar-sm avatar-soft-light">
                                                                    <span class="initial-wrap fs-3">
                                                                        <i class="ri-keynote-fill"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">presentation.keynote</p>
                                                                    <p class="file-size">{{ x_('20 KB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar5.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0 link-danger" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-icon avatar-sm avatar-soft-warning">
                                                                    <span class="initial-wrap fs-3">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">PACK-TRIAL.zip</p>
                                                                    <p class="file-size">{{ x_('2.45 GB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-head">
                                                                <div class="avatar avatar-sm">
                                                                    <img src="dist/img/img-thumb1.html" alt="user" class="avatar-img">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <p class="file-name">{{ x_('joel-mott-LaK153ghdigaghdi', 'pipelines') }}</p>
                                                                    <p class="file-size">{{ x_('3,028 KB', 'pipelines') }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="avatar avatar-xs avatar-rounded me-2">
                                                                        <img src="dist/img/avatar8.jpg" alt="user" class="avatar-img">
                                                                    </div>
                                                                    <a href="#" class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Download', 'pipelines') }}</a>
                                                                        <a class="dropdown-item ms-0" href="#">{{ x_('Delete', 'pipelines') }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_activity">
                            <div class="mt-5 mb-2">
                                <div class="title title-lg mb-0"><span>{{ x_('Latest activity', 'pipelines') }}</span></div>
                            </div>
                            <div class="collapse-simple">
                                <div class="card">
                                    <div class="card-header">
                                        <a role="button" data-bs-toggle="collapse" href="#activity_1" aria-expanded="true">{{ x_('Today', 'pipelines') }}</a>
                                    </div>
                                    <div id="activity_1" class="collapse show">
                                        <div class="card-body">
                                            <ul class="activity-list list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                                <span class="initial-wrap">H</span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Hencework', 'pipelines') }}</span> {{ x_('on Documentation link is working now -', 'pipelines') }} <a href="#" class="link-url"><u>https://hencework.com/theme/zapped</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Oct 15, 2021, 12:34 PM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Morgan Fregman', 'pipelines') }}</span> {{ x_('completed react conversion of', 'pipelines') }} <a href="#" class="link-default"><u>components</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 16, 2021, 4:54 PM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar13.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Jimmy Carry', 'pipelines') }}</span>{{ x_('completed side bar menu on', 'pipelines') }} <a href="#" class="link-default"><u>elements</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar7.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Charlie Chaplin', 'pipelines') }}</span> {{ x_('deleted empty cards on', 'pipelines') }} <a href="#" class="link-default"><u>completed</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a role="button" data-bs-toggle="collapse" href="#activity_2" aria-expanded="true">{{ x_('Yesterday', 'pipelines') }}</a>
                                    </div>
                                    <div id="activity_2" class="collapse show">
                                        <div class="card-body">
                                            <ul class="activity-list list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-soft-danger avatar-rounded">
                                                                <span class="initial-wrap">W</span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Winston Churchills', 'pipelines') }}</span> {{ x_('created a note on UI components task list', 'pipelines') }}</p>
                                                            <div class="last-activity-time">{{ x_('Sep 2, 2021, 9:23 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Morgan Fregman', 'pipelines') }}</span> {{ x_('completed react conversion of', 'pipelines') }} <a href="#" class="link-default"><u>components</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 16, 2021, 4:54 PM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar13.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Jimmy Carry', 'pipelines') }}</span>{{ x_('added shared components to', 'pipelines') }} <a href="#" class="link-default"><u>{{ x_('basic structure', 'pipelines') }}</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-primary avatar-rounded">
                                                                <span class="initial-wrap">H</span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Hencework', 'pipelines') }}</span> {{ x_('commented on', 'pipelines') }} <a href="#" class="link-default"><u>{{ x_('basic structure', 'pipelines') }}</u></a></p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-rounded">
                                                                <img src="dist/img/avatar7.jpg" alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Charlie Chaplin', 'pipelines') }}</span> {{ x_('moved components from all modules to in progress', 'pipelines') }}</p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-head">
                                                            <div class="avatar avatar-sm avatar-soft-danger avatar-rounded">
                                                                <span class="initial-wrap">W</span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p><span class="text-dark">{{ x_('Winston Churchills', 'pipelines') }}</span> {{ x_('created a note on UI components task list', 'pipelines') }}</p>
                                                            <div class="last-activity-time">{{ x_('Sep 10, 2021, 10:13 AM', 'pipelines') }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-action-wrap">
                    <div class="nicescroll-bar">
                        <div class="title title-xs text-primary"><span>{{ x_('Action', 'pipelines') }}</span></div>
                        <ul class="nav nav-sm nav-icon nav-vertical nav-light">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="edit"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Edit', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="user"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Assign to', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="paperclip"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Attach files', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="tag"></i></span></span>
                                    <span class="nav-link-text">{{ x_('ApplyLabels', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Set Due Date', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="bookmark"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Follow Task', 'pipelines') }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hk-separator hk-separator-sm hk-secondary-separator"></div>
                        <ul class="nav nav-sm nav-icon nav-vertical nav-light">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="arrow-up"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Set as Top Priority', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="repeat"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Change Status', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="pocket"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Save as Template', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="archive"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Move to archive', 'pipelines') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">
                                    <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="trash-2"></i></span></span>
                                    <span class="nav-link-text">{{ x_('Delete', 'pipelines') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
