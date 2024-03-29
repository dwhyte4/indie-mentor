<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Plan;
use App\Models\Template;

class CreatePlanTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_template', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Template::class);
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
        // Schema::dropIfExists('plan__templates');
        // $table->dropColumn('plan_id');
        // $table->dropColumn('template_id');

        Schema::table('plan__templates', function (Blueprint $table) {
            $table->dropColumn('plan_id');
            $table->dropColumn('template_id');
        });
    }
}
