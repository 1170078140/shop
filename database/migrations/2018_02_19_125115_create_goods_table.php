<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(0)->comment('品类ID');
            $table->string('name', 50)->default(null)->comment('商品名称');
            $table->text('des')->default(null)->comment('商品描述');
            $table->string('pic_name', 50)->default(null)->comment('图片名称');
            $table->decimal('price', 12, 2)->default(0.00)->comment('商品价格');
            $table->integer('store')->default(0)->comment('商品库存');
            $table->integer('sales_num')->default(0)->comment('商品销量');
            $table->tinyInteger('state')->default(0)->comment('0-下架,1-上架,2-缺货');
            $table->softDeletes();
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
        //
        Schema::dropIfExists('goods');
    }

}
