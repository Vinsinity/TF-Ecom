<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(1)->create([
            'name' => 'Erhan Hangül',
            'email' => 'erhan@lab.com',
            'password' => bcrypt('erhan')
        ]);
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
         $this->call(ProductSeeder::class);
    }
}
