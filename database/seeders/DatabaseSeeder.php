<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\catalogos\CatEntes;
use App\Models\administracion\Menu;
use App\Models\administracion\Funciones;
use App\Models\administracion\Grupo;
use DB;

class DatabaseSeeder extends Seeder
{

        protected $cat_entes = array(
            ['id' => 1, 'cve_upp' => '01', 'nombre_upp' => 'Secretaría de Administración y Finannzas', 'cve_ur' => '01', 'nombre_ur' => 'Dirección de Gobienrno Digital', 'cve_uo' => '001', 'nombre_uo' => 'Departamento de Proyectos Internos']
        );

        protected $cat_users = array(
            ['id' => 1, 'id_ente' => null, 'nombre' => 'sudo', 'p_apellido' => 'admin', 's_apellido' => 'sedj', 'celular' => '00-00-00-00-00', 'email' => 'prueba1@gmail.com', 'username' => 'administrador', 'password' => 'valida2022', 'sudo' => 1],
            ['id' => 2, 'id_ente' => 1, 'nombre' => 'Francisco', 'p_apellido' => 'Méndez', 's_apellido' => 'Chávez', 'celular' => '44-32-21-90-95', 'email' => 'pacomendez2308@gmail.com', 'username' => 'depExpedientes', 'password' => 'depExpedientes.22', 'sudo' => 0]
        );

        protected $sistemas = array(
            ['id' => 1, 'nombre_sistema' => 'Sistema de Expedientes Jurídicos','ruta' => 'sistemas', 'logo' => 'logo_expedientes.png', 'logo_min' => 'logo_expedientes_min.png', 'descripcion' => 'Sistema para la adminsitración de expedientes Jurídicos', 'estatus' => 1],
        );

        protected $menus = array(
            ['id' => 2,  'padre' => 0, 'nombre_menu' => 'Calendario', 'ruta' => '/calendario', 'icono' => 'fa-calendar', 'nivel' => 0, 'posicion' => 2, 'descripcion' => 'Módulo de calendario'],
            ['id' => 5,  'padre' => 0, 'nombre_menu' => 'Usuarios', 'ruta' => '/adm-usuarios', 'icono' => 'fa-user', 'nivel' => 0, 'posicion' => 5, 'descripcion' => 'Módulo para administrar los usuarios del sistema'],
            ['id' => 14,  'padre' => 0, 'nombre_menu' => 'Administración', 'ruta' => '#', 'icono' => 'fa-gears', 'nivel' => 0, 'posicion' => 7, 'descripcion' => 'Conjunto de módulos de adminsitración del sistema'],
            ['id' => 15,  'padre' => 14, 'nombre_menu' => 'Grupos', 'ruta' => '/adm-grupos', 'icono' => 'fa-users', 'nivel' => 1, 'posicion' => 1, 'descripcion' => 'Módulo para administrar los grupos del sistema'],
            ['id' => 16,  'padre' => 14, 'nombre_menu' => 'Bitácora', 'ruta' => '/adm-bitacora', 'icono' => 'fa-bookmark', 'nivel' => 1, 'posicion' => 2, 'descripcion' => 'Bitácora de movimientos del sistema'],
        );

