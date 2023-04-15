<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(200)->create();
        
        \App\Models\Product::factory(10)->create();
        
        for($i = 1; $i <= 10; $i++){
            \App\Models\Rating::factory(100)->create([
                'product_id' => $i,
            ]);
        }
    }
}
