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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id'); // Primary key
            $table->unsignedBigInteger('camera_id'); // Foreign key column for `cameras`
            $table->foreign('camera_id') // Explicitly reference `camera_id` in `cameras` table
                ->references('camera_id') // Reference the `camera_id` column
                ->on('cameras') // In the `cameras` table
                ->onDelete('cascade'); // Cascade on delete
            $table->integer('camera_stock'); // Total number of cameras available
            $table->integer('camera_rented')->default(0); // Number of cameras currently rented out
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
