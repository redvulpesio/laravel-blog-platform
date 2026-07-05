<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $default_roles = ['مدیر', 'مسئول کاربران', 'مسئول مقالات', 'ناظر', 'نویسنده'];
        foreach ($default_roles as $role) {
            Role::create(['name' => $role]);
        }

        $admin = Role::query()->where('name', 'مدیر')->firstOrFail();

        User::create([
            'name' => 'admin',
            'family' => 'user',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->roles()->attach($admin->id);

        User::factory()->count(50)->create();
    }
}
