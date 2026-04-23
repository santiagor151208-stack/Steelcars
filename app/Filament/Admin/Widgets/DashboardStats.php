<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Productos', Product::count())
                ->description('Total de repuestos')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 8, 10]),
            
            Stat::make('Categorías', Category::count())
                ->description('Tipos de repuestos')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('info')
                ->chart([2, 3, 2, 4, 3, 5, 4]),
            
            Stat::make('Marcas', Brand::count())
                ->description('Marcas de autos')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning')
                ->chart([1, 2, 1, 3, 2, 4, 3]),
            
            Stat::make('Stock Bajo', Product::where('stock', '<=', 5)->count())
                ->description('Productos con stock bajo')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger')
                ->chart([1, 1, 2, 1, 2, 3, 2]),
        ];
    }
}
