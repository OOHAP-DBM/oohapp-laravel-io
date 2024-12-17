<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_pan_number', 20)->after('business_name')->nullable(false);
            $table->string('business_gst_number', 20)->after('business_pan_number')->nullable(false);
            $table->string('business_address', 191)->after('business_gst_number')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['business_pan_number', 'business_gst_number', 'business_address']);
        });
    }
}
