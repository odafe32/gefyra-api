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
                'email'    => 'josephine@gefyra.agency',
                'password' => Hash::make('Gefyra@Super2026!'),
                'role'     => 'super_admin',
            ],
            [
                'name'     => 'Gefyra Admin',
                'email'    => 'info@gefyra.agency',
                'password' => Hash::make('Gefyra@Admin2026!'),
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
            ['Name', 'Email', 'Role'],
            array_map(fn($u) => [$u['name'], $u['email'], $u['role']], $users)
        );
    }
}
