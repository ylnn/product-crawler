<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('variant_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('title');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('requires_shipping')->default(false);
            $table->boolean('taxable')->default(false);
            $table->string('featured_image')->nullable();
            $table->boolean('available')->default(false);
            $table->decimal('price',8,2)->nullable();
            $table->integer('grams')->default(0);
            $table->integer('position')->default(0);
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
        Schema::dropIfExists('variants');
    }
}
