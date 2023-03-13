<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\File;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        return view('product.index', ['products' => $products]);
    }

    public function favorite(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        try {
            $favorite = Favorite::where(['product_id' => $request->id, 'user_id' => auth()->id()])->firstOrFail();
            return response('Этот товар уже в избранном', 419);
        } catch (ModelNotFoundException $e)
        {
            $favorite = new Favorite();
            $favorite->user_id = auth()->id();
            $favorite->product_id = $request->id;
            $favorite->save();
            return response('работает');
        }
    }


}
