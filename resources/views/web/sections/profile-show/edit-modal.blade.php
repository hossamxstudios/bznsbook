<div class="modal fade" id="editPortfolioModal" tabindex="-1" aria-labelledby="editPortfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPortfolioModalLabel">Edit Portfolio Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Basic Info Section -->
                    <h6 class="mb-3 fw-bold">Basic Information</h6>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_name" class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_client_name" class="form-label">Client Name</label>
                            <input type="text" class="form-control" id="edit_client_name" name="client_name" placeholder="Client or company name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="edit_type" class="form-label">Project Type</label>
                            <input type="text" class="form-control" id="edit_type" name="type" placeholder="e.g., Web, Mobile, Design">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_date" class="form-label">Project Date</label>
                            <input type="date" class="form-control" id="edit_date" name="date">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="edit_location" name="location" placeholder="Project location">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_project_url" class="form-label">Project URL</label>
                        <input type="url" class="form-control" id="edit_project_url" name="project_url" placeholder="https://">
                    </div>

                    <!-- Project Details Section -->
                    <h6 class="mt-4 mb-3 fw-bold">Project Details</h6>
                    <div class="mb-3">
                        <label for="edit_details" class="form-label">Project Details</label>
                        <textarea class="form-control" id="edit_details" name="details" rows="3" placeholder="Describe your project"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_challenge" class="form-label">Project Challenge</label>
                        <textarea class="form-control" id="edit_challenge" name="challenge" rows="2" placeholder="Describe the challenges faced during this project"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_solution" class="form-label">Project Solution</label>
                        <textarea class="form-control" id="edit_solution" name="solution" rows="2" placeholder="Describe the solutions you implemented"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Areas of Expertise</label>
                        <div id="edit-expertise-container">
                            <!-- Expertise fields will be dynamically added here via JavaScript -->
                        </div>
                        <button type="button" class="mt-2 btn btn-sm btn-success" id="edit-add-expertise-btn"><i class="bx bx-plus"></i> Add Another Expertise</button>
                        <div class="mt-1 form-text">Add multiple areas of expertise by clicking the plus button.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Services Used</label>
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            @forelse($services as $service)
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input edit-service-checkbox" type="checkbox" name="services[]" value="{{ $service->id }}" id="edit_service{{ $service->id }}">
                                        <label class="form-check-label" for="edit_service{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="mb-0 alert alert-info">
                                        <i class="bx bx-info-circle me-1"></i>
                                        You don't have any services defined yet. To associate services with your portfolio, please create services first.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Project Image</label>
                        <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                        <div class="form-text">Upload a new image to replace the current one (max 5MB). Leave empty to keep the current image.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Portfolio Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
