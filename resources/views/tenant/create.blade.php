<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="{{ asset('backend/assets/css/backend-plugin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/css/backend.css?v=1.0.0') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/remixicon/fonts/remixicon.css') }}">
    @endpush

    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add New Tenant</h4>
                        </div>
                        <a href="{{ route('tenants.index') }}" class="btn btn-primary">
                            <i class="las la-arrow-left mr-1"></i> Back to Tenants
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tenants.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tenant Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Tenant Name" required>
                                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Domain *</label>
                                        <div class="input-group">
                                            <input type="text" name="domain" class="form-control" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.{{ config('app.domain') }}</span>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">This will be your subdomain (e.g., demo.yourdomain.com)</small>
                                        @error('domain') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Database Name *</label>
                                        <input type="text" name="database_name" class="form-control" placeholder="Enter Database Name" required>
                                        <small class="form-text text-muted">Must be unique across all tenants</small>
                                        @error('database_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Timezone</label>
                                        <select name="timezone" class="form-control">
                                            @foreach(timezone_identifiers_list() as $timezone)
                                                <option value="{{ $timezone }}" {{ $timezone == 'UTC' ? 'selected' : '' }}>{{ $timezone }}</option>
                                            @endforeach
                                        </select>
                                        @error('timezone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select name="currency" class="form-control">
                                            <option value="Rs" selected>Rs (Rupees)</option>
                                            <option value="USD">USD (Dollar)</option>
                                            <option value="EUR">EUR (Euro)</option>
                                        </select>
                                        @error('currency') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Locale</label>
                                        <select name="locale" class="form-control">
                                            <option value="en_US" selected>English (US)</option>
                                            <option value="en_GB">English (UK)</option>
                                        </select>
                                        @error('locale') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5 class="mb-3">Admin User</h5>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admin Name *</label>
                                        <input type="text" name="admin_name" class="form-control" placeholder="Enter Admin Name" required>
                                        @error('admin_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admin Email *</label>
                                        <input type="email" name="admin_email" class="form-control" placeholder="Enter Admin Email" required>
                                        @error('admin_email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admin Password *</label>
                                        <input type="password" name="admin_password" class="form-control" placeholder="Enter Password" required>
                                        @error('admin_password') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5 class="mb-3">Business Information</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Name *</label>
                                        <input type="text" name="business_name" class="form-control" placeholder="Enter Business Name" required>
                                        @error('business_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Email *</label>
                                        <input type="email" name="business_email" class="form-control" placeholder="Enter Business Email" required>
                                        @error('business_email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Phone *</label>
                                        <input type="text" name="business_phone" class="form-control" placeholder="Enter Business Phone" required>
                                        @error('business_phone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tax Number</label>
                                        <input type="text" name="tax_number" class="form-control" placeholder="Enter Tax Number">
                                        @error('tax_number') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Business Address *</label>
                                        <textarea name="business_address" class="form-control" rows="3" required></textarea>
                                        @error('business_address') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Create Tenant</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
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