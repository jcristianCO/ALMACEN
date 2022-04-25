<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permisosAll extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            
            'boleta-list',
'boleta-create',
'boleta-edit',
'boleta-delete',
'boleta-acta',
'boleta-boleta',
'boleta-detalle',
'entrada-list',
'entrada-create',
'entrada-edit',
'entrada-delete',
'entrada-detalle',
'inventario-list',
'almacen-list',
'almacen-create',
'almacen-edit',
'almacen-delete',
'sigma-list',
'sigma-create',
'sigma-edit',
'sigma-delete',
'proveedor-list',
'proveedor-create',
'proveedor-edit',
'proveedor-delete',
'ue-list',
'ue-create',
'ue-edit',
'ue-delete',
'reporte-list',
'boleta-refrescar',

          

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }

    }
}
