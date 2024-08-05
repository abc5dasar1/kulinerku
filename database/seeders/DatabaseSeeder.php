<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
            'name' => 'fadiyah',
            'email' => 'fadiyah@gmail.com',
            'password' => 123456
        ]);
        Category::create([
            'name_category' => 'Buah'
        ]);

        Product::create([
            'name' => 'Mangga',
            'price' => 12000,
            'photo' => '',
            'dsc' => 'Ini Mangga'
        ]);
    }
}
