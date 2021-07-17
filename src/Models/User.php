<?php


namespace StanDev\Laraplate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use StanDev\Laraplate\Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = [];
    protected $table = 'users';

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
