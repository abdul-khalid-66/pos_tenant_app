<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('returns', function (Blueprint $table) {
            $table->foreign(['customer_id'])->references(['id'])->on('customers')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['sale_id'])->references(['id'])->on('sales')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['tenant_id'])->references(['id'])->on('tenants')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('returns', function (Blueprint $table) {
            $table->dropForeign('returns_customer_id_foreign');
            $table->dropForeign('returns_sale_id_foreign');
            $table->dropForeign('returns_tenant_id_foreign');
            $table->dropForeign('returns_user_id_foreign');
        });
    }
};
