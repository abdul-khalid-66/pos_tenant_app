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
                            <h4 class="card-title">Edit Tenant: {{ $tenant->name }}</h4>
                        </div>
                        <a href="{{ route('tenants.index') }}" class="btn btn-primary">
                            <i class="las la-arrow-left mr-1"></i> Back to Tenants
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tenant Name *</label>
                                        <input type="text" name="name" class="form-control" 
                                            placeholder="Enter Tenant Name" 
                                            value="{{ old('name', $tenant->name) }}" required>
                                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Domain *</label>
                                        <input type="text" name="domain" class="form-control" 
                                            placeholder="Enter Domain" 
                                            value="{{ old('domain', $tenant->domains->first()->domain ?? '') }}" required>
                                        @error('domain') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Database Name *</label>
                                        <input type="text" name="database_name" class="form-control" 
                                            placeholder="Enter Database Name" 
                                            value="{{ old('database_name', $tenant->database_name) }}" required readonly>
                                        <small class="form-text text-muted">Database name cannot be changed after creation</small>
                                        @error('database_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Timezone</label>
                                        <select name="timezone" class="form-control">
                                            @foreach(timezone_identifiers_list() as $timezone)
                                                <option value="{{ $timezone }}" {{ $timezone == old('timezone', $tenant->timezone) ? 'selected' : '' }}>
                                                    {{ $timezone }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('timezone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select name="currency" class="form-control">
                                            <option value="Rs" {{ old('currency', $tenant->currency) == 'Rs' ? 'selected' : '' }}>Rs (Rupees)</option>
                                            <option value="USD" {{ old('currency', $tenant->currency) == 'USD' ? 'selected' : '' }}>USD (Dollar)</option>
                                            <option value="EUR" {{ old('currency', $tenant->currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                                        </select>
                                        @error('currency') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Locale</label>
                                        <select name="locale" class="form-control">
                                            <option value="en_US" {{ old('locale', $tenant->locale) == 'en_US' ? 'selected' : '' }}>English (US)</option>
                                            <option value="en_GB" {{ old('locale', $tenant->locale) == 'en_GB' ? 'selected' : '' }}>English (UK)</option>
                                        </select>
                                        @error('locale') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="is_active" class="form-control">
                                            <option value="1" {{ old('is_active', $tenant->is_active) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ !old('is_active', $tenant->is_active) ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5 class="mb-3">Primary Business Information</h5>
                                </div>
                                @foreach($tenant->businesses as $business)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Name *</label>
                                        <input type="text" name="business_name" class="form-control" 
                                            placeholder="Enter Business Name" 
                                            value="{{ old('business_name', $business->name) }}" required>
                                        @error('business_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Email *</label>
                                        <input type="email" name="business_email" class="form-control" 
                                            placeholder="Enter Business Email" 
                                            value="{{ old('business_email', $business->email) }}" required>
                                        @error('business_email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Phone *</label>
                                        <input type="text" name="business_phone" class="form-control" 
                                            placeholder="Enter Business Phone" 
                                            value="{{ old('business_phone', $business->phone) }}" required>
                                        @error('business_phone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tax Number</label>
                                        <input type="text" name="tax_number" class="form-control" 
                                            placeholder="Enter Tax Number" 
                                            value="{{ old('tax_number', $business->tax_number) }}">
                                        @error('tax_number') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Business Address *</label>
                                        <textarea name="business_address" class="form-control" rows="3" required>{{ old('business_address', $business->address) }}</textarea>
                                        @error('business_address') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update Tenant</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="{{ route('tenants.index') }}" class="btn btn-light">Cancel</a>
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