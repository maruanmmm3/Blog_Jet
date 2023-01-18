<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
   /* Antes del Create */
    public function creating(Post $post)
    {
        /* El if esta ya que si ejecutamos desde la consola en el factory creara el Post y al no 
            encontrar a nadie autentificado marcara error por eso el if */
        
        if (! \App::runningInConsole()){/* Lo ipnorara si lo ejecutamos desde la consola  */
            /* Cada ves que se cre un nuevo post al campo user_id se le asiganara un valor */
            $post->user_id = auth()->user()->id;
                        /* Propiedad que le vamos a asignar */
        }
        
                            
    }

    
    /* No vasta con crear este Observer tenemos que registrarlo
       Lo registramos en: Providers->EventServiceProvider 
       indicando el Modelo y el Observer y en el metodo boot registrarlo */
       
/* Antes del Delete */
    public function deleting(Post $post)
    {
        /* Este Deleting se ejecutara antes del Delete */
        if ($post->image){
            Storage::delete($post->image->url);
        }
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
