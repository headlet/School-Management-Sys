<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
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
    ];

    public function roles()
    {
        return $this->morphToMany(Roles::class, 'user', 'user_roles', 'user_id', 'role_id');
    }
    
    //delete role when student is deleted
    protected static function booted()
    {
        static::deleting(function ($student) {
            $student->roles()->detach();
        });
    }
}
