<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'edit products',
            'view products',
            'delete products',
            'ban products',
            'create products',
            'view users',
            'edit users',
            'delete users',
            'ban users',
            'create users',
            'create permissions',
            'view permissions',
            'edit permissions',
            'view setting',
        ];

        foreach($permissions as $permission) {
            $given_permission = Permission::create(['name' => $permission]);
            $given_permission->assignRole('super-admin');
        }
    }
}
