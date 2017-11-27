<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index('idx_id_user_id', ['id', 'user_id']);
            $table->integer('marketplace_id')->unsigned()->index('idx_id_marketplace_id', ['id', 'marketplace_id']);
            $table->integer('type_id')->unsigned()->index('idx_id_type_id', ['id', 'type_id']);
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->text('categories');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('archive')->default(0)->index('idx_id_archive', ['id', 'archive']);
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
        Schema::dropIfExists('banner_ads');
    }
}
