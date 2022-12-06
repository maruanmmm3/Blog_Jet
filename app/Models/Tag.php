<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName() //Para que la ruta en la Web aparesca el Slug
    {
        return 'slug';
    }

    //RELACION MUCHOS A MUCHOS
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
