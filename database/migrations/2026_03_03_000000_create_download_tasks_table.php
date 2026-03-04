<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('download_tasks', function (Blueprint $table) {
            $table->id();
            $table->text('source_url');
            $table->string('status', 20)->default('queued');
            $table->string('provider', 40)->default('apify');
            $table->string('provider_run_id')->nullable();
            $table->text('media_url')->nullable();
            $table->json('payload')->nullable();
            $table->text('error_message')->nullable();
            $table->string('requested_ip', 64)->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('provider_run_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('download_tasks');
    }
};
