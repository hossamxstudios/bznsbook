<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Admin permissions (guard: web)
        $adminPermissions = [
            'manage users',
            'manage clients',
            'manage subscriptions',
            'manage categories',
            'manage services',
            'manage projects',
            'manage portfolios',
            'manage reviews',
            'manage blogs',
            'manage translations',
            'manage settings',
            'view analytics',
            'manage crm',
            'manage leads',
            'manage deals',
            'manage companies',
            'manage contacts',
            'manage pipelines',
        ];

        foreach ($adminPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Client permissions (guard: client)
        $clientPermissions = [
            'create services',
            'edit own services',
            'delete own services',
            'create projects',
            'edit own projects',
            'delete own projects',
            'create portfolios',
            'edit own portfolios',
            'delete own portfolios',
            'apply to projects',
            'send demands',
            'write reviews',
            'manage own profile',
        ];

        foreach ($clientPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'client']);
        }

        // Admin roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::where('guard_name', 'web')->get());

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo([
            'manage clients',
            'manage subscriptions',
            'manage categories',
            'manage services',
            'manage projects',
            'manage portfolios',
            'manage reviews',
            'manage blogs',
            'manage translations',
            'view analytics',
        ]);

        $moderator = Role::firstOrCreate(['name' => 'moderator', 'guard_name' => 'web']);
        $moderator->givePermissionTo([
            'manage reviews',
            'manage blogs',
            'view analytics',
        ]);

        // Client roles
        $agency = Role::firstOrCreate(['name' => 'agency', 'guard_name' => 'client']);
        $agency->givePermissionTo(Permission::where('guard_name', 'client')->get());

        $freelancer = Role::firstOrCreate(['name' => 'freelancer', 'guard_name' => 'client']);
        $freelancer->givePermissionTo(Permission::where('guard_name', 'client')->get());
    }
}
