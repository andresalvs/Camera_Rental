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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id('log_id'); // Primary key
            $table->string('action', 10); // Action column (e.g., INSERT, UPDATE, DELETE)
            $table->string('table_name', 50); // Name of the table affected
            $table->timestamp('changed_at')->useCurrent(); // Timestamp of the change
            $table->string('user_type', 50); // Role of the user making the change
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
