<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t1 = Tenant::create(['id' => 1, 'name' => 'tenant1']);
        $t1->domains()->create(['domain' => 'tenant1.localhost']);

        $t2 = Tenant::create(['id' => 2, 'name' => 'tenant2']);
        $t2->domains()->create(['domain' => 'tenant2.localhost']);

        $t3 = Tenant::create(['id' => 3, 'name' => 'tenant3']);
        $t3->domains()->create(['domain' => 'tenant3.localhost']);
    }
}
