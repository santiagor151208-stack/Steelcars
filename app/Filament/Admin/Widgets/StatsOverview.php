<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Productos', Product::count())
                ->description('Total de repuestos')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),
            Stat::make('Categorías', Category::count())
                ->description('Tipos de repuestos')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('info'),
            Stat::make('Marcas', Brand::count())
                ->description('Marcas de autos')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),
            Stat::make('Stock Bajo', Product::where('stock', '<=', 5)->count())
                ->description('Productos con stock bajo')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),
        ];
    }
}