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
                        <h4 class="mb-3">{{ $tenant->name }} Dashboard</h4>
                        <p class="mb-0">Overview of tenant's business progress and activities.</p>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn btn-primary">
                        <i class="las la-arrow-left mr-1"></i> Back to Tenants
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Total Products</h6>
                                <h3>{{ $businessProgress['products'] }}</h3>
                            </div>
                            <i class="fas fa-boxes fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Total Sales</h6>
                                <h3>{{ $businessProgress['sales'] }}</h3>
                            </div>
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Total Customers</h6>
                                <h3>{{ $businessProgress['customers'] }}</h3>
                            </div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Total Revenue</h6>
                                <h3>Rs {{ number_format($businessProgress['revenue'], 2) }}</h3>
                            </div>
                            <i class="fas fa-rupee-sign fa-2x"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Recent Sales</h4>
                        </div>
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        @if($recentSales->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentSales as $sale)
                                        <tr>
                                            <td>{{ $sale->invoice_number }}</td>
                                            <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('d M Y') }}</td>
                                            <td>Rs {{ number_format($sale->total_amount, 2) }}</td>
                                            <td>
                                                <a href="#" class="badge badge-info">
                                                    <i class="ri-eye-line mr-0"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No recent sales found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Inventory Alerts</h4>
                        </div>
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        @if($inventoryStatus > 0)
                            <div class="alert alert-danger">
                                <strong>{{ $inventoryStatus }} products</strong> are below reorder level.
                            </div>
                            <p>You should review your inventory and place orders for these items.</p>
                        @else
                            <div class="alert alert-success">
                                All products are above reorder level.
                            </div>
                        @endif
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