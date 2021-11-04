<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];
    
    public function isAdmin()
    {
        return $this->is_admin;
    }

    // Relacion un usuario con un perfil (one to one)
    // Utiliza la funcion profile para obtener los datos de UserProfile
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    // Asume que User de la class va a traer como user_id, se creo la llave foranea con
    // otro nombre poner como segunda instancia la llave foranea
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
