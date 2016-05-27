<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePasswordFieldOnStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * migration only alter password field from 40 to 255 to accepr bcrypt password length
     * update default staff password
     * swap coordenates in address table location field to correct format
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function ($table) {
            $table->string('password', 255)->change();
            $affected = DB::update('update staff set password = ? ', [bcrypt('111111')]);
            $affected = DB::update('update address set location = point(ST_y(location), ST_x(location))');                                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function ($table) {
            $table->string('password', 40)->change();
            $affected = DB::update('update address set location = point(ST_y(location), ST_x(location))');
        });
    }
}
