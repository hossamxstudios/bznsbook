<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ $portfolio->name }} | Bzns Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container py-5">
            <div class="row">
                @include('web.sections.profile.side')
                @include('web.sections.profile-show.main')

            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
    <!-- Edit Portfolio Modal -->
    @include('web.sections.profile-show.edit-modal')
    <script>
        // Handle delete confirmation
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForm = document.querySelector('.delete-form');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this portfolio item? This action cannot be undone.')) {
                        this.submit();
                    }
                });
            }

            // Handle expertise add button in edit form
            document.getElementById('edit-add-expertise-btn').addEventListener('click', function() {
                const expertiseContainer = document.getElementById('edit-expertise-container');
                const newRow = document.createElement('div');
                newRow.className = 'input-group mb-2';
                newRow.innerHTML = `
                    <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                    <button type="button" class="btn btn-danger remove-edit-expertise"><i class="bx bx-minus"></i></button>
                `;
                expertiseContainer.appendChild(newRow);

                // Add event listener to the new remove button
                newRow.querySelector('.remove-edit-expertise').addEventListener('click', function() {
                    expertiseContainer.removeChild(newRow);
                });
            });

            // Edit portfolio modal data population
            const editButtons = document.querySelectorAll('.edit-portfolio');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const type = this.getAttribute('data-type');
                    const date = this.getAttribute('data-date');
                    const details = this.getAttribute('data-details');
                    const clientName = this.getAttribute('data-client-name');
                    const challenge = this.getAttribute('data-challenge');
                    const solution = this.getAttribute('data-solution');
                    const projectUrl = this.getAttribute('data-project-url');
                    const location = this.getAttribute('data-location');
                    const expertiseJson = this.getAttribute('data-expertise');
                    const portfolioId = this.getAttribute('data-id');

                    // Set form action URL
                    document.getElementById('editPortfolioForm').action = `/profile/portfolio/${id}`;

                    // Populate form fields
                    document.getElementById('edit_name').value = name || '';
                    document.getElementById('edit_type').value = type || '';
                    document.getElementById('edit_date').value = date || '';
                    document.getElementById('edit_details').value = details || '';
                    document.getElementById('edit_client_name').value = clientName || '';
                    document.getElementById('edit_challenge').value = challenge || '';
                    document.getElementById('edit_solution').value = solution || '';
                    document.getElementById('edit_project_url').value = projectUrl || '';
                    document.getElementById('edit_location').value = location || '';

                    // Clear existing expertise fields
                    const expertiseContainer = document.getElementById('edit-expertise-container');
                    expertiseContainer.innerHTML = '';

                    // Parse expertise JSON
                    let expertiseArray = [];
                    try {
                        if (expertiseJson) {
                            expertiseArray = JSON.parse(expertiseJson);
                        }
                    } catch (e) {
                        console.error('Error parsing expertise JSON:', e);
                    }

                    // If there are expertise items, add them to the form
                    if (expertiseArray && expertiseArray.length > 0) {
                        expertiseArray.forEach((item, index) => {
                            const newRow = document.createElement('div');
                            newRow.className = 'input-group mb-2';
                            newRow.innerHTML = `
                                <input type="text" class="form-control" name="expertise[]" value="${item}" placeholder="E.g., Web Design">
                                <button type="button" class="btn btn-danger remove-edit-expertise"><i class="bx bx-minus"></i></button>
                            `;
                            expertiseContainer.appendChild(newRow);
                        });
                    } else {
                        // Add at least one empty field if none exist
                        const newRow = document.createElement('div');
                        newRow.className = 'input-group mb-2';
                        newRow.innerHTML = `
                            <input type="text" class="form-control" name="expertise[]" placeholder="E.g., Web Design">
                            <button type="button" class="btn btn-success add-edit-expertise"><i class="bx bx-plus"></i></button>
                        `;
                        expertiseContainer.appendChild(newRow);
                    }

                    // Add event listeners to expertise remove buttons
                    document.querySelectorAll('.remove-edit-expertise').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const row = this.closest('.input-group');
                            expertiseContainer.removeChild(row);
                        });
                    });

                    // Check service checkboxes based on the portfolio's services
                    document.querySelectorAll('.edit-service-checkbox').forEach(checkbox => {
                        checkbox.checked = false;
                    });

                    // Use the API endpoint to get portfolio services
                    fetch(`/profile/portfolio/${portfolioId}/services`)
                        .then(response => response.json())
                        .then(data => {
                            // Check the services associated with this portfolio
                            if (data.services && data.services.length) {
                                data.services.forEach(serviceId => {
                                    const checkbox = document.getElementById(`edit_service${serviceId}`);
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching portfolio services:', error);
                        });
                });
            });
        });
    </script>
</body>
</html>
