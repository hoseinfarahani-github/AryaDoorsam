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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->longText('address');
            $table->enum('status',['create-order-step-1','create-order-step-2','create-order-step-3','sent-order-agent','reject-order-CEO','approved-order-CEO','pending-order-CEO','pending-order-factory','approved-order-factory','bending-order-factory','welding-order-factory','coloring-order-factory','packing-order-factory','sent-order-factory']); //14 steps
            $table->string('tracking_serial','12')->unique();
            $table->integer('production_period')->default(0);
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->softDeletes();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->unsignedBigInteger('amount')->default(1);
            $table->longText('attribute_detail');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('order_status_log',function (Blueprint $table){
            $table->foreignId('order_id')->constrained();
            $table->enum('status',['sent-order-agent','reject-order-CEO','approved-order-CEO','approved-order-factory','bending-order-factory','welding-order-factory','coloring-order-factory','packing-order-factory','sent-order-factory']);
            $table->primary(['order_id','status']);
                $table->dateTime('created_at')->default(now());
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_status_log');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
    }
};
