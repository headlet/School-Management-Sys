<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'Address',
        'gender',
        'DOB',
        'photo'
    ];


    public function roles()
    {
        return $this->morphToMany(Role::class, 'user', 'user_roles', 'user_id', 'role_id');
    }

    //delete role when teracher is deleted
    protected static function booted()
    {
        static::deleting(function ($teacher) {
            $teacher->roles()->detach();
        });
    }
}
