<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_location', function (Blueprint $table) {
			
			# Incremental Primary Key
			$table->increments('id');

			# This generates two columns: `created_at` and `updated_at` to
			# keep track of changes to a row
			$table->timestamps();
			
			# Table Specific Fields

			# Foreign Keys
			$table->integer('event_id')->unsigned();
			$table->integer('location_id')->unsigned();
			
			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('location_id')->references('id')->on('locations');
			
			# Log fields
			$table->integer('created_by');
			$table->integer('last_modified_by');
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_location');
    }
}
