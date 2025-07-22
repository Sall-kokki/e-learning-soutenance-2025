<?php

// database/migrations/xxxx_xx_xx_create_course_materials_table.php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('seance_id')->nullable(); // on lie au besoin à une séance
            $table->string('title');
            $table->string('description')->nullable();
            $table->enum('type', ['video', 'pdf'])->default('pdf');
            $table->string('video_url')->nullable();  // pour les vidéos YouTube par exemple
            $table->string('file_path')->nullable();  // pour stocker le PDF
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_materials');
    }
}

