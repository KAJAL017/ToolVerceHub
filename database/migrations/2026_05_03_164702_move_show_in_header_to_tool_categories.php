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
        // Add show_in_header to tool_categories
        Schema::table('tool_categories', function (Blueprint $table) {
            $table->boolean('show_in_header')->default(false)->after('is_featured');
        });
        
        // Remove show_in_header from tools
        Schema::table('tools', function (Blueprint $table) {
            $table->dropColumn('show_in_header');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back show_in_header to tools
        Schema::table('tools', function (Blueprint $table) {
            $table->boolean('show_in_header')->default(false)->after('is_free');
        });
        
        // Remove show_in_header from tool_categories
        Schema::table('tool_categories', function (Blueprint $table) {
            $table->dropColumn('show_in_header');
        });
    }
};
