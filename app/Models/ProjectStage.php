<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    protected $fillable = [
        'project_id', 'name', 'status', 'document_path',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'stage_id');
    }
    use HasFactory;
}
