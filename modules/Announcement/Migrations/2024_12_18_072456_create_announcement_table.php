<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_announcements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->string('user_type',50)->nullable();
            $table->string('only_for_user')->nullable();
            $table->string('status',50)->nullable();
            $table->dateTime('date')->nullable();
            $table->string('via')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
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
        Schema::dropIfExists('bravo_announcements');
    }
}
