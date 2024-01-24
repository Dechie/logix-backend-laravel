<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Inside your migration file

    public function up(): void
    {
        DB::table('warehouses')->truncate();
        Schema::table('warehouses', function (Blueprint $table) {
            //
            $table->dropForeign(['staff_id']);

             $table->unsignedBigInteger('staff_id')->default(0)->change();


            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouses', function (Blueprint $table) {
            //
        });
    }
};