        protected $funciones = array(
            ['id' => 1,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'getUsuarios', 'tipo' => 'Consulta', 'descripcion' => 'Obtener todos los usuarios de la BD'],
            ['id' => 2,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'postUsuarios', 'tipo' => 'Insercion', 'descripcion' => 'Insertar un usuario a la BD'],
            ['id' => 3,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'putUsuarios', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizar un usuario a la BD'],
            ['id' => 4,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'deleteUsuarios', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar un usuario a la BD'],
            ['id' => 5,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'viewPostUsuarios', 'tipo' => 'Vista', 'descripcion' => 'Vista create usuario'],
            ['id' => 6,  'id_menu' => 5, 'modulo' => 'Usuarios', 'funcion' => 'viewPutUsuarios', 'tipo' => 'Vista', 'descripcion' => 'Vista Update usuario'],
            ['id' => 7,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'getGrupos', 'tipo' => 'Consulta', 'descripcion' => 'Insertar un grupo a la BD'],
            ['id' => 8,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'postGrupos', 'tipo' => 'Insercion', 'descripcion' => 'Insertar un grupo a la BD'],
            ['id' => 9,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'putGrupos', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizar un grupo a la BD'],
            ['id' => 10,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'deleteGrupos', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar un grupo a la BD'],
            ['id' => 11,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'viewPostGrupos', 'tipo' => 'Vista', 'descripcion' => 'Vista create grupo'],
            ['id' => 12,  'id_menu' => 15, 'modulo' => 'Grupos', 'funcion' => 'viewPutGrupos', 'tipo' => 'Vista', 'descripcion' => 'Vista update grupo'],
            ['id' => 13,  'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'getPermisos', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de permisos'],
            ['id' => 14,  'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'postPermisos', 'tipo' => 'Insercion', 'descripcion' => 'Crear registro de permisos'],
            ['id' => 15,  'id_menu' => 15, 'modulo' => 'Permisos', 'funcion' => 'deletePermisos', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminar registro de permisos'],
            ['id' => 16,  'id_menu' => 16, 'modulo' => 'Bitacora', 'funcion' => 'getBitacora', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de registros de la bitácora'],
            ['id' => 23,  'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'getCalendario', 'tipo' => 'Consulta', 'descripcion' => 'Consulta de calendario'],
            ['id' => 24,  'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'postCalendario', 'tipo' => 'Insercion', 'descripcion' => 'Insercion de pendientes, dias inhabiles al calendario'],
            ['id' => 25,  'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'putCalendario', 'tipo' => 'Actualizacion', 'descripcion' => 'Actualizacion de pendientes, dias inhabiles al calendario'],
            ['id' => 26,  'id_menu' => 2, 'modulo' => 'Calendario', 'funcion' => 'deleteCalendario', 'tipo' => 'Eliminacion', 'descripcion' => 'Eliminacion de pendientes, dias inhabiles al calendario'],
        );

    protected $grupos = array(

        ['id' => 5, 'nombre_grupo' => 'Administrador', 'estatus' => 0],
    );



    public function run()
    {
        echo "\nInicializacion de Catalogos del Sistema";

        echo "\n    -Limpieza Anterior";
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        Menu::truncate();
        Funciones::truncate();
        CatEntes::truncate();
        DB::statement("SET foreign_key_checks=1");

        DB::beginTransaction();
        try {
            echo "\n    -Carga Catálogo Entes";
            foreach ($this->cat_entes as $ente) {
                $ente_bd = CatEntes::find($ente['id']);
                if (!$ente_bd) {
                    CatEntes::create($ente);
                } else {
                    $ente_bd->update($ente);
                    $ente_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Usuarios";
            foreach ($this->cat_users as $user) {
                $user_bd = User::find($user['id']);
                if (!$user_bd) {
                    User::create($user);
                } else {
                    $user_bd->update($user);
                    $user_bd->save();
                }
            }


            echo "\n    -Carga Catálogo Menus";
            foreach ($this->menus as $menu) {
                $menu_bd = Menu::find($menu['id']);
                if (!$menu_bd) {
                    Menu::create($menu);
                } else {
                    $menu_bd->update($menu);
                    $menu_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Funciones";
            foreach ($this->funciones as $funcion) {
                $funcion_bd = Funciones::find($funcion['id']);
                if (!$funcion_bd) {
                    Funciones::create($funcion);
                } else {
                    $funcion_bd->update($funcion);
                    $funcion_bd->save();
                }
            }

            echo "\n    -Carga Catálogo Grupos";
            foreach ($this->grupos as $grupo) {
                $grupo_bd = Grupo::find($grupo['id']);
                if (!$grupo_bd) {
                    Grupo::create($grupo);
                } else {
                    $grupo_bd->update($grupo);
                    $grupo_bd->save();
                }
            }


            DB::commit();
            echo "\n    - Se aplico con exito el Seeder - Base:\n";
        } catch (\Exception $e) {
            DB::rollback();
            echo "\n    - Ocurrio un error al ejecutar la operacion:",$e;
        }
    }
}
