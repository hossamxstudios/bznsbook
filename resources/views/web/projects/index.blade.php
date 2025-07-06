<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>Browse Projects | Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')

        <!-- Projects List -->
        <section class="pt-5 position-relative">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="mb-4 h2">Browse Projects</h1>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $projects->total() }} Projects Found</span>
                            </div>
                            <div>
                                <a href="{{ route('client.projects.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus fs-lg me-2"></i>Post New Project
                                </a>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Projects Grid -->
                        <div class="row g-4">
                            @forelse($projects as $project)
                                <div class="col-md-6">
                                    <div class="pt-5 border-0 shadow-sm card card-hover h-100 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3">
                                        <div class="pt-3 card-body">
                                            <!-- Project icon with color based on status -->
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-warning',
                                                    'active' => 'bg-success',
                                                    'awarded' => 'bg-primary',
                                                    'completed' => 'bg-info',
                                                    'cancelled' => 'bg-danger'
                                                ];
                                                $bgColor = $statusColors[$project->status] ?? 'bg-dark';
                                            @endphp

                                            <div class="d-inline-block {{ $bgColor }} shadow-{{ $project->status }} rounded-3 position-absolute top-0 translate-middle-y p-3">
                                                <i class="m-1 text-white bx bx-briefcase d-block" style="font-size: 24px;"></i>
                                            </div>

                                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                                <h2 class="mb-0 h4 d-inline-flex align-items-center">
                                                    <a href="{{ route('projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                                                        {{ $project->name }}
                                                        <i class="bx bx-right-arrow-circle text-dark fs-3 ms-2"></i>
                                                    </a>
                                                </h2>

                                                <!-- Status badge -->
                                                <span class="badge {{ $bgColor }}">{{ ucfirst($project->status) }}</span>
                                            </div>

                                            <!-- Project description -->
                                            <div class="mb-3">
                                                <p class="mb-3 fs-sm text-body">
                                                    {{ \Illuminate\Support\Str::limit($project->details, 120) }}
                                                </p>

                                                <!-- Budget -->
                                                <div class="mb-3 d-flex align-items-center">
                                                    <span class="badge bg-faded-primary text-primary me-2">
                                                        <i class="bx bx-money me-1"></i>
                                                        {{ number_format($project->budget_min, 2) }} - {{ number_format($project->budget_max, 2) }} EGP
                                                    </span>
                                                </div>

                                                <!-- Skills tags -->
                                                @if(is_array($project->skills) && count($project->skills) > 0)
                                                    <div class="flex-wrap gap-1 d-flex">
                                                        @foreach(array_slice($project->skills, 0, 3) as $skill)
                                                            <span class="badge bg-faded-primary text-primary">{{ $skill }}</span>
                                                        @endforeach
                                                        @if(count($project->skills) > 3)
                                                            <span class="badge bg-light text-dark">+{{ count($project->skills) - 3 }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Card footer with metadata -->
                                            <div class="pt-3 d-flex text-muted border-top">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center me-4">
                                                        <i class="bx bx-user fs-xl me-1"></i>
                                                        {{ $project->client->name }}
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <i class="bx bx-calendar fs-xl me-1"></i>
                                                        {{ $project->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="p-4 text-center rounded border">
                                        <i class="mb-2 display-6 bx bx-server text-muted"></i>
                                        <p class="mb-3">No projects available at this time.</p>
                                        <a href="{{ route('client.projects.create') }}" class="btn btn-primary">
                                            <i class="bx bx-plus me-2"></i>Post Your First Project
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
