<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchitectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architects', function (Blueprint $table) {

			# Incremental Primary Key
			$table->increments('id');

			# This generates two columns: `created_at` and `updated_at` to
			# keep track of changes to a row
			$table->timestamps();

			# Table specific fields
			$table->string('user_id');
			$table->string('password');
			
			# Foreign keys
			
			# Log fields

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('architects');
    }
}
