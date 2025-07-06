 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasShow{{ $deal->id }}" aria-labelledby="offcanvasShowLabel{{ $deal->id }}" style="width:480px;">
    <div class="offcanvas-header justify-content-center text-capitalize" style="background: #474e5d; ">
        <h5 id="offcanvasShowLabel{{ $deal->id }}" style="color: aliceblue" class="text-center">{{ $deal->name }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-3 text-capitalize" >
            <p style="font-weight: bold; font-size: 2em; display:inline-block"> {{ $deal->name }}</p>
            <span style="font-size: 1.25em; padding-left:10px">Amount: ${{ $deal->amount }}</span>
        </div>
        <div class="mb-3">

        </div>

        <div class="mb-3">
            <p >Stage: <span style="color: red">{{ $deal->stage->name }}</span></p>
        </div>
        <div class="mb-3">
            <p >Closed Date: {{ $deal->closed_at }}</p>
        </div>
        <div class="my-5 row justify-content-center text-center">
            <div class="col-3">
                <div class="badge-icon badge-circle badge-icon-sm text-gray">
                    <div class="badge-icon-wrap">
                        <i class="ri-sticky-note-line"></i> <!-- Sticky Note Icon -->
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                        <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                            <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor"/>
                            <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor"/>
                        </g>
                    </svg>
                </div>
                <p >Add Note</p>
            </div>
            <div class="col-3">
                <div class="badge-icon badge-circle badge-icon-sm text-gray">
                    <div class="badge-icon-wrap">
                        <i class="ri-building-line"></i>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                        <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                            <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor"/>
                            <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor"/>
                        </g>
                    </svg>
                </div>
                <p> Assign Company</p>
            </div>
            <div class="col-3">
                <div class="badge-icon badge-circle badge-icon-sm text-gray">
                    <div class="badge-icon-wrap">
                        <i class="ri-user-line "></i>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                        <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                            <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor"/>
                            <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor"/>
                        </g>
                    </svg>
                </div>
                <p> Assign Contact</p>
            </div>
            <div class="col-3">
                <div class="badge-icon badge-circle badge-icon-sm text-gray">
                    <div class="badge-icon-wrap">
                        <i class="ri-mail-line"></i>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 127">
                        <g data-name="Ellipse 302" transform="translate(8 8)" stroke-width="3" vector-effect="non-scaling-stroke">
                            <circle cx="55.5" cy="55.5" r="55.5" stroke="currentColor"/>
                            <circle cx="55.5" cy="55.5" r="59.5" vector-effect="non-scaling-stroke" fill="currentColor"/>
                        </g>
                    </svg>
                </div>
                <p >Add Activity</p>
            </div>
        </div>

        <div class="mb-3">
            <ul class="nav nav-tabs nav-icon nav-light">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab_block_12">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="check-circle"></i></span></span>
                        <span class="nav-link-text">Activity Log</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab_block_22">
                        <span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="file-text"></i></span></span>
                        <span class="nav-link-text">Nots</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_block_12">
                    <div class="card">
                        <div class="card-header">
                            <a role="button" data-bs-toggle="collapse" href="#activity_11" aria-expanded="true">Today</a>
                        </div>
                        <div id="activity_11" class="collapse show">
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
                                                <p><span class="text-dark">Hencework</span> on Documentation link is working now - <a href="#" class="link-url"><u>https://hencework.com/theme/zapped</u></a></p>
                                                <div class="last-activity-time">Oct 15, 2021, 12:34 PM</div>
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
                                                <p><span class="text-dark">Morgan Fregman</span> completed react conversion of <a href="#" class="link-default"><u>components</u></a></p>
                                                <div class="last-activity-time">Sep 16, 2021, 4:54 PM</div>
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
                                                <p><span class="text-dark">Jimmy Carry</span>completed side bar menu on <a href="#" class="link-default"><u>elements</u></a></p>
                                                <div class="last-activity-time">Sep 10, 2021, 10:13 AM</div>
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
                                                <p><span class="text-dark">Charlie Chaplin</span> deleted empty cards on <a href="#" class="link-default"><u>completed</u></a></p>
                                                <div class="last-activity-time">Sep 10, 2021, 10:13 AM</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                </div>
                <div class="tab-pane fade" id="tab_block_22">
                    <p>iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                </div>
            </div>
        </div>
    </div>
</div>
