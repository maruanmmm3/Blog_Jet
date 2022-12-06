<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest; /* Carguemos el FormRequest */
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct() /* Metodo constructor para proteger las rutas */
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    
    public function index()
    {
        return view('admin.posts.index');
    }

  
    public function create()
    {
        /* categories Este es para el select */
        $categories = Category::pluck('name', 'id');  /* pluck = Toma solo el valor de el campo name / el id es que propiedad del objeto sea la llave */

        $tags = Tag::all();/* Llamamos datos de Tag */

        return view('admin.posts.create', compact('categories', 'tags'));
    }

   
    public function store(PostRequest $request) /* Objeto de la clase PostRequest */
    {
        $post = Post::create($request->all());

        /* Para las imagenes */
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
        
            $post->image()->create([
                'url' => $url
            ]);
        }

        /* Relacion muchos a muchos taga */
        if($request->tags){ /* pregunto si estoy enviando informacion de etiquetas */
            $post->tags()->attach($request->tags);
            /* attach Siempre tomara en la tabla central el id del post actual para el post_id  */
            /* para el campo de tag_id tomara lo que esta adentro de attach */
        }

        return redirect()->route('admin.posts.edit', $post);
    }

   
    /* public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    } */

  
    public function edit(Post $post)
    {
        /* author nombre de la funcion de police que esta en PostPolicy */
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id'); 
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

  
    public function update(PostRequest $request, Post $post)
    {
        /* Policy */
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('file')) { /* Preguntamos si estamos mandando una imagen en el campo 'file' */
            $url = Storage::put('public/posts', $request->file('file'));/* Ubicacion / Ruta */

            if($post->image){ /* Si este post ya contaba con imagen */
                Storage::delete($post->image->url);/* Con esto lo eliminamos */

                $post->image->update([ /* Actualizar la url con la imagen que acabamos de subir */
                    'url' => $url
                ]);
            }else{
                $post->image->create([/* En el caso no existiera una imagen lo que aremos sera crearlo */
                    'url' => $url
                ]);
            }
        }
        /* Para las Etiquetas */
        if($request->tags){ 
            $post->tags()->sync($request->tags);/* sync ES para sincronisar los datos y que no cre duplicados */
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

 
    public function destroy(Post $post)
    {
        /* Policy */
        $this->authorize('author', $post);
        /* Despues de este sigue un PostObserver */
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'El post se elimino con éxito');
    }
}
