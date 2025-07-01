<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="{{ asset('backend/assets/css/backend-plugin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/css/backend.css?v=1.0.0') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/remixicon/fonts/remixicon.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Tenants Management</h4>
                        <p class="mb-0">Manage all your registered tenants.<br> Each tenant can have multiple businesses.</p>
                    </div>
                    <a href="{{ route('tenants.create') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Tenant
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Domain</th>
                                <th>Database</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($tenants as $tenant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tenant->name }}</td>
                                <td>
                                    <a href="http://{{ $tenant->domains->first()->domain }}" target="_blank">
                                        {{ $tenant->domains->first()->domain }}
                                    </a>
                                </td>
                                <td>{{ $tenant->database_name }}</td>
                                <td>
                                    <span class="badge badge-{{ $tenant->is_active ? 'success' : 'danger' }}">
                                        {{ $tenant->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $tenant->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                            data-placement="top" title="View" href="{{ route('tenants.show', $tenant->id) }}">
                                            <i class="ri-eye-line mr-0"></i>
                                        </a>
                                        <a class="badge bg-success mr-2" data-toggle="tooltip"
                                            data-placement="top" title="Edit" href="{{ route('tenants.edit', $tenant->id) }}">
                                            <i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-warning mr-2 border-0" data-toggle="tooltip"
                                                data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this tenant?')">
                                                <i class="ri-delete-bin-line mr-0"></i>
                                            </button>
                                        </form>
                                        <a class="badge bg-secondary" data-toggle="tooltip"
                                            data-placement="top" title="Dashboard" href="{{ route('tenants.dashboard',$tenant->id) }}">
                                            <i class="ri-dashboard-line mr-0"></i>
                                        </a>
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

    @push('js')
        <!-- Backend Bundle JavaScript -->
        <script src="{{ asset('backend/assets/js/backend-bundle.min.js') }}"></script>
        <!-- Table Treeview JavaScript -->
        <script src="{{ asset('backend/assets/js/table-treeview.js') }}"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('backend/assets/js/customizer.js') }}"></script>
        <!-- Chart Custom JavaScript -->
        <script async src="{{ asset('backend/assets/js/chart-custom.js') }}"></script>
        <!-- app JavaScript -->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    @endpush
</x-app-layout>