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
            $table->string("quantity")->nullable(false);
            $table->float("unit_price")->nullable(false);
            $table->float("total_price")->nullable(false);
            $table->float("user_paid")->nullable(false);
            $table->boolean("payment_issue")->nullable(false);
            $table->boolean("email_sent")->nullable(false);
            $table->foreignId("product_id")->constrained()->onDelete("cascade");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
