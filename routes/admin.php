<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Category;
//Consejo ->para porteger una ruta debemos agregarle un 'middleware'
//Mostrar ruta: php artisan r:l --name=admin.categories
//Multiple rutas / 'names' Nombre como enpesara estas rutas / 

//Crear Controller con rutas para CRUD :  php artisan make:controller Admin/CategoryController -r
//Protegiendo una ruta
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home'); //Ruta Admin - el '' Esta en la Parte de RouteServiceProvider prefix('admin')

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users'); //Ruta para usuarios / only Para que solo genere esas rutas

Route::resource('roles', RoleController::class)->names('admin.roles');
/* El except Es para que no genere esa ruta de show que no estamos usando */
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories'); //Ruta Categorias

Route::resource('tags', TagController::class)->except('show')->names('admin.tags'); //Ruta de Etiquetas

Route::resource('posts', PostController::class)->except('show')->names('admin.posts'); //Rutas para el Post
