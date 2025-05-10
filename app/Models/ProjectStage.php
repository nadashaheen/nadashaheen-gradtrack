<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    protected $fillable = [
        'project_id', 'stage_name', 'status', 'document_path',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
    use HasFactory;
}
