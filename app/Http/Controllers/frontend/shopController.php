<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function getShop(Request $request){
        $allProduct=Product::query();
        if($request->cate){
            $allProduct->where('cate_id','=',$request->cate);
        }elseif($request->price){
            if($request->price =='max'){
                $allProduct->orderBy('sale_price','DESC');
            }else{
                $allProduct->orderBy('sale_price','ASC');
            }
        }elseif($request->promotion){
            $allProduct->where('regular_price','<>',0);
        }
        $products=$allProduct->paginate(6);
        $category=Category::query()
                            ->orderBy('id','DESC')
                            ->get();
        return view('frontend.shop',compact('products','category'));
    }
}
