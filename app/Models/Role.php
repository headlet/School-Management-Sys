<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function users()
    {
        return $this->morphedByMany(User::class, 'user', 'user_roles', 'role_id', 'user_id');
    }

    public function students()
    {
        return $this->morphedByMany(Student::class, 'user', 'user_roles', 'role_id', 'user_id');
    }

    // public function teachers()
    // {
    //     return $this->morphedByMany(Teacher::class, 'user', 'user_roles', 'role_id', 'user_id');
    // }
}
