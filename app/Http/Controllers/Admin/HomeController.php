<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        $users = User::all()->count();
        $postspublic = Post::where('status',2)->count();
        $postseraser = Post::where('status',1)->count();

        $categoriesNombre = Category::pluck('name');
        $categoriesID = Category::pluck('id');
        foreach($categoriesID as $category){
            $postR[] = Post::where('category_id', $category)->count();
        }



        /* return [$users,$postspublic, $postseraser]; */
        /* return $categories; */
        return view('admin.index', compact('users','postspublic','postseraser','categoriesNombre','postR')); 
    }
    //1-Post publicados y borador en grafico de pastel
    //2-Post por Categorias cantidad por cada Categoria
    //3-

    public function bloger(){
        return view('users.index');
    }
} 
