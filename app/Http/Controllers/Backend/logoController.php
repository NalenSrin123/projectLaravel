<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class logoController extends Controller
{
    public function listLogo(){
       $logo=Logo::query()->orderBy('id','DESC')->get();
        return view('Backend.list-logo',compact('logo'));
    }
    public function addLogo(){
        return view('Backend.add-logo');
    }
    public function addLogoSubmit(Request $request){
        $request->validate([
            'thumbnail'=>'required'
        ]);
        $input=$request->all();
        if($filename=$request->file('thumbnail')){
            $image=$this->moveUpload($filename);
            $input['thumbnail']=$image;
        }
        $res=Logo::create($input);
        $res->save();
        if($res){
            return redirect('/list-logo');
        }
    }
    public function editLogo(Logo $logo){

        return view('Backend.edit-logo',compact('logo'));
    }

    public function editLogoSubmit(Request $request, Logo $logo){
        $input=$request->all();
        if(empty($filename=$request->file('thumbnail'))){
            $input['thumbnail']=$request->old_image;
        }else{
                $image=$this->moveUpload($filename);
                $input['thumbnail']=$image;
        }
        $logo->update($input);
        $logo->save();
        return redirect('/list-logo');
    }
    public function deleteLogo(Request $request){
        $remove_id=$request->input('remove_id');
        $res=Logo::query()->where('id',$remove_id)->delete();
        if($res){
            return redirect('/list-logo');
        }
    }

}
