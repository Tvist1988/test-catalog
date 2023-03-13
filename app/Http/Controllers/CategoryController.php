<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function popular()
    {
        $categories = DB::table('products')
            ->select('products.category_id', 'categories.name', DB::raw('COUNT(reviews.product_id) as count_review'))
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->groupBy('categories.name')
            ->orderBy('count_review', 'desc')->take(5)->get();

        return view('category.popular', ['categories' => $categories]);
    }
}
