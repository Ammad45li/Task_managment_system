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
        Schema::create('assing_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('email');
            $table->enum('status', ['To Do', 'In progress', 'Completed'])->default('To Do');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assing_tasks');
    }
};
