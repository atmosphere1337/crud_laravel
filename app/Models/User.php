<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable   = ['login', 'password', 'mode',];
    protected $hidden     = [ 'password' ];
    public    $timestamps = false;
    protected $casts      = [ 'password' => 'hashed' ];
    public static function register($input)
    {
        $input['mode'] = 'user';
        $user = new User($input);
        $user->save();
    }
}
