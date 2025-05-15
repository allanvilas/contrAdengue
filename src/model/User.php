<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean'
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $appends = [
        'is_admin'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function getPassword()
    {
        return $this->attributes['password'];
    }
    public function getRole()
    {
        return $this->attributes['role'];
    }
    public function getStatus()
    {
        return $this->attributes['status'];
    }
    public function whenEmailWasVerified()
    {
        return $this->attributes['email_verified_at'];
    }

    public function getIsAdmin()
    {
        return $this->role === 'admin';
    }

    public function setUserEmailVerified()
    {
        return $this->email_verified_at = Carbon::now();
    }

    public function isEmailVerified()
    {
        return !is_null($this->email_verified_at);
    }

}
