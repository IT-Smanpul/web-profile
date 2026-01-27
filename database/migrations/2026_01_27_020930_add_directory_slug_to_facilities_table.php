<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->string('directory_slug')->nullable()->after('name');
        });

        // Generate directory_slug for existing facilities
        DB::table('facilities')->get()->each(function ($facility) {
            DB::table('facilities')
                ->where('id', $facility->id)
                ->update(['directory_slug' => (string) Str::uuid()]);
        });

        // Make the column non-nullable after populating existing records
        Schema::table('facilities', function (Blueprint $table) {
            $table->string('directory_slug')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropColumn('directory_slug');
        });
    }
};
