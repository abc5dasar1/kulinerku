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
            'role' => 'admin',
            'password' => 123456,
        ]);
        User::factory()->create([
            'name' => 'fadiyahi',
            'email' => 'fadiyahi@gmail.com',
            'role' => 'members',
            'password' => 123456,
        ]);
        Category::create([
            'name_category' => 'Buah'
        ]);

        Wallet::create([
            'user_id' => 1,
            'credit' => 2000000,
            'debit' => 10000,
            'dsc' => 'Bayar',
            'status' => 'selesai'
        ]);
    }
}
