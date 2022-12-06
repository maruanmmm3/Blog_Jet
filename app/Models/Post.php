<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //TODO LO QUE EL POST TENDRA EN SI

    /* ASIGNACION MASIVA DE GUARDED */ /* En este caso se llena con los campos que 
    queremos evitar que se llene con asignacion masiva */

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //RELACION UNO A MUCHOS INVERSA
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

     //RELACION MUCHOS A MUCHOS
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //RELACION  UNO A UNO POLIMORFICA
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}
