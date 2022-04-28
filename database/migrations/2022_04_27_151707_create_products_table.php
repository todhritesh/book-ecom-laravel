<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("pro_title");
            $table->float("pro_price");
            $table->float("pro_discount_price");
            $table->string("pro_isbn");
            $table->string("pro_pages");
            $table->string("pro_author");
            $table->string("pro_publisher");
            $table->string("pro_language");
            $table->string("pro_edition");
            $table->string("pro_qty");
            $table->string("pro_image");
            $table->string("pro_image1")->nullable();
            $table->string("pro_image2")->nullable();
            $table->string("pro_image3")->nullable();
            $table->string("pro_image4")->nullable();
            $table->text("pro_description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
