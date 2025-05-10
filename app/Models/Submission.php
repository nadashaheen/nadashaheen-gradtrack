<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'project_id', 'stage_id', 'student_id', 'file_path', 'submitted_at',
    ];

    // العلاقات
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function stage()
    {
        return $this->belongsTo(ProjectStage::class, 'stage_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    use HasFactory;
}
