<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('timelines', function (Blueprint $table) {
			
			# Incremental Primary Key
			$table->increments('id');

			# This generates two columns: `created_at` and `updated_at` to
			# keep track of changes to a row
			$table->timestamps();

			# Table specific fields
			$table->string('name');
			$table->text('description');
			
			# Foreign Keys
			$table->integer('user_id')->unsigned();
			
			# Log Fields
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
        Schema::drop('timelines');
    }
}
