<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise', function (Blueprint $table) {
            $table->integer("advertise_id", true);
            $table->string("advertise_name", 100)->nullable();
            $table->string("advertise_latitude", 100)->nullable();
            $table->string("advertise_longitude", 100)->nullable();
            $table->boolean('advertise_status')->default(1)->comment('0 = Inactive, 1 = Active');
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
        Schema::dropIfExists('advertise');
    }
}
