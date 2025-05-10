<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title', 'description', 'student_id', 'supervisor_id', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function stages()
    {
        return $this->hasMany(ProjectStage::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    use HasFactory;

}
