<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index('idx_id_user_id', ['id', 'user_id']);
            $table->integer('type_id')->index('idx_id_type_id', ['id', 'type_id']);
            $table->string('title');
            $table->string('url');
            $table->string('image_url');
            $table->text('body');
            $table->string('coupon')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
