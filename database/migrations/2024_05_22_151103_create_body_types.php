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
        Schema::create('body_types', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('create_by_user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('name_kh')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->nullable()->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_types');
    }
};
