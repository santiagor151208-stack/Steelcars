<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Car;
use Illuminate\Console\Command;

class SeedSteelCarsData extends Command
{
    protected $signature = 'seed:steelcars';
    protected $description = 'Seed initial data for SteelCars store';

    public function handle()
    {
        $this->info('Seeding SteelCars data...');

        // Crear categorías
        $categories = [
            ['name' => 'Motores', 'slug' => 'motores', 'description' => 'Repuestos para motores'],
            ['name' => 'Frenos', 'slug' => 'frenos', 'description' => 'Sistemas de frenos y repuestos'],
            ['name' => 'Suspensión', 'slug' => 'suspension', 'description' => 'Sistemas de suspensión'],
            ['name' => 'Transmisión', 'slug' => 'transmision', 'description' => 'Cajas de cambio y transmisión'],
            ['name' => 'Sistema Eléctrico', 'slug' => 'sistema-electrico', 'description' => 'Componentes eléctricos'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
        $this->info('✓ Categorías creadas: ' . Category::count());

        // Crear marcas
        $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz'];
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'slug' => \Illuminate\Support\Str::slug($brand),
            ]);
        }
        $this->info('✓ Marcas creadas: ' . Brand::count());

        // Crear productos
        $products = [
            ['name' => 'Filtro de Aceite', 'slug' => 'filtro-de-aceite', 'description' => 'Filtro de aceite de alta calidad', 'price' => 25.99, 'sku' => 'FIL-001', 'stock' => 100, 'category_id' => 1, 'featured' => true],
            ['name' => 'Pastillas de Freno', 'slug' => 'pastillas-de-freno', 'description' => 'Pastillas de freno cerámicas', 'price' => 45.99, 'sale_price' => 39.99, 'sku' => 'FRN-001', 'stock' => 50, 'category_id' => 2, 'featured' => true],
            ['name' => 'Amortiguadores', 'slug' => 'amortiguadores', 'description' => 'Amortiguadores de gas', 'price' => 89.99, 'sku' => 'SUS-001', 'stock' => 30, 'category_id' => 3, 'featured' => true],
            ['name' => 'Batería 12V', 'slug' => 'bateria-12v', 'description' => 'Batería de 12V para auto', 'price' => 120.00, 'sale_price' => 99.99, 'sku' => 'ELE-001', 'stock' => 20, 'category_id' => 5, 'featured' => true],
            ['name' => 'Aceite 5W30', 'slug' => 'aceite-5w30', 'description' => 'Aceite sintético 5W30', 'price' => 35.99, 'sku' => 'MOT-001', 'stock' => 200, 'category_id' => 1, 'featured' => true],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
        $this->info('✓ Productos creados: ' . Product::count());

        // Crear autos
        $cars = [
            ['brand_id' => 1, 'model' => 'Corolla', 'year_start' => 2015, 'year_end' => 2020],
            ['brand_id' => 1, 'model' => 'Camry', 'year_start' => 2016, 'year_end' => 2021],
            ['brand_id' => 2, 'model' => 'Civic', 'year_start' => 2017, 'year_end' => 2022],
            ['brand_id' => 2, 'model' => 'CR-V', 'year_start' => 2015, 'year_end' => 2020],
            ['brand_id' => 3, 'model' => 'F-150', 'year_start' => 2010, 'year_end' => 2019],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
        $this->info('✓ Autos creados: ' . Car::count());

        $this->info('🎉 ¡Datos iniciales creados exitosamente!');
    }
}
