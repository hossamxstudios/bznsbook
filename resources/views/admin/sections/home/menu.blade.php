
{{-- 'requests','leads','contacts', 'companies', 'deals', --}}
<div class="row">
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-envelope"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$requests}}"></span> </h4>
                <p class="text-muted">Requests</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-user-circle"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$leads}}"></span> </h4>
                <p class="text-muted">Leads</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-black" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-address-book"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$contacts}}"></span></h4>
                <p class="text-muted">Contacts</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-buildings"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$companies}}"></span></h4>
                <p class="text-muted">Companies</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-black" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-heartbeat"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$deals}}"></span></h4>
                <p class="text-muted">Deals</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>

{{-- 'plans', 'features', 'supscriptions', 'partners', 'members', --}}
<div class="row">
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-briefcase"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$plans}}"></span> </h4>
                <p class="text-muted "> Plans</p>

            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-user-circle"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$features}}"></span> </h4>
                <p class="text-muted "> Features</p>
            </div>
            <div class="progress progress-sm rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-currency-dollar"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$supscriptions}}"></span></h4>
                <p class="text-muted "> Supscriptions</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-buildings"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$partners}}"></span></h4>
                <p class="text-muted "> Registered Companies</p>
            </div>
            <div class="progress progress-sm rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-users-three"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$members}}"></span></h4>
                <p class="text-muted "> HRs</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>

{{-- 'trainees', 'instructors','courses','workshops', 'enrollments', --}}
<div class="row">
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-users-three"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$trainees}}"></span> </h4>
                <p class="text-muted "> Trainees</p>

            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-chalkboard-teacher"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$instructors}}"></span> </h4>
                <p class="text-muted "> Instructors</p>
            </div>
            <div class="progress progress-sm rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-books"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$courses}}"></span></h4>
                <p class="text-muted "> Courses</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-clipboard-text"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$workshops}}"></span></h4>
                <p class="text-muted "> In Class Courses
                </p>
            </div>
            <div class="progress progress-sm rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-activity"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$enrollments}}"></span></h4>
                <p class="text-muted "> Enrollments</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>

{{-- 'joins','activeEnrollments', 'passdEnrollments', --}}
<div class="row">
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-users-three"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$joins}}"></span> </h4>
                <p class="text-muted "> In Class Enrollments </p>

            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-secondary-subtle text-secondary fs-3xl rounded">
                        <i class="ph ph-activity"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$activeEnrollments}}"></span> </h4>
                <p class="text-muted "> Active Enrollments</p>
            </div>
            <div class="progress progress-sm rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-secondary" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl col-sm-6">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="avatar-sm float-end">
                    <div class="avatar-title bg-danger-subtle text-danger fs-3xl rounded">
                        <i class="ph ph-check-circle"></i>
                    </div>
                </div>
                <h4><span class="counter-value" data-target="{{$passdEnrollments}}"></span></h4>
                <p class="text-muted "> Passd Enrollments</p>
            </div>
            <div class="progress progress-sm rounded-0">
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>
