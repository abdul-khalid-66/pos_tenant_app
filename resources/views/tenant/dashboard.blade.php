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
                        <h4 class="mb-3">Tenants Dashboard</h4>
                        <p class="mb-0">Overview of all tenants' business progress and activities.</p>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-primary">
                        <i class="las la-list mr-1"></i> View All Tenants
                    </a>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(count($tenantData) === 0)
            <div class="alert alert-info">
                No tenants found. Please create a tenant first.
            </div>
        @else
            @foreach($tenantData as $data)
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $data['tenant']->name }}</h5>
                            <a href="{{ route('tenants.show', $data['tenant']->id) }}" class="btn btn-light btn-sm">
                                <i class="ri-eye-line mr-1"></i> View Details
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-white-50">Total Products</h6>
                                                <h3>{{ $data['businessProgress']['products'] ?? 0 }}</h3>
                                            </div>
                                            <i class="fas fa-boxes fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-white-50">Total Sales</h6>
                                                <h3>{{ $data['businessProgress']['sales'] ?? 0 }}</h3>
                                            </div>
                                            <i class="fas fa-shopping-cart fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-white-50">Total Customers</h6>
                                                <h3>{{ $data['businessProgress']['customers'] ?? 0 }}</h3>
                                            </div>
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-white-50">Total Revenue</h6>
                                                <h3>Rs {{ number_format($data['businessProgress']['revenue'] ?? 0, 2) }}</h3>
                                            </div>
                                            <i class="fas fa-rupee-sign fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="mb-0">Recent Sales</h6>
                                    </div>
                                    <div class="card-body">
                                        @if(count($data['recentSales']) > 0)
                                            <div class="table-responsive">
                                                <table class="table table-sm table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data['recentSales'] as $sale)
                                                        <tr>
                                                            <td>{{ $sale->invoice_number ?? 'N/A' }}</td>
                                                            <td>{{ isset($sale->created_at) ? \Carbon\Carbon::parse($sale->created_at)->format('d M Y') : 'N/A' }}</td>
                                                            <td>Rs {{ number_format($sale->total_amount ?? 0, 2) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="alert alert-info">
                                                No recent sales found for this tenant.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="mb-0">Inventory Status</h6>
                                    </div>
                                    <div class="card-body">
                                        @if($data['inventoryStatus'] > 0)
                                            <div class="alert alert-danger">
                                                <strong>{{ $data['inventoryStatus'] }} products</strong> are below reorder level.
                                            </div>
                                            <p>This tenant should review inventory and place orders for low stock items.</p>
                                        @else
                                            <div class="alert alert-success">
                                                All products are above reorder level for this tenant.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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