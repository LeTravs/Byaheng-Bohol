<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'create_package']);
        Permission::create(['name' => 'create_vehicle']);
        Permission::create(['name' => 'create_user']);

        // Create roles
        $roleSuperAdmin = Role::create(['name' => 'superAdmin']);
        $roleSuperAdmin->givePermissionTo(['manage_users']); 
        
        $roleTourAgencyAdmin = Role::create(['name' => 'tourAgencyAdmin']);
        $roleTourAgencyAdmin->givePermissionTo(['create_package']);

        $roleTransportOperatorAdmin = Role::create(['name' => 'transportOperatorAdmin']);
        $roleTransportOperatorAdmin->givePermissionTo(['create_vehicle']);

        $roleUser = Role::create(['name' => 'user']);

        // Optionally create the `admin` role if needed
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(['manage_users']);
    }
}
