<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('device_id')->nullable();
            $table->text('device_damaged')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('technicians_id');
            $table->text('result')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('required_date')->nullable();
            $table->dateTime('success_date')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->string('image_device_damaged')->nullable();
            $table->string('image_result')->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}
