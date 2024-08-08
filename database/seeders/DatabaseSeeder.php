<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => '1',
            'password' => 123456,
        ]);
        User::factory()->create([
            'name' => 'fadiyahi',
            'email' => 'fadiyahi@gmail.com',
            'type' => '0',
            'password' => 123456,
        ]);
        Category::create([
            'name_category' => 'Buah'
        ]);

    }
}
