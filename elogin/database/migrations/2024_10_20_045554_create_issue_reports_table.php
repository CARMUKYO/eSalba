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
        Schema::create('issue_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID of the user who reported the issue
            $table->string('title'); // Title of the issue
            $table->text('description'); // Description of the issue
            $table->string('photo_path')->nullable(); // Path for uploaded photos
            $table->decimal('latitude', 10, 7); // Latitude for geolocation
            $table->decimal('longitude', 10, 7); // Longitude for geolocation
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_reports');
    }
};
