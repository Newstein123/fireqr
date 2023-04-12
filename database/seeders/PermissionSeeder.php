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
            'create products',
            'view products',
            'edit products',
            'delete products',
            'ban products',
            'create users',
            'view users',
            'edit users',
            'delete users',
            'ban users',
            'view setting',
            'view permissions',
            'edit permissions',
            'edit general setting',
            'view general setting',
        ];

        foreach($permissions as $permission) {
            $given_permission = Permission::create(['name' => $permission]);
            $given_permission->assignRole('super-admin');
        }
    }
}
