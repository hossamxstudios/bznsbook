<!-- Task Board Apps -->
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-5 container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datable_4c" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>{{ x_('Name', 'clients') }}</th>
                                            <th>{{ x_('Email', 'clients') }}</th>
                                            <th>{{ x_('Phone', 'clients') }}</th>
                                            <th>{{ x_('Location', 'clients') }}</th>
                                            <th>{{ x_('Company Size', 'clients') }}</th>
                                            <th>{{ x_('Status', 'clients') }}</th>
                                            <th>{{ x_('Created', 'clients') }}</th>
                                            <th>{{ x_('Actions', 'clients') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-xs avatar-rounded me-2">
                                                            <div class="avatar-text bg-{{ $client->is_active ? 'success' : 'danger' }}-light-5">
                                                                <span class="initial-wrap">{{ strtoupper(substr($client->name, 0, 1)) }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="d-block fw-medium">{{ $client->name }}</span>
                                                            @if($client->title)
                                                                <span class="d-block text-muted fs-7">{{ $client->title }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone ?: '-' }}</td>
                                                <td>
                                                    @if($client->city && $client->country)
                                                        {{ $client->city }}, {{ $client->country }}
                                                    @elseif($client->city)
                                                        {{ $client->city }}
                                                    @elseif($client->country)
                                                        {{ $client->country }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $client->company_size ?: '-' }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $client->is_active ? 'success' : 'danger' }}-light-5 text-{{ $client->is_active ? 'success' : 'danger' }}">
                                                        {{ $client->is_active ? x_('Active', 'clients') : x_('Inactive', 'clients') }}
                                                    </span>
                                                </td>
                                                <td>{{ $client->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasShow{{ $client->id }}"
                                                            aria-controls="offcanvasShow{{ $client->id }}">
                                                            <span class="icon">
                                                                <span class="feather-icon">
                                                                    <i data-feather="eye"></i>
                                                                </span>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasUpdate{{ $client->id }}"
                                                            aria-controls="offcanvasUpdate{{ $client->id }}">
                                                            <span class="icon">
                                                                <span class="feather-icon">
                                                                    <i data-feather="edit"></i>
                                                                </span>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $client->id }}">
                                                            <span class="icon">
                                                                <span class="feather-icon">
                                                                    <i data-feather="trash"></i>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
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

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var dataTable = $('#client_table').DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 1, "desc" ]], // Sort by ID descending
            "language": {
                "search": "",
                "searchPlaceholder": "{{ x_('Search clients...', 'clients') }}",
                "paginate": {
                    "next": '<i class="ri-arrow-right-s-line"></i>',
                    "previous": '<i class="ri-arrow-left-s-line"></i>'
                },
                "info": "{{ x_('Showing _START_ to _END_ of _TOTAL_ clients', 'clients') }}",
                "infoEmpty": "{{ x_('Showing 0 to 0 of 0 clients', 'clients') }}",
                "infoFiltered": "{{ x_('(filtered from _MAX_ total clients)', 'clients') }}",
                "lengthMenu": "{{ x_('Show _MENU_ clients per page', 'clients') }}"
            },
            "dom": '<"top d-flex justify-content-between"lf>rt<"bottom d-flex justify-content-between"ip><"clear">'
        });

        // Initialize feather icons
        if (window.feather) {
            feather.replace();
        }
    });
</script>
