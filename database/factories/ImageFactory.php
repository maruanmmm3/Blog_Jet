<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Image::class;
    public function definition()
    {
        
        //Las imagenes deben de lograr subirse a Storage-App-Public
        //Para eso vamos a confing -> filesystems -> y Cambiamos de "local" a "public"
        //Coneso lograriamos que todas las imagenes se suban a  = storage-app-public
        //Recordar que para mostrar la imagen deves cambiar el dominio de la URl con la que estes trabajando "env."
        

        //DARA UN ERROR SI NO LO DICES QUE CREE LA CARPETA , 
        //YA QUE NO ENCONTRARA LA RUTA SI LA CARPETA NO EXISTE

        return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
        ];

        //Uvo un error y se tuvo que aplicar lo siguiente
        /* Abre el siguiente archivo: vendor\fakerphp\faker\src\Faker\Provider\Image.php y reemplaza las siguientes líneas de código:  

        public const BASE_URL = 'https://placehold.jp';  // cambie la URL

        curl_setopt($ch, CURLOPT_FILE, $fp); //línea existente 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//nueva línea 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//nueva línea 
        $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;//línea existente */
    }
}
