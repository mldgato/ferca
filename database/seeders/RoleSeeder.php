<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Vendedor']);
        $role3 = Role::create(['name' => 'Bodeguero']);

        Permission::create(['name' => 'Dashboard'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Usuarios'])->assignRole($role1);
        Permission::create(['name' => 'Proveedores'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Proveedor'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Medidas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Bodegas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Estanterías'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Productos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Compras'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Crear compra'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Lista de compraa'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Compra'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Compra PDF'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Productos de tienda'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Tienda'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Mis ventas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Venta'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Ventas generales'])->assignRole($role1);
    }
}
