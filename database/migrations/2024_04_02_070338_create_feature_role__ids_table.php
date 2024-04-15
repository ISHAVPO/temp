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
        Schema::create('feature_role__ids', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id')->references('id')->on('feature');
            $table->foreign('role_id')->references('id')->on('role_ids');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_role__ids');
    }
};
