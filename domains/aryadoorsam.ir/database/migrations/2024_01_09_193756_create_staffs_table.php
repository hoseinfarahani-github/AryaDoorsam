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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',125);
            $table->string('lastname',125);
            $table->unsignedBigInteger('personal_code')->nullable();
            $table->foreignId('gallery_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->timestamps();
        });

        Schema::create('certificate_staff',function (Blueprint $table) {
            $table->foreignId('staff_id')->constrained();
            $table->foreignId('certificate_id')->constrained();
            $table->primary(['staff_id','certificate_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_staff');
        Schema::dropIfExists('staff');
    }
};
