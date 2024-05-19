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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();//TODO cant 2 colum be null same time(solution in validation)
            $table->string('title')->nullable();
        });

        Schema::create('values',function (Blueprint $table){
            $table->id();
            $table->string('name')->nullable();//TODO cant 2 colum be null same time(solution in validation)
            $table->string('title')->nullable();
            $table->foreignId('attribute_id')->constrained();
        });

        Schema::create('attribute_product_value',function (Blueprint $table){
            $table->id();
            $table->foreignId('attribute_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('value_id')->constrained();
            $table->boolean('available_shop')->default(1);
            $table->boolean('available_agent')->default(1);
            $table->unique(['attribute_id','product_id','value_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
