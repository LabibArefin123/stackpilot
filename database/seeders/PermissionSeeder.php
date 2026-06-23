<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Profile
            'dashboard',
            'dashboard.system',

            'user_profile_show',
            'user_profile_edit',
            'user_profile_update',

            // Permissions & Roles
            'permissions.index',
            'permissions.create',
            'permissions.store',
            'permissions.edit',
            'permissions.update',
            'permissions.destroy',
            'permissions.deleteSelected',

            'roles.index',
            'roles.create',
            'roles.store',
            'roles.edit',
            'roles.update',
            'roles.destroy',

            // Users & Settings
            'system_users.index',
            'system_users.create',
            'system_users.store',
            'system_users.show',
            'system_users.edit',
            'system_users.update',
            'system_users.destroy',
            'system_users.password.update',
            
            // BAN USER
            'ban_users.index',
            'ban_users.create',
            'ban_users.store',
            'ban_users.show',
            'ban_users.edit',
            'ban_users.update', 
            'ban_users.destroy',

            // SYSTEM PROBLEM
            'system_problems.index',
            'system_problems.show',

            // SETTING MODULE
            'settings.index',
            'settings.password_policy',
            'settings.2fa',
            'settings.toggle2fa',
            'settings.2fa.resend',
            'settings.2fa.vefiry',
            'settings.timeout',
            'settings.timeout.update',
            'settings.database.backup',
            'settings.database.backup.download',
            'settings.logs',
            'settings.clearLogs',
            'settings.maintenance',
            'settings.maintenance.update',
            'settings.language',
            'settings.language.update',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Assign all permissions to 'admin' role
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions(Permission::all());
    }
}
