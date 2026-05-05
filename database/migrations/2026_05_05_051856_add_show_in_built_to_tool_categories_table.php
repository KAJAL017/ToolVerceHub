<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tool_categories', function (Blueprint $table) {
            $table->boolean('show_in_built')->default(false)->after('show_in_home');
        });
    }

    public function down(): void
    {
        Schema::table('tool_categories', function (Blueprint $table) {
            $table->dropColumn('show_in_built');
        });
    }
};
