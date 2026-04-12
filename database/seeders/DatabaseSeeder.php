<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cridem al seeder d'usuaris que hem creat anteriorment
        $this->call(UserTableSeeder::class);

        // També hem de mantenir els seeders de categories i productes que ja teníem
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
