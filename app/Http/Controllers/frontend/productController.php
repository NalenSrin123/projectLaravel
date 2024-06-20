<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{


    public function product(Product $product){
        $relateProduct=Product::query()
                                ->orderBy('id','DESC')
                                ->limit(4)
                                ->where('id','!=',$product->id)
                                ->get();
        Product::query()->where('id',$product->id)->update(['views' => $product->views + 1]);
        return view('frontend.product',compact('product','relateProduct'));
    }
    public function buyProduct(Product $product,Request $request){
        
        if ($product->regular_price == 0) {
            $discountAmount = 0;
        } else {
            $discountAmount = $product->regular_price - $product->sale_price;
        }

        // Retrieve quantity from the request
        $quantity = $request->input('quantity');
        $quantity = max($quantity, 1); // Ensure quantity is at least 1

        // Calculate total payment
        $totalPayment = $product->sale_price * $quantity;

        // Pass data to the view
        return view('frontend.buyProduct', compact('product', 'discountAmount', 'quantity', 'totalPayment'));

    }
    public function buyProductSubmit(Product $product){
        $id=$product->id;

        return redirect('/buy-product/'.$id)->with('message','Buy product success');
    }

    public function searchProduct(Request $request)
    {
        // Get the search term from the query string
        $search = $request->input('search');

        // Perform search query
        $products = Product::where('proName', 'like', '%'.$search.'%')
                           ->orWhere('description', 'like', '%'.$search.'%')
                           ->get();

        // Pass the results to a view
        return view('frontend.search', compact('products', 'search'));
    }

}
