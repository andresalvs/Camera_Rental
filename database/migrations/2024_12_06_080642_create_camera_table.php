<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create the 'cameras' table
        Schema::create('cameras', function (Blueprint $table) {
            $table->id('camera_id'); // Primary key
            $table->string('camera_image')->nullable(); // Add column for camera image path
            $table->string('camera_name');
            $table->decimal('camera_price', 10, 2);
            $table->string('camera_category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cameras');
    }
};
