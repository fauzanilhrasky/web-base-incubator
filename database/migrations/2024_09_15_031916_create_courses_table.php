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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('detail');
            $table->string('image');
            $table->string('category');
            $table->unsignedBigInteger('mentor_id');
            $table->string('price');
            $table->boolean('isPaid')->default(false);
            $table->timestamps();

            // relasi
            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
