<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Tenant;
use App\Models\Business;
use Illuminate\Support\Facades\Hash;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Role::create(['name' => "super-admin"]);
        Role::create(['name' => "admin"]);
        Role::create(['name' => "seller"]);
        Role::create(['name' => "user"]);

        $tenant = Tenant::create(['id' => 1, 'name' => 'tenant3']);
        $tenant->domains()->create(['domain' => 'tenant3.localhost']);

        $user = User::create([
            'name' => 'mdautos',
            'email' => 'mdautos@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => null,
            'tenant_id' => $tenant->id,
        ]);

        $user->assignRole("super-admin");




        PaymentMethod::create([
            'tenant_id' => $tenant->id,
            'name' => 'Cash',
            'code' => 'CASH',
            'type' => 'cash',
            'is_active' => true,
            'settings' => null
        ]);

        PaymentMethod::create([
            'tenant_id' => $tenant->id,
            'name' => 'Bank Transfer',
            'code' => 'BANK',
            'type' => 'bank',
            'is_active' => true,
            'settings' => null
        ]);
    }
}
