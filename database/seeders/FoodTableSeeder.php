<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert default food items
        Food::insert([
            [
                'name' => 'Breakfast - Custard with Akara',
                'price' => 12,
                'image' => '1736006054.jpg',
                'image2' => '17360060542.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lunch - Spaghetti & Chicken',
                'price' => 18,
                'image' => '1736006126.jpg',
                'image2' => '17360061262.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agege Bread with Akara',
                'price' => 10,
                'image' => '1736006219.jpg',
                'image2' => '17360062192.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ofada Rice Deluexe',
                'price' => 16,
                'image' => '1736006277.jpg',
                'image2' => '17360062772.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beans Plantain and Fish',
                'price' => 16,
                'image' => '1736006375.jpg',
                'image2' => '17360063492.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fried Potatoes',
                'price' => 14,
                'image' => '1736006447.jpg',
                'image2' => '17360064472.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
