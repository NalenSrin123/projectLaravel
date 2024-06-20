<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function listCategory(){
        $category=Category::query()->orderBy('id','DESC')->get();
        return view('Backend.list-category',compact('category'));
    }
    public function addCategory(){
        return view('Backend.add-category');
    }
    public function addCategorySubmit(Request $request){
        $request->validate([
            'name'=>'required|string'
        ]);
        $input=$request->all();
        $res=Category::create($input);
        $res->save();
        if($res){
            return redirect('/list-category');
        }
    }
    public function editCategory(Category $category){
        return view('Backend.edit-category',compact('category'));
    }
    public function editCategorySubmit(Request $request,Category $category){
        $input=$request->all();
        $category->update($input);
        $category->save();
        return redirect('/list-category');
    }
    public function deleteCategory(Request $request){
        $remove_id=$request->input('remove_id');
        $res=Category::query()->where('id',$remove_id)->delete();
        if($res){
            return redirect('/list-category');
        }
    }
}
