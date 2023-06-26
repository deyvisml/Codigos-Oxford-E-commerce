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
            $table->string("name")->nullable(false);
            $table->text("description")->nullable();
            $table->text("product_component_list")->nullable();
            $table->string("image")->nullable(false);
            $table->string("isbn");
            $table->string("isbn2");
            $table->string("edition");
            $table->string("format");
            $table->string("licence_length");
            $table->float("price_usd")->nullable(false);
            $table->foreignId("level_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
