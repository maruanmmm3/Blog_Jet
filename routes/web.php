<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SolicitudController;

//ESTRUCTURA DE LA RUTA -- CONTROLADOR QUE LO ADMINISTRARA --- NOMBRE DE LA RUTA PARA MEJOR COMODIDAD
Route::get('/', [PostController::class, 'index'])->name('posts.index'); //PAGINA INICIAL

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');//VER LOS POST

Route::get('category/{category}',[PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');//Para las etiquetas

/* Rutas de Solicitudes */

Route::get('solicitudes', [SolicitudController::class, 'index'])->name('admin.solicituds.index');


/* Fin de rutas de Solicitudes */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
