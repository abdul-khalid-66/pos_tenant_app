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
                        <h4 class="mb-3">Tenant Details</h4>
                        <p class="mb-0">View and manage tenant information.</p>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-primary">
                        <i class="las la-arrow-left mr-1"></i> Back to Tenants
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="header-title">
                            <h4 class="card-title">Tenant Information</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>Name:</h6>
                            <p>{{ $tenant->name }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Domain:</h6>
                            <p>
                                <a href="http://{{ $tenant->domains->first()->domain }}" target="_blank">
                                    {{ $tenant->domains->first()->domain }}
                                </a>
                            </p>
                        </div>
                        <div class="mb-3">
                            <h6>Database:</h6>
                            <p>{{ $tenant->database_name }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Status:</h6>
                            <span class="badge badge-{{ $tenant->is_active ? 'success' : 'danger' }}">
                                {{ $tenant->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <h6>Created At:</h6>
                            <p>{{ $tenant->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Timezone:</h6>
                            <p>{{ $tenant->timezone }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Currency:</h6>
                            <p>{{ $tenant->currency }}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Locale:</h6>
                            <p>{{ $tenant->locale }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <div class="header-title">
                            <h4 class="card-title">Business Information</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($tenant->businesses->count() > 0)
                            @foreach($tenant->businesses as $business)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Business Name:</h6>
                                        <p>{{ $business->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Email:</h6>
                                        <p>{{ $business->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Phone:</h6>
                                        <p>{{ $business->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h6>Address:</h6>
                                        <p>{{ $business->address }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Tax Number:</h6>
                                        <p>{{ $business->tax_number ?? 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Registration Number:</h6>
                                        <p>{{ $business->registration_number ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                No business information found for this tenant.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <div class="header-title">
                            <h4 class="card-title">Actions</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center list-action">
                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-primary mr-3">
                                <i class="ri-pencil-line mr-1"></i> Edit Tenant
                            </a>
                            <a href="{{ route('dashboard', $tenant->id) }}" class="btn btn-success mr-3">
                                <i class="ri-dashboard-line mr-1"></i> View Dashboard
                            </a>
                            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tenant?')">
                                    <i class="ri-delete-bin-line mr-1"></i> Delete Tenant
                                </button>
                            </form>
                        </div>
                    </div>
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