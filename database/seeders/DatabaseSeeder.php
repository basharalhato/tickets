<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        Ticket::factory(100)
            ->recycle($users)
            ->create();

        User::create([
            'name' => 'The Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password'),
            'is_manager' => true,
        ]);
    }
}
