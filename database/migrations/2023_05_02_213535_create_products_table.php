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
        Schema::create('products', function (Blueprint $table) {
          $table->uuid('id')->primary();
          $table->string('name');
          $table->text('description')->nullable();
          $table->string('location')->nullable();
          $table->enum('check', ['Entrada', 'Saída'])->default('Entrada');
          $table->timestamps();
          $table->string('hold_reason')->nullable();
          $table->string('code');
          $table->string('image')->nullable();
          $table->string('storage_time');
          $table->integer('priority')->nullable();
          $table->string('acquired_from')->nullable();
          $table->datetime('acquire_date')->nullable();
          $table->string('warranty_term')->nullable();
          $table->string('receipt_link')->nullable();

          $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
