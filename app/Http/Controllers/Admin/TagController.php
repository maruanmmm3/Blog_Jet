<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct() /* Metodo constructor para proteger las rutas */
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];
        
        return view('admin.tags.create', compact('colors'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La Etiqueta se creo con exito');
    }

   
   /*  public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    } */

    
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

  
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id", //Para que ipnore su slug de la Categoria que queremosmodificar
            'color' => 'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La Etiqueta se actualizo con exito');
    }

 
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La Etiqueta se elimino con exito');
    }
}
