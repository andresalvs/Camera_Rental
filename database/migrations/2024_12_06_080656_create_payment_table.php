<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create the 'payments' table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to `users`
            $table->unsignedBigInteger('camera_id'); // Foreign key column for `cameras`
            $table->foreign('camera_id') // Add the foreign key constraint explicitly
                ->references('camera_id') // Reference `camera_id` in the `cameras` table
                ->on('cameras')
                ->onDelete('cascade');

            $table->string('camera_name');
            $table->string('camera_category');
            $table->decimal('camera_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending');
            $table->integer('days_rent');
            $table->date('rent_date');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
