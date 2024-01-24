<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Remove foreign key constraint before making changes
        Schema::table('warehouses', function (Blueprint $table) {
            $table->dropForeign(['staff_id']);
        });

        // Remove existing records from the warehouses table
        DB::table('warehouses')->truncate();

        // Make changes to the warehouses table
        Schema::table('warehouses', function (Blueprint $table) {
            // Set the default value to null if staff_id allows null, or set it to a valid default value
            $default = $table->column('staff_id')->allows(null) ? null : 0;

            $table->unsignedBigInteger('staff_id')->default($default)->change();

            // Add foreign key constraint back
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down()
    {
        // Remove foreign key constraint before making changes
        Schema::table('warehouses', function (Blueprint $table) {
            $table->dropForeign(['staff_id']);
        });

        // Remove existing records from the warehouses table
        DB::table('warehouses')->truncate();

        // Make changes to the warehouses table in the reverse order
        Schema::table('warehouses', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->default(0)->change();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }
};


