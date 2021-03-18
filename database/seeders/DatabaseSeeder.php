<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin',
            'slug' => 'admin'],
            ['name' => 'lawyer',
            'slug' => 'lawyer'],
            ['name' => 'client',
            'slug' => 'client'],
        ]);

        DB::table('users')->insert([
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => '(050)5050505',
            'role_id' => 1,],
            ['name' => 'Harvey Specter',
            'email' => 'lawyer@gmail.com',
            'password' => Hash::make('demodemo'),
            'phone' => '(050)0505051',
            'role_id' => 2,],
            ['name' => 'Demo Client',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('demodemo'),
            'phone' => '(050)0505050',
            'role_id' => 3,],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'change-roles',
            'slug' => 'change-roles'],
            ['name' => 'add-cases',
            'slug' => 'add-cases'],
            ['name' => 'edit-cases',
            'slug' => 'edit-cases'],
            ['name' => 'delete-cases',
            'slug' => 'delete-cases'],
            ['name' => 'profile-modifying',
            'slug' => 'profile-modifying'],
        ]);

        DB::table('roles_permissions')->insert([
            ['role_id' => 1,
            'permission_id' => 1,],
            ['role_id' => 1,
            'permission_id' => 2,],
            ['role_id' => 1,
            'permission_id' => 3,],
            ['role_id' => 1,
            'permission_id' => 4,],
            ['role_id' => 1,
            'permission_id' => 5,],
            ['role_id' => 2,
            'permission_id' => 2,],
            ['role_id' => 2,
            'permission_id' => 3,],
            ['role_id' => 2,
            'permission_id' => 4,],
            ['role_id' => 2,
            'permission_id' => 5,],
            ['role_id' => 3,
            'permission_id' => 2,],
            ['role_id' => 3,
            'permission_id' => 5,],
        ]);

        DB::table('specializations')->insert([
            ['name' => 'criminal',
            'slug' => 'criminal'],
            ['name' => 'general civil',
            'slug' => 'civil'],
            ['name' => 'misdemeanor',
            'slug' => 'misdemeanor'],
            ['name' => 'corporate dispute',
            'slug' => 'corporate'],
            ['name' => 'merge maintenance',
            'slug' => 'merge'],
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\LegalCase::factory(20)->create();
    }
}
