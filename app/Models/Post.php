<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    // Relacion muchos a muchos las llaves foraneas van en la tabla pibot
    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot(['featured'])
            ->withTimestamps();
    }

    // Con sync obtiene las categorias relacionadas con los posts
    public function addCategories(Category ...$categories)
    {
        $this->categories()->syncWithoutDetaching(new Collection($categories));
    }
}
