<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('download_tasks', function (Blueprint $table) {
            $table->string('local_file_path')->nullable()->after('media_url');
            $table->string('mime_type', 120)->nullable()->after('local_file_path');
            $table->unsignedBigInteger('file_size')->nullable()->after('mime_type');
        });
    }

    public function down(): void
    {
        Schema::table('download_tasks', function (Blueprint $table) {
            $table->dropColumn(['local_file_path', 'mime_type', 'file_size']);
        });
    }
};
