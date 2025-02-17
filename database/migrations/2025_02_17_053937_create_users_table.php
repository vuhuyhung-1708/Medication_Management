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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu INT tự tăng
            $table->string('name'); // Tạo cột name với kiểu VARCHAR
            $table->date('date_of_birth'); // Tạo cột date_of_birth với kiểu DATE
            $table->string('phone_number'); // Tạo cột phone_number với kiểu VARCHAR
            $table->string('email')->unique(); // Tạo cột email với kiểu VARCHAR và đánh chỉ mục duy nhất
            $table->string('branch_address'); // Tạo cột branch_address với kiểu VARCHAR
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};