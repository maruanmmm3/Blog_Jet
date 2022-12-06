<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /* Si detorna true Pasa */
    /* Si detorna false NO Pasa */
    /* Aqui manejamos datos Boleanos */
   public function author(User $user, Post $post){ /* No editen cosas que son de otrso autores */
        if($user->id == $post->user_id){ /* Si el user Id del usuario presente es = Al user_id del Post lo pasara */
            return true;
        }else{
            return false;
        }
   }
/* El sinbolo de ? es para decir un parametro es opcional de esa manera 
    aunque no estes logiado podras ver la vista de los Post */
   public function published(?User $user, Post $post){/* No entren al Show de un Post no publicado */
    if ($post->status == 2) {
        return true;
    }else{
        return false;
    }
}
    public function __construct()
    {
        //
    }
}
