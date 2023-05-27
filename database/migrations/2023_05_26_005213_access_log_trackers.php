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
        Schema::create('access_log_trackers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained('links');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->integer('count_access')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_log_trackers');
    }
};
