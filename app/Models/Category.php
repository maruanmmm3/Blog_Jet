<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    use HasFactory;

    //Habilitar la asignacion masiva

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName() //Para que la ruta en la Web aparesca el Slug
    {
        return 'slug';
    }

    //RELACION UNO A MUCHOS
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
