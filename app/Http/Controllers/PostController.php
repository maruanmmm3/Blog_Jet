<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->paginate(); //Latest metodo para ordenar

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        /* Policy */
        $this->authorize('published', $post);
        //Lamar al modelo Post y filtrar el registro de estos Post
        $similares = Post::where('category_id', $post->category_id) //category_id  SEA "=" $post->category_id  Actual
                            ->where('status', 2) //Solo los publicados
                            ->where('id', '!=', $post->id)//Distinto al id actual
                            ->latest('id') //Ordenar de manera desendente
                            ->take(4) //Traer solo 4
                            ->get(); //Get colexion

        return view('posts.show', compact('post','similares'));
    }

    public function category(Category $category){ //Retornar Posts de la categoria correspondiente 
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id') //Ordenar de manera desendente
                        ->paginate(6);

        return view('posts.category', compact('posts','category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2) //El posts es de la relacion Model 
                            ->latest('id')
                            ->paginate(4); 

        return view('posts.tag', compact('posts', 'tag'));
    }
}
