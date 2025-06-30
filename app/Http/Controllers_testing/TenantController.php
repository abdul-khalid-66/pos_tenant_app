<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Domain;
use App\Models\Business;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with(['businesses', 'domains'])->latest()->paginate(10);
        return view('tenant.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenant.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255|unique:domains,domain',
            'database_name' => 'required|string|max:64|unique:tenants,database_name',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:users,email',
            'admin_password' => 'required|string|min:8',
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email',
            'business_phone' => 'required|string|max:20',
            'business_address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        // try {
        // Create tenant
        $tenant = Tenant::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'domain' => $request->domain,
            'database_name' => $request->database_name,
            'timezone' => $request->timezone ?? 'UTC',
            'currency' => $request->currency ?? 'Rs',
            'locale' => $request->locale ?? 'en_US',
            'is_active' => true,
        ]);

        // Create domain
        $tenant->domains()->create([
            'domain' => $request->domain,
            'tenant_id' => $tenant->id,
        ]);

        // Create business
        $business = Business::create([
            'tenant_id' => $tenant->id,
            'name' => $request->business_name,
            'email' => $request->business_email,
            'phone' => $request->business_phone,
            'address' => $request->business_address,
        ]);

        // Create admin user in central database
        $admin = User::create([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->admin_password),
            'email_verified_at' => now(),
        ]);

        DB::commit();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully.');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->back()
        //         ->with('error', 'Error creating tenant: ' . $e->getMessage())
        //         ->withInput();
        // }
    }

    public function show(Tenant $tenant)
    {
        $tenant->load(['businesses', 'domains']);
        return view('tenant.show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        $tenant->load(['businesses', 'domains']);
        return view('tenant.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'domain' => [
                'required',
                'string',
                'max:255',
                Rule::unique('domains', 'domain')->ignore($tenant->domains->first()->id),
            ],
            'timezone' => 'required|string',
            'currency' => 'required|string|size:3',
            'locale' => 'required|string',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        // try {
        $tenant->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'timezone' => $request->timezone,
            'currency' => $request->currency,
            'locale' => $request->locale,
            'is_active' => $request->has('is_active'),
        ]);

        if ($tenant->domains->first()->domain != $request->domain) {
            $tenant->domains()->update(['domain' => $request->domain]);
        }

        DB::commit();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully.');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->back()
        //         ->with('error', 'Error updating tenant: ' . $e->getMessage())
        //         ->withInput();
        // }
    }

    public function destroy(Tenant $tenant)
    {
        DB::beginTransaction();

        try {
            $tenant->domains()->delete();
            $tenant->delete();

            DB::commit();

            return redirect()->route('tenants.index')
                ->with('success', 'Tenant deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tenants.index')
                ->with('error', 'Error deleting tenant: ' . $e->getMessage());
        }
    }

    public function dashboard()
    {
        // try {
        $tenants = Tenant::with(['businesses'])->get();

        $tenantData = [];

        foreach ($tenants as $tenant) {
            // Get business progress data using Eloquent
            $businessProgress = [
                'products' => Product::where('tenant_id', $tenant->id)->count(),
                'sales' => Sale::where('tenant_id', $tenant->id)->count(),
                'customers' => Customer::where('tenant_id', $tenant->id)->count(),
                'revenue' => Sale::where('tenant_id', $tenant->id)->sum('total_amount'),
            ];

            // Get recent sales using Eloquent
            $recentSales = Sale::with(['customer', 'saleItems'])
                ->where('tenant_id', $tenant->id)
                ->latest()
                ->take(5)
                ->get();

            // Get inventory status - products below reorder level
            $inventoryStatus = Product::where('tenant_id', $tenant->id)
                ->whereHas('variants', function ($query) {
                    $query->whereColumn('current_stock', '<', 'products.reorder_level');
                })
                ->count();

            $tenantData[] = [
                'tenant' => $tenant,
                'businessProgress' => $businessProgress,
                'recentSales' => $recentSales,
                'inventoryStatus' => $inventoryStatus
            ];
        }

        return view('tenant.dashboard', compact('tenantData'));
        // } catch (\Exception $e) {
        //     Log::error('Dashboard error: ' . $e->getMessage());
        //     return redirect()->back()->with('error', 'Error loading dashboard data: ' . $e->getMessage());
        // }
    }
}
