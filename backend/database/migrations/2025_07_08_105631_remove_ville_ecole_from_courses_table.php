<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveVilleEcoleFromCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->dropColumn('place');
    });
}

public function down()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->string('ville_ecole')->nullable();
    });
}

}
