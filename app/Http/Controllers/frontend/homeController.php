<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function getAllPro(){
        $product=Product::query()->orderBy('id','DESC')->paginate(4);
        $promotion=Product::query()->where('regular_price','<>',0)->orderBy('id','DESC')->get();
        $popular=Product::query()->orderBy('views','DESC')->limit(4)->get();
        return view('frontend.home',compact('product','popular','promotion'));
    }
}
