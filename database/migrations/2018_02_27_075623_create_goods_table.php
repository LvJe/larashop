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
            $table->increments('goods_id');
            $table->unsignedSmallInteger('cat_id')->default(0);
            $table->string('goods_sn',60)->default('');
            $table->string('goods_name',120)->default('');
            $table->string('goods_name_style',60)->default('+');
            $table->unsignedInteger('click_count')->default(0);
            $table->unsignedSmallInteger('brand_id')->default(0);
            $table->string('provider_name',100)->default('');
            $table->unsignedMediumInteger('goods_number')->default(0);
            $table->unsignedDecimal('goods_weight',10,3)->default(0.000);
            $table->unsignedDecimal('market_price',10,2)->default(0.00);
            $table->unsignedSmallInteger('virtual_sales')->default(0);
            $table->unsignedDecimal('shop_price',10,2)->default(0.00);
            $table->unsignedDecimal('promote_price',10,2)->default(0.00);
            $table->unsignedInteger('promote_start_date')->default(0);
            $table->unsignedInteger('promote_end_date')->default(0);
            $table->unsignedTinyInteger('warn_number')->default(0);
            $table->string('keywords',255)->default('');
            $table->string('goods_brief',255)->default('');
            $table->text('goods_desc');
            $table->string('goods_thumb',255)->default('');
            $table->string('goods_img',255)->default('');
            $table->string('original_img',255)->default('');
            $table->unsignedTinyInteger('is_real')->default(0);
            $table->string('extension_code',30)->default('');
            $table->unsignedTinyInteger('is_on_sale')->default(1);
            $table->unsignedTinyInteger('is_alone_sale')->default(1);
            $table->unsignedTinyInteger('is_shipping')->default(1);
            $table->unsignedInteger('integral')->default(0);
            $table->unsignedInteger('add_time')->default(0);
            $table->unsignedSmallInteger('sort_order')->default(100);
            $table->unsignedTinyInteger('is_delete')->default(0);
            $table->unsignedTinyInteger('is_best')->default(0);
            $table->unsignedTinyInteger('is_new')->default(0);
            $table->unsignedTinyInteger('is_hot')->default(0);
            $table->unsignedTinyInteger('is_promote')->default(0);
            $table->unsignedTinyInteger('bonus_type_id')->default(0);
            $table->unsignedInteger('last_update')->default(0);
            $table->unsignedSmallInteger('goods_type')->default(0);
            $table->string('seller_note',255)->default('');
            $table->integer('give_integral')->default(-1);
            $table->integer('rank_integral')->default(-1);
            $table->unsignedSmallInteger('suppliers_id')->nullable();
            $table->unsignedTinyInteger('is_check')->nullable();

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
        Schema::dropIfExists('goods');
    }
}
