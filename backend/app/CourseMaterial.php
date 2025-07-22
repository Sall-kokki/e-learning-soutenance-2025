<?php

// app/CourseMaterial.php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $fillable = [
        'course_id',
        'seance_id',
        'title',
        'description',
        'type',
        'video_url',
        'file_path'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}

