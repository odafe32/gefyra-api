<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed Gefyra admin users.
     *
     * Roles:
     *   super_admin — full access (create/delete/manage)
     *   admin       — manage bookings, update statuses
     *   viewer      — read-only access
     */
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Gefyra Super Admin',
                'email'    => 'superadmin@gefyra.agency',
                'password' => Hash::make('Gefyra@Super2025!'),
                'role'     => 'super_admin',
            ],
            [
                'name'     => 'Gefyra Admin',
                'email'    => 'admin@gefyra.agency',
                'password' => Hash::make('Gefyra@Admin2025!'),
                'role'     => 'admin',
            ],
            [
                'name'     => 'Gefyra Viewer',
                'email'    => 'viewer@gefyra.agency',
                'password' => Hash::make('Gefyra@View2025!'),
                'role'     => 'viewer',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                $data
            );
        }

        $this->command->info('Gefyra admin users seeded:');
        $this->command->table(
            ['Name', 'Email', 'Role', 'Password'],
            [
                ['Gefyra Super Admin', 'superadmin@gefyra.agency', 'super_admin', 'Gefyra@Super2025!'],
                ['Gefyra Admin',       'admin@gefyra.agency',      'admin',       'Gefyra@Admin2025!'],
                ['Gefyra Viewer',      'viewer@gefyra.agency',     'viewer',      'Gefyra@View2025!'],
            ]
        );
    }
}
