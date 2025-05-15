<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'supervisor_id',
        'title',
        'pdf_file',
    ];

    // العلاقة مع الطالب
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // العلاقة مع المشرف
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
