<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Volkswagen', 'BMW', 'Mercedes-Benz'];
        
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'slug' => str()->slug($brand),
            ]);
        }
    }
}
