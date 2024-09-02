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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(0);
            $table->unsignedBigInteger('cust_id')->nullable();
            $table->decimal('qty')->default(0);
            $table->integer('total_price')->default(0);
            $table->date('sale_date');
            $table->string('cust_nama');
            $table->enum('status_payment', ['Lunas','Belum Lunas']);

            $table->foreign('cust_id')->references('id')->on('custemers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
