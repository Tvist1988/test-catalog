<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function createReview($id)
    {
        $product = Product::findOrFail($id);

        return view('product.review', ['product' => $product]);
    }

    public function storeReview(Request $request)
    {

        $validated = $request->validate(
            [
                'product_id' => 'required',
                'comment' => 'required|string|max:124',
                'files.*' => 'required|image|max:5000',
                'files' => 'max:3'
            ]
        );
        DB::beginTransaction();
        try {
            $review = new Review();
            $review->product_id = $request->product_id;
            $review->user_id = auth()->id();
            $review->comment = $request->comment;
            $review->save();
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                foreach ($files as $file) {
                    $path = $file->store('/public/images');
                    $image = new File();
                    $image->name = $file->getClientOriginalName();
                    $image->path = $path;
                    $image->fileable()->associate($review)->save();
                }
            }
            DB::commit();
            return redirect()->route('review.index');
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());

        }
    }

    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(10);

        return view('review.index', ['reviews' => $reviews]);
    }
}
