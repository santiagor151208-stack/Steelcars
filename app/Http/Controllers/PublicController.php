<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('featured', true)
            ->where('active', true)
            ->take(8)
            ->get();
        
        $categories = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->take(6)
            ->get();
        
        return view('home', compact('featuredProducts', 'categories'));
    }

    public function products()
    {
        $products = Product::where('active', true)->paginate(12);
        return view('products', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->where('active', true)->firstOrFail();
        return view('product-detail', compact('product'));
    }

    public function categories()
    {
        $categories = Category::withCount('products')->get();
        return view('categories', compact('categories'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->where('active', true)->paginate(12);
        return view('category-products', compact('category', 'products'));
    }

    public function brands()
    {
        $brands = Brand::all();
        return view('brands', compact('brands'));
    }

    public function brandProducts($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = Product::whereHas('cars', function($query) use ($brand) {
            $query->where('brand_id', $brand->id);
        })->paginate(12);
        
        return view('brand-products', compact('brand', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(12);
        
        return view('search-results', compact('products', 'query'));
    }
}