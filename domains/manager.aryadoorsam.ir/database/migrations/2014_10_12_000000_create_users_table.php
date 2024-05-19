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
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->boolean('super')->default(0);
            $table->boolean('staff')->default(0);
            $table->foreignId('agent_id')->nullable()->constrained();
            //TODO helpers for sex,0 is woman,1 is man
            $table->boolean('sex')->nullable();
            $table->foreignId('gallery_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
