<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name',90)->default('')->comment('行业名称');
            $table->string('keywords',255)->default('')->commnet('关键词');
            $table->string('cat_desc',255)->default('')->commnet('描述');
            $table->unsignedSmallInteger('parent_id')->default(0)->index()->commnet('父id');
            $table->unsignedTinyInteger('sort_order')->default(50);
            $table->string('template_file',50)->default('');
            $table->string('measure_unit',15)->default('');
            $table->tinyInteger('show_in_nav')->default(0);
            $table->string('style',150)->default('');
            $table->unsignedTinyInteger('is_show')->default(1);
            $table->tinyInteger('grade')->default(0);
            $table->string('filter_attr',255)->default(0);
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
        Schema::dropIfExists('category');
    }
}
