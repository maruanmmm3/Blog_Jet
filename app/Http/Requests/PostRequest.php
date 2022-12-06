<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /* Un FormRequest viene a ser una clase que icluye 2 metodos el authorize y rules */
    public function authorize()/* Sirve para que podamos limitar accesos a siertos usuarios que cumplan dicho requisito */
    {
        /* return false; */ /* Lo cambiamos a true */
        /* Agregamos este if en casos el usuario cambia el valor de id usando inspeccionar */
        /* Lo sacamos por mientras ya que en el from edit quitamos en input de id user */
        /* if($this->user_id == auth()->user()->id){ 
            return true;
        } else {
            return false;
        } */
        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()/* Aqui pondremos nuestras reglas de validacion  */
    {
        $post = $this->route()->parameter('post');//Id DEL POT si se usa en el create seria NULL

        /* Si el status es 1 solo ara este */
            $rules = [  
                'name' => 'required',
                'slug' => 'required|unique:posts',
                'status' => 'required|in:1,2', /* Tome solo datos que sean 1 o 2 */
                'file' => 'image' /* Validaciones para imagen */
            ];

            if($post){ /* Si hay la variable $post Esta regla cambiara */
                /* Esta regla es para que se pueda actualizar y no de problemas el slug */
                $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
            }

            

            /* array_merge Metodo fuciona 2 array */
            
            if($this->status == 2){/* Solo si es estatus es 2 */
                $rules = array_merge($rules, [
                    'category_id' => 'required',
                    'tags' => 'required',
                    'extract' => 'required',
                    'body' => 'required'
                ]);
            }

            return $rules;
    }
}
