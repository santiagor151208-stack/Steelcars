<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Motores', 'slug' => 'motores', 'icon' => 'engine'],
            ['name' => 'Frenos', 'slug' => 'frenos', 'icon' => 'brakes'],
            ['name' => 'Suspensión', 'slug' => 'suspension', 'icon' => 'suspension'],
            ['name' => 'Transmisión', 'slug' => 'transmision', 'icon' => 'transmission'],
            ['name' => 'Sistema Eléctrico', 'slug' => 'sistema-electrico', 'icon' => 'electrical'],
            ['name' => 'Llantas y Rines', 'slug' => 'llantas', 'icon' => 'tires'],
            ['name' => 'Filtros', 'slug' => 'filtros', 'icon' => 'filters'],
            ['name' => 'Luces', 'slug' => 'luces', 'icon' => 'lights'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
