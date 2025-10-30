<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'registration',
        'phone_number',
        'photo',
        'dob',
        'doa',
        'gender',
        'class',
        'address',
        'password',
        'email',
    ];

    public function roles()
    {
        return $this->morphToMany(Role::class, 'user', 'user_roles', 'user_id', 'role_id');
    }

    //delete role when student is deleted
    protected static function booted()
    {
        static::deleting(function ($student) {
            $student->roles()->detach();
        });
    }
}
