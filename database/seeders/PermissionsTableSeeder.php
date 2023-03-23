<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'auth_profile_edit',
            ],
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'audit_log_show',
            ],
            [
                'title' => 'audit_log_access',
            ],
            [
                'title' => 'team_create',
            ],
            [
                'title' => 'team_edit',
            ],
            [
                'title' => 'team_show',
            ],
            [
                'title' => 'team_delete',
            ],
            [
                'title' => 'team_access',
            ],
            [
                'title' => 'client_create',
            ],
            [
                'title' => 'client_edit',
            ],
            [
                'title' => 'client_show',
            ],
            [
                'title' => 'client_delete',
            ],
            [
                'title' => 'client_access',
            ],
            [
                'title' => 'client_contact_create',
            ],
            [
                'title' => 'client_contact_edit',
            ],
            [
                'title' => 'client_contact_show',
            ],
            [
                'title' => 'client_contact_delete',
            ],
            [
                'title' => 'client_contact_access',
            ],
            [
                'title' => 'invoice_create',
            ],
            [
                'title' => 'invoice_edit',
            ],
            [
                'title' => 'invoice_show',
            ],
            [
                'title' => 'invoice_delete',
            ],
            [
                'title' => 'invoice_access',
            ],
            [
                'title' => 'setting_create',
            ],
            [
                'title' => 'setting_edit',
            ],
            [
                'title' => 'setting_show',
            ],
            [
                'title' => 'setting_delete',
            ],
            [
                'title' => 'setting_access',
            ]
        ];

        Permission::insert($permissions);
    }
}
