<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; /* Lo encontramos en Use Basic en la pagina de SPATIE */
use Spatie\Permission\Models\Permission; /* Lo encontramos en Use Basic en la pagina de SPATIE */

class RoleSeeder extends Seeder
{
    /* Una ves instalado SPATIE  RUTA: https://spatie.be/docs/laravel-permission/v4/installation-laravel */
    /*  composer require spatie/laravel-permission   y PUBLICA SU CONFIGURACION  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" */
    /* LUEGO  php artisan migrate      y creas el Seeder     php artisan make:seeder RoleSeeder  */

    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Bloger']);

        /* El syncRoles es sacado del la pagina de SPATIE donde hay metodos para asignar roles y permisos */
        /* Emos agregado el campo 'descripcion' alli pondremos para que el usuario entienda el nombre del permiso */
        Permission::create(['name' => 'admin.home',
                            'descripcion' => 'Ver el dashboard'])->syncRoles([$role1]);//Solo Admin
                            
        Permission::create(['name' => 'bloger.entrada',
                            'descripcion' => 'Ver Dashboard Bloger'])->syncRoles([$role2]);//Crear Aqui un dashboard para solo el suario autentificado

        Permission::create(['name' => 'admin.users.index',
                            'descripcion' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'descripcion' => 'Asignar Roles'])->syncRoles([$role1]);
        /* Permission::create(['name' => 'admin.users.update',
                            'descripcion' => ''])->syncRoles([$role1]); */


        Permission::create(['name' => 'admin.categories.index',
                            'descripcion' => 'Ver Listado de Categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create',
                            'descripcion' => 'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'descripcion' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'descripcion' => 'Eliminar Categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index',
                            'descripcion' => 'Ver Listado de Etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create',
                            'descripcion' => 'Crear Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit',
                            'descripcion' => 'Editar Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy',
                            'descripcion' => 'Eliminar Etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index',
                            'descripcion' => 'Ver listado de posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create',
                            'descripcion' => 'Crear Posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit',
                            'descripcion' => 'Editar Posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'descripcion' => 'Eliminar Posts'])->syncRoles([$role1, $role2]);
    }
}
