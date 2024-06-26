<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function FrontendRegister(){
        return view('frontend.register');
    }
    public function FrontendRegisterSubmit(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
            'profile'=>'required'
        ]);
    $input=$request->all();
        if($filename=$request->file('profile')){
            $image=$this->moveUpload($filename);
            $input['profile']=$image;
        }
        $input['password']=Hash::make($request->password);
        $res=User::create($input);
        $res->save();
        if($res){
            return redirect('/frontend-login');
        }
    }
    public function FrontendLogin(){
        return view('frontend.login');
    }
    public function FrontendLoginSubmit(Request $request){
        $request->validate([
            'name_email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['name' => $request->name_email,'password' =>$request->password])){
            return redirect('/');
        }elseif(Auth::attempt(['email'=>$request->name_email, 'password' => $request->password])){
            return redirect('/');
        }else {
            return redirect('/frontend-login');
        }
    }

}
