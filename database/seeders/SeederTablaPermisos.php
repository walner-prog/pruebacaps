<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// permisions 
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  aca definimos los permisos 

            $permisos =[
                 //tabla roles 
               'ver-rol',
               'crear-rol',
               'editar-rol',
               'borrar-rol',
               //tabla alertas
               'ver-alerta',
               'crear-alerta',
               'editar-alerta',
               'borrar-alerta',
                //tabla usuarios
                'ver-usuario',
                'crear-usuario',
                'editar-usuario',
                'borrar-usuario',
                //tabla ingresos-gastos
                'ver-ingresos-gastos',
                'crear-ingresos-gastos',
                'editar-ingresos-gastos',
                'borrar-ingresos-gastos',
                //tabla lecturas
                'ver-lectura',
                'crear-lectura',
                'editar-lectura',
                'borrar-lectura',
                //tabla mantenimiento
                'ver-mantenimiento',
                'crear-mantenimiento',
                'editar-mantenimiento',
                'borrar-mantenimiento',
                 //tabla registro-agua
                 'ver-registro-agua',
                 'crear-registro-agua',
                 'editar-registro-agua',
                 'borrar-registro-agua',
                  //vista dasboard
                'ver-dasboard',
                'crear-dasboard',
                'editar-dasboard',
                'borrar-dasboard',

                //vista welcome y login
                'ver-login',
                //vista register
                'ver-register',
                
                
                //tabla ingresos y tabla gastos 
                'ver-ingresoygasto',
                'crear-ingresoygasto',
                'editar-ingresoygasto',
                'borrar-ingresoygasto',
                
                //tabla facturas
                'ver-factura',
                'crear-factura',
                'editar-factura',
                'borrar-factura',
                
            ];
            foreach($permisos as $permiso){
                Permission::create(['name'=>$permiso]);
            }
    }
}
