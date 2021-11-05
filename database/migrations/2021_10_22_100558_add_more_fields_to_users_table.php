<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email')->nullable()->change();
            $table->string('artistname')->nullable();
            $table->string('firstlineaddress')->nullable();
            $table->string('secondlineaddress')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode')->nullable();
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
            //
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('email');
            $table->dropColumn('artistname');
            $table->dropColumn('firstlineaddress');
            $table->dropColumn('secondlineaddress');
            $table->dropColumn('city');
            $table->dropColumn('county');
            $table->dropColumn('postcode');
        });
    }
}
