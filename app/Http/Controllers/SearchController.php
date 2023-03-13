<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
           'search' => 'required|string|max:128'
        ]);
        $search = $request->search;
        $products = Product::search($search)->get();

        $categories = Category::search($search)->get();

        $result = $products->concat($categories)->paginate(20)->withQueryString();;

        return view('search.index', ['result' => $result, 'search' => $search]);
    }
}
