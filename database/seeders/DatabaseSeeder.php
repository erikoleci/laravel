<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'), // password test
            'account_id' => 'admin',
        ]);

        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->assignRole($role);

        // Demo regular customer (regular 'web' guard user, no special role)
        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'Klienti Demo',
                'password' => Hash::make('12345678'),
                'account_id' => 'bull_bear',
            ]
        );
    }
}
