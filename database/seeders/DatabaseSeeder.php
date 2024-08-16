<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\SpecialRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['title' => 'admin']);
        Role::create(['title' => 'teacher']);

        SpecialRole::create(['title' => 'dean']);
        SpecialRole::create(['title' => 'chairman']);

        $teacherRoleId = Role::where('title', 'teacher')->first()->id;
        $adminRoleId = Role::where('title', 'admin')->first()->id;

        $deanRoleId = SpecialRole::where('title', 'dean')->first()->id;
        $chairmanRoleId = SpecialRole::where('title', 'chairman')->first()->id;

        $teacher = User::create([
            'fullname' => 'Teacher Name 1',
            'email' => 't1@example.com',
            'contact_number' => '123456789',
            'password' => Hash::make('password'),
            'role_id' => $teacherRoleId,
        ]);

        $admin = User::create([
            'fullname' => 'Admin Name 1',
            'email' => 'admin@example.com',
            'contact_number' => '123456789',
            'password' => Hash::make('password'),
            'role_id' => $adminRoleId,
        ]);

        // Attach special roles
        $teacher->specialRoles()->attach([$deanRoleId, $chairmanRoleId]);
    }
}
