<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function getShop(){
        $product=Product::query()
                        ->orderBy('id','DESC')
                        ->limit(8)
                        ->paginate(6);

        return view('frontend.shop',compact('product'));
    }
    public function getByMan(){
        $product=Product::query()
                    ->orderBy('id','DESC')
                    ->join('categories','products.cate_id','=','categories.id')
                    ->select('products.*','categories.name AS category')
                    ->where('categories.name','Man')
                    ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function getByWoman(){
        $product=Product::query()
                    ->orderBy('id','DESC')
                    ->join('categories','products.cate_id','=','categories.id')
                    ->select('products.*','categories.name AS category')
                    ->where('categories.name','Woman')
                    ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function getByBoy(){
        $product=Product::query()
                    ->orderBy('id','DESC')
                    ->join('categories','products.cate_id','=','categories.id')
                    ->select('products.*','categories.name AS category')
                    ->where('categories.name','Boy')
                    ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function getByGirl(){
        $product=Product::query()
                    ->orderBy('id','DESC')
                    ->join('categories','products.cate_id','=','categories.id')
                    ->select('products.*','categories.name AS category')
                    ->where('categories.name','Girl')
                    ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function getByHighPrice(){
        $product=Product::query()
                        ->orderBy('sale_price','DESC')
                        ->limit(4)
                        ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function getByLowPrice(){
        $product=Product::query()
                        ->orderBy('sale_price','ASC')
                        ->limit(4)
                        ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
    public function promotionProduct(){
        $product=Product::query()
                        ->orderBy('id','DESC')
                        ->where('regular_price','!=',0)
                        ->paginate(6);
        return view('frontend.shop',compact('product'));
    }
}
