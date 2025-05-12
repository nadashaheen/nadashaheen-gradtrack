<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name', 'stdNo', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // العلاقات
    public function projects()
    {
        return $this->hasMany(Project::class, 'student_id');
    }

    public function supervisedProjects()
    {
        return $this->hasMany(Project::class, 'supervisor_id');
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function isSupervisor()
    {
        return $this->role === 'supervisor';
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
