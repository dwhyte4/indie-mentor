<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Plan;

class AddFieldToTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates', function (Blueprint $table) {
            //
            $table->string('name');
            $table->integer('price');
            $table->string('description',500);
            $table->string('image');
            $table->string('pdf_doc');
            $table->foreignIdFor(Plan::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('pdf_doc');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('plan_id');
        });
    }
}
