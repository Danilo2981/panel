<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'website',
        'bio',
        'twitter'
    ];

    // Relacion inversa de uno a uno de user con UserProfile
    // UserProfile belongsTo User

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
