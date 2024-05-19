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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('county_id')->constrained();
            $table->string('postal_code',10)->nullable();
            $table->string('phone');
            $table->text('detail');
            $table->bigInteger('addressable_id')->unsigned()->nullable();
            $table->string('addressable_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
