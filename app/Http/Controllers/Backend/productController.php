<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    public function listProduct(){
        $product=Product::query()
                        ->join('categories','products.cate_id','=','categories.id')
                        ->join('users','products.user_id','=','users.id')
                        ->select('products.*','categories.name AS category','users.name AS admin')
                        ->orderBy('id','DESC')
                        ->get();

        return view('Backend.list-post',compact('product'));
    }
    public function addProduct(){
        $category=Category::query()->orderBy('id','DESC')->get();
        return view('Backend.add-post',compact('category'));
    }
    public function addProductSubmit(Request $request)
    {
        $request->validate([
            'proName' => 'required',
            'qty' => 'required',
            'sale_price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();
        if($filename=$request->file('thumbnail')){
            $input['thumbnail']=$this->moveUpload($filename);
        }
        $regular_price=$request->regular_price;
        if(empty($regular_price)){
            $input['regular_price']=0;
        }else{
            $input['regular_price']=$regular_price;
        }
        $input['size'] = implode(',',$request->size);
        $input['color'] = implode(',',$request->color);
        $input['user_id']=Auth::user()->id;
        $input['views']=0;

        $input['cate_id']=$request->category;
        $res = Product::create($input);
        $res->save();
        if ($res) {
            return redirect('/add-product')->with('message','Add Success');
        }
    }
    public function editProduct(Product $product){
        $category=Category::query()->orderBy('id','DESC')->get();
        $size=explode(',',$product->size);
        $color=explode(',',$product->color);
        $getCate=Product::query()
                        ->join('categories','products.cate_id','=','categories.id')
                        ->select('products.*','categories.name AS category')
                        ->where('products.id',$product->id)
                        ->first();
        return view('Backend.edit-product',compact(
            'product',
            'category',
            'size',
            'color',
            'getCate'
        ));
    }
    public function editProductSubmit(Request $request,Product $product){
        $request->validate([
            'proName' => 'required',
            'qty' => 'required',
            'sale_price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);
        $input=$request->all();
        $input['proName']=$request->proName;
        if($filename=$request->file('thumbnail')){
            if(empty($filename)){
                $input['thumbnail']=$request->old_img;
            }else{
                $input['thumbnail']=$this->moveUpload($filename);
            }
        }
        $regular_price=$request->regular_price;
        if(empty($regular_price)){
            $input['regular_price']=0;
        }else{
            $input['regular_price']=$regular_price;
        }
        $input['size'] = implode(',',$request->size);
        $input['color'] = implode(',',$request->color);
        $input['user_id']=Auth::user()->id;
        $input['cate_id']=$request->category;
        $product->update($input);
        $product->save();
            return redirect('/list-product');

    }
    public function deleteProduct(Request $request){

            $remove_id=$request->input('remove_id');
            $res=Product::query()->where('id',$remove_id)->delete();
            if($res){
                return redirect('/list-product');
            }

    }

}
