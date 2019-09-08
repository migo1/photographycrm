<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'photographer-list',
            'photographer-create',
            'photographer-edit',
            'photographer-delete'
         ];
 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
