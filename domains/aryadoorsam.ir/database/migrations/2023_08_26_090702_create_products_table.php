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
            $table->id();
            $table->string('name')->unique();
            $table->string('title')->unique();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('price')->unsigned()->default(0);
            $table->boolean('status')->default(1);
            $table->integer('sum_rate')->unsigned()->default(0);
            $table->integer('count_rate')->unsigned()->default(0);
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->boolean('available_shop')->default(1);
            $table->boolean('available_agent')->default(1);
         // $table->bigInteger('productable_id')->nullable(); MAYBE Later !
         // $table->string('productable_type')->nullable();   MAYBE Later !
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('gallery_product',function (Blueprint $table){
            $table->foreignId('product_id')->constrained();
            $table->foreignId('gallery_id')->constrained();
            $table->boolean('default')->default(0);
            $table->primary(['product_id','gallery_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_gallery');
        Schema::dropIfExists('products');
    }
};
