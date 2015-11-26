<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_locations', function (Blueprint $table) {
			
			# Incremental Primary Key
			$table->increments('id');

			# This generates two columns: `created_at` and `updated_at` to
			# keep track of changes to a row
			$table->timestamps();
			
			# Table Specific Fields

			# Foreign Keys
			$table->integer('event')->unsigned();
			$table->integer('location')->unsigned();
			
			$table->foreign('event')->references('id')->on('events');
			$table->foreign('location')->references('id')->on('locations');
			
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
        Schema::drop('events_locations');
    }
}
